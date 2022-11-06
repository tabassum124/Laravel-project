<div class="might-like-section">
    <div class="cards-container">
        <h2>You might also like...</h2>
        <div class="cards">
            <?php $__currentLoopData = $mightAlsoLike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials/product-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/might-like.blade.php ENDPATH**/ ?>