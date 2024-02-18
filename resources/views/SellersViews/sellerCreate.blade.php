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
        <label for="name" class="form-label purple-color">Nome</label>
        <input require type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label purple-color">Email</label>
        <input require type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
</form>
</div>
@endsection


