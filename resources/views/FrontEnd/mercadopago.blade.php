@extends('welcome')

@section('css')

<link rel="stylesheet" href="{{asset('css/chekout.css')}}">        

@stop

@section('content')


<div class="container">
    <div class="window">
      <div class="titulo">
        <h2>Hola! Iniciamos tu proceso de compra! a través de nuestro aliado Mercado Pago</h2>
      </div>
      <div class="info">
        <div class="infocontainer">
            <div  class="cho-container">
              <script src="https://sdk.mercadopago.com/js/v2"></script>
            </div>
            <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            </div>
        </div>
        </div>
      </div>

    </div>
</div>


@stop

@section('js')

<script>
    //Adicione as credenciais de sua conta Mercado Pago junto ao SDK
    const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
        locale: 'es-CO'
    });
    const checkout = mp.checkout({
       preference: {
           id: '{{ $preference->id }}' // Indica el ID de la preferencia
       },
       render: {
           container: '.cho-container', // Clase CSS para renderizar el botón de pago
           label: 'Pagar', // Cambiar el texto del botón de pago (opcional)
        },
        theme: {
          elementsColor: '#E1AF6F'
      },
      autoOpen: true, // Habilita la apertura automática de Checkout Pro
    });
  </script>

@stop