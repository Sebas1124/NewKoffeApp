@extends('adminlte::page')

@section('title', 'Productos')


@section('content')

<div class="main">
    <section>

        <div class="new__user">
            <div class="bg">
                <a href="{{ route('products.shop') }}">Nuevo producto</a>
            </div>
        </div>

        <div class="swiper mySwiper container">
          <div class="swiper-wrapper content">

            @foreach ($products as $product)
                <div class="swiper-slide card">

                <div class="card-content">
                    <div class="image">
                    <img src="{{ asset("img/products/$product->image") }}" alt="">
                    </div>
        
                    <div class="name-profession">
                    <span class="name">{{ $product->name }}</span>
                    <span class="profession">{{ $product->description }}</span>
                    <span class="profession">$ {{ number_format($product->price) }}</span>
                    <span class="profession">stock: {{ $product->stock }}</span>
                    </div>
        
                    <div class="button">
                    <a href="{{ route('products.edit',$product->id_product) }}" class="aboutMe">Edit</a>
                    <form id="delete" action="{{ route('products.delete',$product->id_product) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="hireMe">Delete</button>
                    </form>
                    </div>
                </div>

                </div>
            @endforeach
    
          </div>
        </div>
    
        <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
      </section>
</div>

  
@stop

@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="{{ asset('css/Users.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

@stop

@section('js')

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });
    </script>


    <script>
        $('#delete').submit(function(e){
        e.preventDefault();

        Swal.fire({
            title: '¿Estás Seguro de eliminar el registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
        }).then((result) => {
            if (result.value) {
            this.submit();
            }
        })
        });
  </script>

    @if (session('created') == 'ok')

    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Se creado el producto correctamente',
        showConfirmButton: false,
        timer: 3500
        })
    </script>
        
    @endif
    @if (session('deleted') == 'ok')

    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Producto eliminado correctamente',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        
    @endif

@stop