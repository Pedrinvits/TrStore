<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SalesController extends Controller
{
    public readonly Sales $sale;

    public function __construct()
    {
        $this->sale = new Sales();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelSales = new Sales();

        $sales = $modelSales->list();
       
        return view("SalesViews/saleList",["sales" => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($seller)
    {
        return view('SalesViews/saleCreate',['seller' => $seller]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $created = $this->sale->create([
            'seller_id' => $request->input('seller_id'),
            'sale_value' => $request->input('sale_value'),
            'sale_commission' => $request->input('sale_value') *0.085,
            'created_at'  => $request->input('sale_date'),
        ]);
        
        if($created){
            return redirect('/');
        }else{
            return redirect()->back()->with('message','Updated created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // manda pra view que edita a venda
        // print '<pre>';
        // var_dump($id);
        return view('SalesViews/saleEdit',['sale' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // var_dump($id);
        // var_dump($request->except(['_token','_method']));
        
        if(!empty($request->input('sale_value')) || !empty($request->input('created_at')) ){
            $updated = $this->sale->where('sales_id',$id)->update($request->except(['_token','_method']));
            if($updated){
                return redirect()->back()->with('message','Informações alteradas com sucesso !');
            }else{
                return redirect()->back()->with('message','Updated error');
            }
       }else{
        return redirect()->back()->with('message','Faltam Informações');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
       
       $this->sale->where('sales_id', $id)->delete();
           
       return redirect()->route('sellers.index');
    }


}
