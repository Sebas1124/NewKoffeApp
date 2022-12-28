@extends('adminlte::page')

@section('title', 'Edit User')


@section('content')

    <div class="main">
        <div class="container">
            <div class="title">Edit user {{ $user->name }}</div>
            <div class="content">
              <form action="{{ route('users.update',$user->id) }}" method="POST" id="new_user">
                @csrf
                {{ method_field('PUT') }}
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" value="{{ $user->name }}"  >
                  </div>
                  <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" value="{{ $user->email }}" >
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
                  <input type="submit" value="Edit">
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
        title: '¿Estás Seguro de editar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, editar'
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

@if (session('updated') == 'ok')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cool!',
            text: 'El usuario ha sido actualizado',
          })
    </script>
@endif


  
@stop