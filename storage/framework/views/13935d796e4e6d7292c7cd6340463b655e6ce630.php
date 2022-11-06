<div class="checkout-totals">
    <div class="checkout-totals-left">
        Subtotal <br>
        Tax(<?php echo e(config('cart.tax')); ?>%) <br>
        <div class="hr"></div>
        New Subtotal <br>
        <?php if($discount): ?>
            Discount (<?php echo e($discountPercent ? $discountPercent.'%' : presentPrice($discount)); ?>) 
            <form class="remove-coupon-form" action="<?php echo e(route('coupon.destroy')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button type="submit" class="button-icon">Remove</button>
            </form>
            <br>
        <?php endif; ?>
        <span class="checkout-totals-total">Total</span>
    </div>

    <div class="checkout-totals-right">
        <?php echo e(presentPrice($subtotal)); ?> <br>
        <?php echo e(presentPrice($tax)); ?> <br>
        <div class="hr"></div>
        <?php echo e(presentPrice($newSubtotal)); ?> <br>
        <?php if($discount): ?>
            -<?php echo e(presentPrice($discount)); ?> <br>
        <?php endif; ?>
        <span class="checkout-totals-total"><?php echo e(presentPrice($total)); ?></span>
    </div>
</div> <!-- end checkout-totals --><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/checkout/partials/checkout-totals.blade.php ENDPATH**/ ?>