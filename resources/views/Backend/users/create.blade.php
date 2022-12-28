@extends('adminlte::page')

@section('title', 'New User')


@section('content')

    <div class="main">
        <div class="container">
            <div class="title">Register new User</div>
            <div class="content">
              <form action="{{ route('users.save') }}" method="POST" id="new_user">
                @csrf
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" placeholder="Enter name" value={{ old('name') }}  >
                  </div>
                  <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter email" value={{ old('email') }} >
                  </div>
                  <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter password" >
                  </div>
                  <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="password_confirm" placeholder="Confirm password">
                  </div>
                </div>

                    {{-- <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <input type="radio" name="gender" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                    </div> --}}

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

<link rel="stylesheet" href="{{ asset('css/NewUserForm.css') }}">

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


  
@stop