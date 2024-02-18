@extends('master')
@section('content')

@if(session()->has('message'))
    {{session()->get('message')}}
@endif

<div class="container mt-3">
<h2>Lista de Vendas</h2>

<table class="table table-dark table-striped mt-20 table-borderless table-hover">
       <thead>
            <tr class="">
                <th class="" width="15%">Número da venda</th>
                <th class="">Vendedor</th>
                <th class="">Email</th>
                <th class="">Valor da Venda</th>
                <th class="">Comissão</th>
                <th class="">Data de Venda</th>
                <th>Editar</th>
            </tr>
       </thead>
    <tbody class="table-hover">
        @foreach($sales as $sale)
            <tr>
                <td class="text-left">#{{ $sale->sales_id }}</td>
                <td class="text-left">{{ $sale->seller_name }}</td>
                <td class="text-left">{{ $sale->seller_email }}</td>
                <td class="text-right">{{ number_format($sale->sale_value, 2, ',', '.') }}</td>
                <td class="text-right">{{ number_format($sale->sale_commission, 2, ',', '.') }}</td>
                <td class="text-left">{{ date_format(date_create($sale->created_at), "d/m/Y") }}</td>
                <td>
                <a class="p-10" href="{{ route('sales.edit',['sale' => $sale->sales_id , 'edit'] )}}">Editar Venda</a>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection


