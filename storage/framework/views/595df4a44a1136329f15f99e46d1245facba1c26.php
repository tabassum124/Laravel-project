<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
        <title><?php echo e(env('APP_NAME')); ?></title>

        <!-- Fonts -->

        <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">

    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container large-devices-navbar">
                <div class="logo"><a href="/">Devcom</a></div>

                
                <?php echo e(menu('main', 'partials.menus.main')); ?>

            </div> <!-- end top-nav -->

            <?php echo $__env->make('partials/small-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="hero container">
                <div class="hero-copy">
                    <h1>One stop solution for your gadgets</h1>
                    <p>Includes multiple products, categories, a shopping cart, a wishlist and a checkout system with payment gateway.</p>
                    <div class="hero-buttons">
                        <a href="<?php echo e(route('shop.index')); ?>" class="button button-trans">SHOP NOW</a>
                    </div>
                </div> <!-- end hero-copy -->

                <div class="hero-image">
                    <img src="<?php echo e(asset('/images/macbook-pro-laravel.png')); ?>" alt="hero image">
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
                        <?php $__currentLoopData = $newProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                            <?php echo $__env->make('partials/product-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- end products -->
                </div>

                <div class="cards-container">
                    <h2>Featured Products</h2>
                    
                    <div class="cards text-center">
                        <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                            <div>
                                <?php echo $__env->make('partials/product-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- end products -->
                </div>

                <div class="text-center button-container">
                    <a href="<?php echo e(route('shop.index')); ?>" class="button button-white">View more products</a>
                </div>
            </div>
        </div> <!-- end home-products-section -->

        <?php echo $__env->make('partials.session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="js/app.js"></script>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/home.blade.php ENDPATH**/ ?>