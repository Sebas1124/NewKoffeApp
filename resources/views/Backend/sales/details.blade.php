@extends('adminlte::page')

@section('title', 'Detalles de venta')


@section('content')

<center><h1>Detalle de venta</h1></center>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">imagen</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio unitario</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($details as $detail)  
    <tr>
      <th scope="row">{{ $detail->id_detail }}</th>
      <td><img src="{{ asset("img/products/$detail->image") }}" width="70"></td>
      <td>{{ $detail->name }}</td>
      <td>{{ $detail->quantity }}</td>
      <td>{{ number_format($detail->unitary_price) }}</td>
    </tr>
    @endforeach

    </tbody>
  </table>

@stop

@section('css')
    
@stop

@section('js')

   

@stop