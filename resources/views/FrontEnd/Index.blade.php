@extends('welcome')

@section('css')
    
@stop

@section('content')

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home grid" id="home">
            <div class="home__container">
                <div class="home__content container">
                    <h1 class="home__title">
                        Selecciona tu SNACK favorito y disfrutalo! <span>.</span>
                    </h1>
                    <p class="home__description">
                        Compra lo mejor!
                    </p>

                    <div class="home__data">
                        <div class="home__data-group">
                            <h2 class="home__data-number">120K</h2>
                            <h3 class="home__data-title">Testimonios</h3>
                            <p class="home__data-description">
                                Testimonios y recomendaciones por montones! :D
                            </p>
                        </div>

                        <div class="home__data-group">
                            <h2 class="home__data-number">100+</h2>
                            <h3 class="home__data-title">Ingredientes seleccionados</h3>
                            <p class="home__data-description">
                               Los ingredientes son previamente seleccionados de forma minuciosa para ofrecerte lo mejor!
                            </p>
                        </div>
                    </div>

                    <a href="#specialty">
                        <img src="{{ asset('img/scroll.png') }}" alt="" class="home__scroll">
                    </a>
                </div>
            </div>

            <img src="{{ asset('img/home.png') }}" alt="" class="home__img">
        </section>

        <!--==================== ESPECIALTY ====================-->
        <div class="specialty section container" id="specialty">
            <div class="specialty__container">
                <div class="specialty__box">
                    <h2 class="section__title">
                        Snacks y bebidas con un sabor para cambiarte el Animo!
                    </h2>

                    <div>
                        <a href="#" class="button specialty__button">Ver más</a>
                    </div>
                </div>

                <div class="specialty__category">
                    <div class="specialty__group specialty__line">
                        <img src="{{ asset('img/specialty1.png') }}" alt="" class="specialty__img">

                        <h3 class="specialty__title">Café seleccionado</h3>
                        <p class="specialty__description">
                            Nosotros nos encargamos de seleccionar el café premium para darle un gusto exquisíto
                        </p>
                    </div>

                    <div class="specialty__group specialty__line">
                        <img src="{{ asset('img/specialty2.png') }}" alt="" class="specialty__img">

                        <h3 class="specialty__title">Deliciosas galletas</h3>
                        <p class="specialty__description">
                            Disfruta de comer galletas preparadas con el amor de mamá
                        </p>
                    </div>

                    <div class="specialty__group">
                        <img src="{{ asset('img/specialty3.png') }}" alt="" class="specialty__img">

                        <h3 class="specialty__title">Disfrutalo desde donde quieras</h3>
                        <p class="specialty__description">
                            Disfruta de nuestras bebidas y snacks desde la comodidas de tu casa u oficina
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!--==================== PRODUCTS ====================-->
        <section class="products section" id="products">
            <div class="products__container container">
                <h2 class="section__title">
                    Prueba nuestros deliciosos Snacks
                </h2>

                <ul class="products__filters">
                    <li class="products__item products__line active-product" data-filter=".delicacies">
                        <h3 class="products__title">Nuevas delicias! </h3>
                        <span class="products__stock">{{ $snacks->count() }} Productos</span>
                    </li>

                    <li class="products__item products__line" data-filter=".coffee">
                        <h3 class="products__title">Bebidas</h3>
                        <span class="products__stock">{{ $drinks->count() }} Productos</span>
                    </li>

                    <li class="products__item" data-filter=".cake">
                        <h3 class="products__title">Pasteles</h3>
                        <span class="products__stock">{{ $cakes->count() }} Productos</span>
                    </li>
                </ul>

                <div class="products__content grid">
                    <!-- ========== Delicacies =========== -->

                    @foreach ($snacks as $snack)
                    <article class="products__card mix delicacies">
                        <div class="products__shape">
                            <img src="{{ asset("img/products/$snack->image") }}" alt="Product" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">$ {{ number_format($snack->price) }} </h2>
                            <h3 class="products__name">{{ $snack->name }}</h3>
                            <hr style="width:100px"/>
                            <h5>stock: {{ $snack->stock }}</h5>
                            <h5>Contenido: {{ $snack->weight }}</h5>

                            <form action="{{ route('cart.add', $snack->id_product) }}" method="POST">
                                @csrf
                                <button class="button products__button">
                                    <i class='bx bx-shopping-bag'></i>
                                </button>            
                            </form>
                        </div>
                    </article>
                    @endforeach

                    <!-- ========== Coffee =========== -->

                    @foreach ( $drinks as $drink )
                    <article class="products__card mix coffee">

                        <div class="products__shape">
                            <img src="{{ asset("img/products/$drink->image") }}" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">$ {{ number_format($drink->price) }}</h2>
                            <h3 class="products__name">{{ $drink->name }}</h3>
                            <hr style="width:100px"/>
                            <h5>stock: {{ $drink->stock }}</h5>
                            <h5>Contenido: {{ $drink->weight }}</h5>


                            <form action="{{ route('cart.add', $drink->id_product) }}" method="POST">
                                @csrf
                                <button class="button products__button">
                                    <i class='bx bx-shopping-bag'></i>
                                </button>            
                            </form>
                        </div>

                    </article>
                    @endforeach


                    <!-- ========== Cake =========== -->
                    @foreach ( $cakes as $cake )

                    <article class="products__card mix cake">
                        <div class="products__shape">
                            <img src="{{ asset("img/products/$cake->image") }}" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">$ {{ number_format($cake->price) }}</h2>
                            <h3 class="products__name">{{ $cake->name }}</h3>
                            <hr style="width:100px"/>
                            <h5>stock: {{ $cake->stock }}</h5>
                            <h5>Contenido: {{ $cake->weight }}</h5>


                            <form action="{{ route('cart.add', $cake->id_product) }}" method="POST">
                                @csrf
                                <button class="button products__button">
                                    <i class='bx bx-shopping-bag'></i>
                                </button>            
                            </form>                              
                        </div>
                    </article>

                    @endforeach

                </div>
            </div>
        </section>

        <!--==================== QUALITY ====================-->
        <section class="quality section" id="premium">
            <div class="quality__container container">
                <h2 class="section__title">
                    Disfruta de nuestro producto más vendido
                </h2>

                <div class="quality__content grid">
                    <div class="quality__images">
                        <img src="{{ asset("img/products/$most_sales->image") }}" alt="" class="quality__img-big">
                    </div>

                    <div class="quality__data">
                        <h1 class="quality__title">{{ $most_sales->name }}</h1>
                        <h2 class="quality__price">$ {{ number_format($most_sales->price) }}</h2>
                        <span class="quality__special">Precios especiales!</span>
                        <p class="quality__description">
                            {{ $most_sales->description }}
                        </p>

                        <div class="quality__buttons">
                            <form action="{{ route('cart.add',$most_sales->id_product) }}" method="post">
                                @csrf
                                <button class="button">
                                    Comprar AHORA!
                                </button>
                            </form>

                            <a href="#" class="quality__button">
                                Ver más
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== QUALITY ====================-->
        <section class="quality section" id="premium">
            <div class="quality__container container">
                <h2 class="section__title">
                    Disfruta de nuestro producto con más Stock
                </h2>

                <div class="quality__content grid">
                    <div class="quality__images">
                        <img src="{{ asset("img/products/$most_stock->image") }}" alt="" class="quality__img-big">
                    </div>

                    <div class="quality__data">
                        <h1 class="quality__title">{{ $most_stock->name }}</h1>
                        <h2 class="quality__price">$ {{ number_format($most_stock->price) }}</h2>
                        <span class="quality__special">Stock: {{ $most_stock->stock }}</span>
                        <p class="quality__description">
                            {{ $most_stock->description }}
                        </p>

                        <div class="quality__buttons">
                            <form action="{{ route('cart.add',$most_stock->id_product) }}" method="post">
                                @csrf
                                <button class="button">
                                    Comprar AHORA!
                                </button>
                            </form>

                            <a href="#" class="quality__button">
                                Ver más
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== LOGOS ====================-->
        <section class="logo section">
            <div class="logo__container container grid">
                <img src="{{ asset('img/logocoffee1.png') }}" alt="" class="logo__img">
                <img src="{{ asset('img/logocoffee2.png') }}" alt="" class="logo__img">
                <img src="{{ asset('img/logocoffee3.png') }}" alt="" class="logo__img">
                <img src="{{ asset('img/logocoffee4.png') }}" alt="" class="logo__img">
                <img src="{{ asset('img/logocoffee5.png') }}" alt="" class="logo__img">
            </div>
        </section>

    </main>

    
@stop

@section('js')


@if (session('no_payed') == 'ok')

<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'La compra fue cancelada',
    footer: 'vuelve a intentarlo'
    })
</script>
    
@endif
@if (session('no_stock') == 'ok')

<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'No hay stock de este producto',
    footer: 'Lo sentimos vuelve a intentarlo más tarde'
    })
</script>
    
@endif


@if (session('payed') == 'ok')

<script>
    Swal.fire({
  title: 'Gracias por tu compra tu pedido está siendo preparado!',
  width: 400,
  padding: '3em',
  color: '#716add',
  background: '#fff url(/https://c.tenor.com/lTtlX5xlfmgAAAAC/nyan-cat.gif)',
  backdrop: `
    rgba(0,0,123,0.4)
    url("https://c.tenor.com/lTtlX5xlfmgAAAAC/nyan-cat.gif")
    left top
    no-repeat
  `
})
</script>
    
@endif

@stop