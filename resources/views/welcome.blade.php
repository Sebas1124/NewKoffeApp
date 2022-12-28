<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @yield('css')

        <title>KOFFE</title>
    </head>
    <body>
        <!--==================== LOADER ====================-->
        <div class="load" id="load">
            <img src="{{ asset('img/loadcoffee.gif') }}" alt="" class="load__gif">
        </div>

        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="{{ route('home') }}" class="nav__logo">
                    <img src="{{ asset('img/konecta.png') }}" alt="" class="nav__logo-img">
                    KOFFE.
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="{{ route('home')}}#home" class="nav__link active-link">Inicio</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{  route('home') }}#products" class="nav__link">Productos</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('home') }}#premium" class="nav__link">Más vendido</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                        <li class="nav__item"><a href="{{ route('dashboard') }}" class="nav__link">Admin</a></li>
                        <li class="nav__item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button style="background: transparent" type="submit" class="nav__link">Cerrar Sesión</button>
                            </form>
                        </li>
                        @else
                        <li class="nav__item"><a href="{{ route('login') }}" class="nav__link">Inicia Sesión</a></li>
                        
                        @if (Route::has('register'))
                        <li class="nav__item"><a href="{{ route('register') }}" class="ml-4 nav__link">Registrate</a></li>
                        @endif
                        @endauth
                        
                        @endif
                        <li class="nav__item">
                            <a href="{{ route('cart.show') }}" class="nav__link" style="font-size: 1.5rem">☕</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x' ></i>
                    </div>
                </div>

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </nav>
        </header>

        @yield('content')

        

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__container container">
                <h1 class="footer__title">KOFFE.</h1>

                <div class="footer__content grid">
                    <div class="footer__data">
                        <p class="footer__description">
                            Subscribe
                        </p>

                        <div class="footer__newsletter">
                            <input type="email" placeholder="Your email address" class="footer__input" disabled>
                            <button class="footer__button">
                                <i class='bx bx-right-arrow-alt' ></i>
                            </button>
                        </div>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">
                            Address
                        </h2>
                        <p class="footer__information">
                            Calle 12361982. <br>
                            Cali, Colombia 🟡🔵🔴
                        </p>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">
                            Contact
                        </h2>
                        <p class="footer__information">
                            +57 3115440812 <br>
                            sebas.rosero.lopez@gmail.com
                        </p>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">
                            Office
                        </h2>
                        <p class="footer__information">
                            Monday - Friday <br>
                            7AM - 5PM
                        </p>
                    </div>
                </div>

                <div class="footer__group">
                    <ul class="footer__social">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-facebook' ></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-instagram' ></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-twitter' ></i>
                        </a>
                    </ul>

                    <span class="footer__copy">
                        <a href="http://sebasportafolio.com" target="_blank">&#169; Sebastián Rosero Lopez Todos los derechos reservados</a>
                    </span>
                </div>
            </div>
        </footer>


        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt'></i>
        </a>

        <!--=============== MIXITUP FILTER ===============-->
        <script src="{{ asset('js/mixitup.min.js') }}"></script>

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('js')
    </body>
</html>