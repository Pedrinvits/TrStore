<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sellers;
use App\Models\Sales;

class SellersController extends Controller
{
    public readonly Sellers $seller;
    public readonly Sales $sale;

    public function __construct()
    {
        $this->seller = new Sellers();
        $this->sale = new Sales();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = $this->seller->all();
        return view("SellersViews/sellers",["sellers" => $sellers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('SellersViews/sellerCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->name) || !empty($request->email)){
           
            $created = $this->seller->create([
                'seller_name' => $request->input('name'),
                'seller_email' => $request->input('email'),
            ]);
            
            if($created){
                return redirect()->back()->with('message','Vendedor criado com sucesso !');
            }else{
                return redirect()->back()->with('message','Insert error');
            }
        
       }else{
        return redirect()->back()->with('message','Preencha todos os campos');
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sellers $seller)
    {
        return view('SellersViews/sellerShow',['seller' => $seller]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sellers $seller)
    {
        return view('SellersViews/sellerEdit',['seller' => $seller]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       if(!empty($request->seller_name) || !empty($request->seller_email)){
            $sellerFinded = $this->seller->FindOrFail($id);
            if($request->seller_name !== $sellerFinded->seller_name || $request->seller_email !== $sellerFinded->seller_email){
                $updated = $this->seller->where('id',$id)->update($request->except(['_token','_method']));
                if($updated){
                    return redirect()->back()->with('message','Informações alteradas com sucesso !');
                }else{
                    return redirect()->back()->with('message','Updated error');
                }
            }else{
                return redirect()->back()->with('message','Coloque informações diferentes');
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
        $modelSales = new Sales();

        $sales = $modelSales->deleteSale($id);
       
        $this->seller->where('id', $id)->delete();
           
       return redirect()->route('sellers.index');
    }
}
