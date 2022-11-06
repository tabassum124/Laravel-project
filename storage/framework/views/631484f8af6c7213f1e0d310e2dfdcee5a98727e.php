<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title', ''); ?></title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">

        <?php echo $__env->yieldContent('extra-css'); ?>
    </head>


<body class="<?php echo $__env->yieldContent('body-class', ''); ?>">
    <div class="main">
        <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.session-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <?php echo $__env->make('partials.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('extra-js'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/layout.blade.php ENDPATH**/ ?>