<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sellers;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_name',
        'seller_id',
        'sale_value',
        'created_at',
        'sale_commission',
    ];

    public function Sellers()
    {
        return $this->belongsTo(Sellers::class,'id','seller_id');
    }
    public function list($seller_id = '', $data_inicial = '', $data_final = '')
    {
        $sales = DB::table('sales')
        ->join('sellers', 'sales.seller_id', '=', 'sellers.id') 
        ->select('sales.sales_id','sellers.seller_name','sellers.seller_email','sales.sale_value','sales.sale_commission','sales.created_at');

        if(!empty($seller_id)){
            $sales = $sales->where('sellers.id', $seller_id);
        }

        if (!empty($data_inicial) && !empty($data_final)) {
            $sales = $sales->whereBetween('sales.created_at', [$data_inicial, $data_final]);
        }

        $sales = $sales->orderBy('sales.sales_id')->get();

        return $sales->toArray();
    }

    public function deleteSale(String $seller_id)
    {
        $deleteSale = DB::table('sales')->where('seller_id', $seller_id)->delete();
        return $deleteSale;
    }

    public function SumSales($seller_id = '', $data_inicial = '', $data_final = '')
    {
        $sales = DB::table('sales')
        ->join('sellers', 'sales.seller_id', '=', 'sellers.id');
        
        if(!empty($seller_id)){
            $sales = $sales->where('sellers.id', $seller_id);
        }

        if (!empty($data_inicial) && !empty($data_final)) {
            $sales = $sales->whereBetween('sales.created_at', [$data_inicial, $data_final]);
        }
        $sales = $sales->sum('sales.sale_value');
        
        return $sales;
    }
}
