@extends('master')
@section('content')
<table class="table table-dark table-striped mt-20 table-borderless table-hover">
       <thead>
        <tr class="">
                <th class="">Nome</th>
                <th class="">Email</th>
                <th class="" width="15%">Ação</th>
            </tr>
       </thead>
    <tbody class="table-hover">
    @foreach ($sellers as $seller)
        <tr class="">
            <td>{{$seller->seller_name}}</td>
            <td>{{$seller->seller_email}}</td>
            <td>
                <a class="p-10" href="{{ route('sellers.edit',['seller' => $seller->id , 'edit'] )}}">Editar</a>
                <a class="p-10" href="{{ route('sellers.show',['seller' => $seller->id ] )}}">Detalhes</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection