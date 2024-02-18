@extends('master')
@section('content')

@if(session()->has('message'))
    {{session()->get('message')}}
@endif
<div class="container mt-3">
<h2>Editar Vendedor</h2>

<form action="{{ route('sellers.update',['seller' => $seller->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="mb-3">
        <label for="seller_name" class="form-label purple-color">Nome</label>
        <input  require type="text" class="form-control" id="seller_name" name="seller_name" value="{{$seller->seller_name}}" placeholder="Nome">
  </div>
  <div class="mb-3">
        <label for="seller_email" class="form-label purple-color">Email</label>
        <input require type="email" class="form-control" id="seller_email" name="seller_email" aria-describedby="emailHelp" value="{{$seller->seller_email}}" placeholder="Nome">
  </div>
    <button type="submit" class="btn btn-primary">Editar</button>
</form>
</div>

@endsection