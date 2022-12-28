@extends('adminlte::page')

@section('title', 'Editar Producto')


@section('content')

<div class="main">
  <div class="container">
    <div class="title">Editar {{ $product->name }}</div>
    <div class="content">
      <form action="{{ route('products.update',$product->id_product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre del producto</span>
            <input type="text" name="name_product" placeholder="Nombre" value="{{ $product->name }}">
          </div>
          <div class="input-box">
            <span class="details">PLU</span>
            <input type="text" name="plu_product" placeholder="Identificador" value="{{ $product->plu }}">
          </div>
          <div class="input-box">
            <span class="details">Precio</span>
            <input type="number" name="price_product" min="0" placeholder="Precio" value="{{ $product->price }}">
          </div>
          <div class="input-box">
            <span class="details">Stock</span>
            <input type="number" name="stock_product" min="1" placeholder="Stock disponible" value="{{ $product->stock }}">
          </div>
          <div class="input-box">
            <span class="details">Descripcion</span>
            <input type="text" name="description_product" placeholder="Descripcion" value="{{ $product->description }}">
          </div>
          <div class="input-box">
            <span class="details">Seleccione categoria</span>
            <select name="product_category">
              <option value="{{ $product_cateogorie->id_category }}">{{ $product_cateogorie->name_category }}</option>
              <option value="">--------------------------------------------------</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id_category }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
          <div class="input-box">
            <span>Imagen del producto</span>
            <div class="picture__container">
              <div class="circle">
                <img class="profile-pic" src="{{ asset("img/products/$product->image") }}" >
              </div>
              <div class="p-image">
                <i class="fa fa-camera upload-button"></i>
                <input class="file-upload" name="product_image" type="file" accept="image/*"/>
              </div>
          </div>
        </div>
         @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="button">
          <input type="submit" value="Editar">
        </div>
      </form>
    </div>
  </div>
</div>
    

  
@stop

@section('css')

<link rel="stylesheet" href="{{ asset('css/products.css') }}">

@stop

@section('js')

<script>
    $('#new_user').submit(function(e){
      e.preventDefault();

      Swal.fire({
        title: '¿Estás Seguro de crear el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Crear'
      }).then((result) => {
        if (result.value) {
          this.submit();
        }
      })
    });
  </script>

@if (session('exists') == 'ok')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El PLU que ingresaste ya está registrado',
          })
    </script>
@endif

@if (session('updated') == 'ok')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cool!...',
            text: 'El producto se actualizó correctamente',
          })
    </script>
@endif


<script>
  $(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
      $(".file-upload").click();
    });
    });
</script>



  
@stop