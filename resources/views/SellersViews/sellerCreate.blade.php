@extends('master')
@section('content')

@if(session()->has('message'))
    {{session()->get('message')}}
@endif

<div class="container mt-3">
<h2>Criar Vendedor</h2>

<form action="{{ route('sellers.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label purple-color">Nome do vendedor</label>
        <input require type="text" class="form-control" id="name" name="name" placeholder="Nome">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label purple-color">Email do vendedor</label>
        <input require type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Email">
    </div>
    <button type="submit" class="btn btn-primary">Criar Vendedor</button>
</form>
</div>
@endsection


