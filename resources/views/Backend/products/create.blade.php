@extends('adminlte::page')

@section('title', 'Crear Producto')


@section('content')

    <div class="main">
      <div class="container">
        <div class="title">Nuevo producto</div>
        <div class="content">
          <form action="{{ route('products.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
              <div class="input-box">
                <span class="details">Nombre del producto</span>
                <input type="text" name="name_product" placeholder="Nombre">
              </div>
              <div class="input-box">
                <span class="details">PLU</span>
                <input type="text" name="plu_product" placeholder="Identificador">
              </div>
              <div class="input-box">
                <span class="details">Precio</span>
                <input type="number" name="price_product" min="0" placeholder="Precio">
              </div>
              <div class="input-box">
                <span class="details">Stock</span>
                <input type="number" name="stock_product" min="1" placeholder="Stock disponible">
              </div>
              <div class="input-box">
                <span class="details">Peso</span>
                <input type="text" name="weight_product" required placeholder="Peso o Contenido del producto">
              </div>
              <div class="input-box">
                <span class="details">Descripcion</span>
                <input type="text" name="description_product" placeholder="Descripcion">
              </div>
              <div class="input-box">
                <span class="details">Seleccione categoria</span>
                <select name="product_category" id="">
                  @foreach ($categories as $category)
                    <option value="{{$category->id_category}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
              <div class="input-box">
                <span>Imagen del producto</span>
                <div class="picture__container">
                  <div class="circle">
                    <img class="profile-pic" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" >
            
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
              <input type="submit" value="Register">
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
            text: 'El correo que ingresaste ya está registrado',
          })
    </script>
@endif
@if (session('password') == 'ok')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las contraseñas deben coincidir',
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