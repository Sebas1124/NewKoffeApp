@extends('welcome')

@section('css')

<link rel="stylesheet" href="{{ asset('css/Login.css') }}">

@stop

@section('content')

<div class="main">
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
          <div class="front">
            <div class="text">
              <span class="text-1">No tienes Kuenta? <br> Unete a la aventura</span>
              <span class="text-2">Registrate! :D</span>
            </div>
          </div>
          <div class="back">
            <div class="text">
              <span class="text-1">Complete miles of journey <br> with one step</span>
              <span class="text-2">Let's get started</span>
            </div>
          </div>
        </div>

        <div class="forms">
            <div class="form-content">
              <div class="login-form">
                <div class="title">Inicio de sesión</div>
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Ingresa tu email" required>
                  </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
                  </div>
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <div class="text"><a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a></div>
                  <div class="button-login input-box">
                    <input type="submit" value="Inicia Sesión">
                  </div>
                  <div class="text sign-up-text">No tienes cuenta? <label for="flip">Registrate Ahora!</label></div>
                </div>
            </form>
          </div>

            <div class="signup-form">
              <div class="title">Registrate</div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Ingresa tu nombre" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Ingresa tu Email" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirma tu contraseña" required>
                  </div>
                  @if ($errors->any())
                        <div class="input-box">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <div class="button-login input-box">
                    <input type="submit" value="Registrate">
                  </div>
                  <div class="text sign-up-text">Ya tienes cuenta? <label for="flip">Inicia Sesión</label></div>
                </div>
          </form>
        </div>
        </div>
        </div>
      </div>
</div>


@stop

@section('js')

@if (session('login') == 'ok')

<script>
  Swal.fire({
  position: 'top-end',
  icon: 'warning',
  title: 'Debes iniciar sesión para usar el carrito',
  showConfirmButton: false,
  timer: 3500
})
</script>
  
@endif

@stop
