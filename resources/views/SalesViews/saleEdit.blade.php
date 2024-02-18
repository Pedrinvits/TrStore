@extends('master')
@section('content')

@if(session()->has('message'))
    {{session()->get('message')}}
@endif

<div class="container mt-3">
<h2>Editar Venda #{{$sale}}</h2>
<div class="container flex gap-3">
    <form action="{{ route('sales.update',['sale' => $sale ])}}" method="POST">
    @csrf   
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label for="sale_value" class="form-label purple-color">Valor da venda</label>
            <input  require type="number" class="form-control" id="sale_value" name="sale_value"  placeholder="Insira o novo valor">
        </div>

        <!-- <div class="mb-3">
            <label for="created_at" class="form-label purple-color">Data da venda</label>
            <input  require type="date" class="form-control" id="created_at" name="created_at"  placeholder="Insira a data"> -->
        </div>

        <button type="submit" class="btn btn-success">Editar Venda</button>
    
    </form>
    <form action="{{ route('sales.destroy',['sale' => $sale] )}}" method="POST">
    @csrf   
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-success">Apagar Venda</button>
    </form>
</div>


@endsection


