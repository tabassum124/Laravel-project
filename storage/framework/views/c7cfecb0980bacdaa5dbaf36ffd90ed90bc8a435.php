<div class="container small-devices-navbar">
    <div class="top-nav">
        <?php if(request()->is('checkout') || request()->is('checkout/complete')): ?>
            <div class="logo logo-checkout"><a href="/">Devcom</a></div>
        <?php else: ?>
            <div class="logo"><a href="/">Devcom</a></div>
        <?php endif; ?>      

        <span class="navbar-toggler-container">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </div>

    <div class="small-devices-navbar-items">
        <?php echo e(menu('main', 'partials.menus.main')); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/small-nav.blade.php ENDPATH**/ ?>