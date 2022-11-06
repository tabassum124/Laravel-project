

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docs-searchbar.js/dist/cdn/docs-searchbar.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumbs">
        <div class="container">
            <div>
                <a href="/">Home</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <a href="<?php echo e(route('shop.index')); ?>">Shop</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span class="visited"><?php echo e(substr($product->name, 0, 20)); ?></span>
            </div>
            
            <?php echo $__env->make('partials.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">
        <div class="product-section-images">
            <div class="product-section-main-image">
                <img src="<?php echo e($product->imgPath()); ?>" class="active" id="main_image" alt="product">
            </div>

            <?php if($product->images): ?>
                <?php if(count($images = json_decode($product->images)) > 0): ?>
                    <div class="product-section-thumbnails">
                        <div class="product-section-thumbnail selected">
                            <img src="<?php echo e($product->imgPath()); ?>" class="thumbnail" alt="product">
                        </div>

                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-section-thumbnail">
                                <img src="<?php echo e(asset('images/' . $image)); ?>" class="thumbnail" alt="product">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="product-section-information">
            <div class="product-section-first-row">
                <div class="product-section-title-badges">
                    <h2 class="product-section-title"><?php echo e($product->name); ?></h2>

                    <div class="product-badges">
                        <?php echo $productLevel; ?>


                        <?php if($product->isNew()): ?>
                            <span class="badge product-badge-new">New</span>
                        <?php endif; ?>    
                    </div> <!-- end product badges -->
                </div>
                
                <?php if($product->isInWishlist()): ?>
                    
                    <form class="heart-item-form" action="<?php echo e(route('wishlist.destroy', $product->getCartRowId('wishlist'))); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="button-icon" title="Remove from Wishlist">
                            <span class="remove-from-wishlist">Remove from Wishlist</span>&nbsp;<i class="fas fa-heart solid-heart"></i>
                        </button>
                    </form>
                <?php else: ?>
                    
                    <form class="heart-item-form" action="<?php echo e(route('wishlist.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="row_id" value="<?php echo e($product->getCartRowId('wishlist')); ?>">
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                        <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                        <button type="submit" class="button-icon" title="Add to Wishlist">
                            <span class="add-to-wishlist">Add to Wishlist</span>&nbsp;<i class="far fa-heart"></i>
                        </button>
                    </form>
                <?php endif; ?>
            </div>

            <div class="product-section-subtitle"><?php echo e($product->details); ?></div>
            
            <div class="product-section-price"><?php echo e($product->presentPrice()); ?></div>

            <p><?php echo $product->description; ?></p>

            <p>&nbsp;</p>

            <?php if($product->isAvailable()): ?>
                <?php if($product->isInCart()): ?>
                    <div class="alert-success">Item is already in Cart</div>
                <?php else: ?> 
                    <form action="<?php echo e(route('cart.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <?php if($rowId = $product->getCartRowId('wishlist')): ?>
                            <input type="hidden" name="row_id" value="<?php echo e($rowId); ?>">
                        <?php endif; ?>
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                        <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                        <button class="button button-plain add-to-cart-btn" type="submit">Add to Cart <i class="fa fa-cart-plus"></i></button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div> <!-- end product-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        
        (function() {
            let image = document.querySelector('#main_image');
            let thumbnails = document.querySelectorAll('.thumbnail');

            thumbnails.forEach((el) => {
                el.addEventListener('click', thumbnailClick);
            });

            function thumbnailClick(e) {
                document.querySelector('.product-section-thumbnail.selected').classList.remove('selected');
                this.parentElement.classList.add('selected');
                image.classList.remove('active');

                image.addEventListener('transitionend', () => {
                    image.src = this.src;
                    image.classList.add('active');
                });
            }
        }());

    </script>

    <?php echo $__env->make('partials.js.search-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/product.blade.php ENDPATH**/ ?>