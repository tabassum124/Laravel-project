<header>
    <div class="top-nav container large-devices-navbar">
        <?php if(request()->is('checkout') || request()->is('checkout/complete')): ?>
	        <div class="logo logo-checkout"><a href="/">Devcom</a></div>
	    <?php else: ?>
	        <div class="logo"><a href="/">Devcom</a></div>
        <?php endif; ?>
        
        <?php if(! request()->is('checkout') && ! request()->is('checkout/complete')): ?>
	        
	        <?php echo e(menu('main', 'partials.menus.main')); ?>

	    <?php endif; ?>
    </div> <!-- end top-nav -->

    <?php echo $__env->make('partials/small-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</header><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/nav.blade.php ENDPATH**/ ?>