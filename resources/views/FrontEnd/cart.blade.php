@extends('welcome')

@section('css')

<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">

@stop

@section('content')

<main class="main">
    <div class="basket">
      <div class="basket-labels">
        <ul class="ul">
          <li class="item item-heading li">Producto</li>
          <li class="price li">Precio</li>
          <li class="quantity li">Cantidad</li>
          <li class="subtotal li">Subtotal</li>
        </ul>
      </div>
      @foreach ($pedidos as $p)
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src='{{asset("img/products/$p->image")}}' class="product-frame img">
          </div>
          <div class="product-details">
            <h1><strong><span class="item-quantity">{{$p->quantity}}</span> x {{$p->name}}</strong></h1>
            <p><strong>{{$p->descripcion}}</strong></p>
            <p>Codigo de producto - {{$p->plu}}</p>
            <p>Stock de producto - {{$p->stock}}</p>
          </div>
        </div>
        <div class="price">{{number_format( $p->price)}}</div>
        <div class="quantity">
          <input type="number" value="{{$p->cart_quantity}}" min="1" class="quantity-field" disabled>
        </div>
        <div class="subtotal">{{number_format($p->cart_price)}}</div>
  
        <form action="{{route('cart.rest',$p->id_cart)}}" id="carritodelete" method="post">
          @csrf
          {{ method_field('PUT') }}
          <div class="remove">
            <button>Eliminar</button>
          </div>
      </form>
  
        <form action="{{route('cart.sum',$p->id_cart)}}" method="post">
          @csrf
          {{ method_field('PUT') }}
          <div class="add">
            <button>Añadir</button>
          </div>
      </form>
  
      </div>
      @endforeach   
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Productos en tu carrito</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">{{ number_format($subtotal) }}</div>
        </div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Iva 19%</div>
          <div class="subtotal-value final-value" id="basket-subtotal">{{ number_format($taxes) }}</div>
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">{{ number_format($total_price) }}</div>
        </div>
        <form action="{{ route('payments.mercadopago') }}" method="get">
          @csrf
          <div class="summary-checkout">
          <button class="checkout-cta">Pagar</i></button>
        </div>
      </form>
    </aside>
  </main>


@stop

@section('js')


@if (session('added') == 'ok')

<script>
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Tu producto se ha agregado correctamente',
  showConfirmButton: false,
  timer: 1500
})
</script>
  
@endif

@if (session('plus') == 'ok')

<script>
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Tu producto se ha actualizado correctamente',
  showConfirmButton: false,
  timer: 1500
})
</script>
  
@endif
@if (session('deleted') == 'ok')

<script>
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Tu producto se ha actualizado correctamente',
  showConfirmButton: false,
  timer: 1500
})
</script>
  
@endif

@stop