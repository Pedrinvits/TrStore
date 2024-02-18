@extends('master')
@section('content')

@if(session()->has('message'))
    {{session()->get('message')}}
@endif

<div class="container mt-3">
<h2>Criar Venda</h2>

<form action="{{ route('sales.store')}}" method="post">
    @csrf
        <input type="hidden" class="form-control" id="seller_id" name="seller_id" value="{{$seller}}">
    <div class="mb-3">
        <label for="sale_value" class="form-label purple-color">Valor da Venda</label>
        <input required type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="sale_value" name="sale_value" placeholder="R$">
    </div>
    <div class="mb-3">
        <label for="sale_date" class="form-label purple-color">Valor da Venda</label>
        <input required type="date" class="form-control" id="sale_date" name="sale_date">
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
</form>
</div>
@endsection


