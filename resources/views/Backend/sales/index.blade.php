@extends('adminlte::page')

@section('title', 'Ventas')


@section('content')

<center><h1>Ventas de Koffe</h1></center>


<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Factura</th>
        <th scope="col">Estado</th>
        <th scope="col">Total</th>
        <th scope="col">Usuario</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($sales as $sale)  
    <tr>
      <th scope="row">{{ $sale->id_sale }}</th>
      <td>{{ $sale->no_ticket }}</td>
      <td>{{ $sale->status }}</td>
      <td>{{ number_format($sale->total_price) }}</td>
      <td>{{ $sale->id_user }}</td>
      <td><a href="{{ route('sales.details',$sale->id_sale) }}" class="btn btn-outline-info">Detalles</a></td>
    </tr>
    @endforeach

    </tbody>
  </table>



  
@stop

@section('css')
    
@stop

@section('js')

   

@stop