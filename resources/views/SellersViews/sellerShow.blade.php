@extends('master')
@section('content')

@if(session()->has('message'))
    {{session()->get('message')}}
@endif
<div class="container mt-3">
<h2>Editar Vendedor</h2>

<div class="container flex gap-3">
    <form action="{{ route('sellers.destroy',['seller' => $seller->id])}}" method="post">
    @csrf   
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-success">Apagar Vendedor</button>
    
    </form>
    <form action="{{ route('sales.create',['seller' => $seller->id])}}" method="post">
    @csrf   
        <button type="submit" class="btn btn-success">Registrar Venda</button>
    </form>
</div>

</div>

@endsection
