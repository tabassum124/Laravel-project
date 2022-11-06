<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->

        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container large-devices-navbar">
                <div class="logo"><a href="/">Devcom</a></div>

                {{-- Main menu --}}
                {{ menu('main', 'partials.menus.main') }}
            </div> <!-- end top-nav -->

            @include('partials/small-nav')

            <div class="hero container">
                <div class="hero-copy">
                    <h1>One stop solution for your gadgets</h1>
                    <p>Includes multiple products, categories, a shopping cart, a wishlist and a checkout system with payment gateway.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('shop.index') }}" class="button button-trans">SHOP NOW</a>
                    </div>
                </div> <!-- end hero-copy -->

                <div class="hero-image">
                    <img src="{{ asset('/images/macbook-pro-laravel.png') }}" alt="hero image">
                </div> <!-- end hero-image -->
            </div> <!-- end hero -->
        </header>

        <div class="home-products-section">

            <div class="container">
                <h1 class="text-center">Welcome to Devcom!</h1>

                <p class="section-description">The future of business is yours to shape. </p>
            </div> <!-- end container -->

            <div class="products-container">
                <div class="cards-container">
                    <h2>New Products</h2>

                    <div class="cards text-center">
                        @foreach ($newProducts as $product)    
                            @include('partials/product-card')
                        @endforeach
                    </div> <!-- end products -->
                </div>

                <div class="cards-container">
                    <h2>Featured Products</h2>
                    
                    <div class="cards text-center">
                        @foreach ($featuredProducts as $product)    
                            <div>
                                @include('partials/product-card')
                            </div>
                        @endforeach
                    </div> <!-- end products -->
                </div>

                <div class="text-center button-container">
                    <a href="{{ route('shop.index') }}" class="button button-white">View more products</a>
                </div>
            </div>
        </div> <!-- end home-products-section -->

        @include('partials.session-messages')

        @include('partials.contact')

        @include('partials.footer')

        <script src="js/app.js"></script>

    </body>
</html>
