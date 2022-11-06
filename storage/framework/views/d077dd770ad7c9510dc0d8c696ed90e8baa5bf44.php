

<?php $__env->startSection('title', 'Shopping Cart'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docs-searchbar.js/dist/cdn/docs-searchbar.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumbs">
        <div class="container">
            <div>
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span class="visited">Wishlist</span>
            </div>

            <?php echo $__env->make('partials.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
            <?php if(count($errors)): ?>
                <ul class="validation-error-msg">
                    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <?php if(Cart::instance('wishlist')->count()): ?>
                <h2><?php echo e(Cart::instance('wishlist')->count()); ?> item(s) in Wishlist</h2>

                <div class="cart-table">
                    <?php $__currentLoopData = Cart::instance('wishlist')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cart-table-row">
                            <div class="cart-table-row-left wishlist-table-row-left">
                                <a href="<?php echo e(route('shop.show', $item->model->id)); ?>">
                                    <img src="<?php echo e($item->model->imgPath()); ?>" alt="item" class="cart-table-img">
                                </a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item">
                                        <a href="<?php echo e(route('shop.show', $item->model->id)); ?>"><?php echo e($item->model->name); ?></a>
                                    </div>
                                    <div class="cart-table-description"><?php echo e($item->model->details); ?></div>
                                </div>
                            </div>
                            <div class="cart-table-row-right wishlist-table-row-right">
                                <div><?php echo e($item->model->presentPrice()); ?></div>

                                <div class="cart-table-actions">
                                    
                                    <form class="heart-item-form" action="<?php echo e(route('wishlist.destroy', $item->rowId)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="button-icon" title="Remove from Wishlist">
                                            <i class="fas fa-heart solid-heart"></i>
                                        </button>
                                    </form>

                                    
                                    <form class="move-to-cart-form" action="<?php echo e(route('cart.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="row_id" value="<?php echo e($item->rowId); ?>">
                                        <input type="hidden" name="id" value="<?php echo e($item->model->id); ?>">
                                        <input type="hidden" name="name" value="<?php echo e($item->model->name); ?>">
                                        <input type="hidden" name="price" value="<?php echo e($item->model->price); ?>">
                                        <button class="button button-blue" type="submit">Move to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> <!-- end cart-table -->
            <?php else: ?> 
                <div class="empty">No items in your Wishlist!</div>
                <div class="spacer"></div>
                <a href="<?php echo e(route('shop.index')); ?>" class="button button-white">Continue Shopping</a>
                <div class="spacer"></div>
            <?php endif; ?>
        </div>

    </div> <!-- end cart-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <?php echo $__env->make('partials.js.search-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/wishlist.blade.php ENDPATH**/ ?>