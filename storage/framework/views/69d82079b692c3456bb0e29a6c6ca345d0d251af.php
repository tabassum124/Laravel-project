

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
                <span class="visited">Shopping Cart</span>
            </div>

            <?php echo $__env->make('partials.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
            <?php if(count($errors)): ?>
                <ul class="validation-error-msg">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <?php if(Cart::count()): ?>
                <h2><?php echo e(Cart::count()); ?> item(s) in Shopping Cart</h2>

                <div class="cart-table">
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="<?php echo e(route('shop.show', $item->model->id)); ?>">
                                    <img src="<?php echo e($item->model->imgPath()); ?>" alt="<?php echo e($item->model->name); ?>" class="cart-table-img">
                                </a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item">
                                        <a href="<?php echo e(route('shop.show', $item->model->id)); ?>"><?php echo e($item->model->name); ?></a>
                                    </div>
                                    <div class="cart-table-description"><?php echo e($item->model->details); ?></div>

                                    <?php if(! $item->model->isAvailable()): ?>
                                        <span class="badge badge-danger">Not Available</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="quantity-section">
                                    
                                    <form class="quantity-form" action="<?php echo e(route('cart.update', $item->model)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>

                                        <input type="hidden" name="row_id" value="<?php echo e($item->rowId); ?>">
                                        <input 
                                            type="number" 
                                            name="quantity" 
                                            class="quantity" 
                                            value="<?php echo e($item->qty); ?>" min="1" max="<?php echo e($item->model->quantity); ?>">
                                    </form>

                                    <div><?php echo e(presentPrice($item->subtotal())); ?></div>
                                </div>

                                <div class="cart-table-actions">
                                    
                                    <form class="heart-item-form" action="<?php echo e(route('wishlist.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="row_id" value="<?php echo e($item->rowId); ?>">
                                        <input type="hidden" name="id" value="<?php echo e($item->model->id); ?>">
                                        <input type="hidden" name="name" value="<?php echo e($item->model->name); ?>">
                                        <input type="hidden" name="price" value="<?php echo e($item->model->price); ?>">
                                        <button type="submit" class="button-icon" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </form>

                                    
                                    <form class="remove-item-form" action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" title="Remove from Cart"><span>x</span></button>
                                    </form> 
                                </div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> <!-- end cart-table -->

                <div class="cart-totals">
                    <div class="cart-totals-left">
                        <?php if(! session()->has('coupon')): ?>
                            <div class="have-coupon-container">
                                <span class="have-coupon">Have a Coupon?</span>
                
                                <form id="coupon-form" action="<?php echo e(route('coupon.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <input type="text" name="code">
                                    <button type="submit" class="button-black">Apply</button>
                                </form>
                            </div> <!-- end have-coupon-container -->
                        <?php endif; ?>
                    </div>

                    <div class="cart-totals-right">
                        <div class="totals-left">
                            Subtotal: <br>
                            Tax: <span class="small-text">(<?php echo e(config('cart.tax')); ?>%)</span> <br>
                            <div class="hr"></div>
                            New Subtotal: <br>
                            <?php if($discount): ?>
                                Discount: <span class="small-text"><?php echo e($discountPercent ? '(' .$discountPercent. '%)' : ''); ?></span>
                                <form class="remove-coupon-form" action="<?php echo e(route('coupon.destroy')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit" class="button-icon-red">Remove</button>
                                </form>
                                <br>
                            <?php endif; ?>
                            <span class="checkout-totals-total">Total:</span>
                        </div>

                        <div class="totals-right">
                            <?php echo e(presentPrice($subtotal)); ?> <br>
                            <?php echo e(presentPrice($tax)); ?> <br>
                            <div class="hr"></div>
                            <?php echo e(presentPrice($newSubtotal)); ?> <br>
                            <?php if($discount): ?>
                                -<?php echo e(presentPrice($discount)); ?> <br>
                            <?php endif; ?>
                            <span class="checkout-totals-total"><?php echo e(presentPrice($total)); ?></span>
                        </div>
                    </div>
                </div> <!-- end cart-totals -->

                <div class="cart-buttons">
                    <a href="<?php echo e(route('shop.index')); ?>" class="button button-white">Continue Shopping</a>
                    <a href="<?php echo e(auth()->user() ? route('checkout.detailsIndex') : route('loginToCheckout')); ?>" class="button button-green proceed-to-checkout-button">Proceed to Checkout</a>
                </div>
            <?php else: ?> 
                <div class="empty">No items in Cart!</div>
                <div class="spacer"></div>
                <a href="<?php echo e(route('shop.index')); ?>" class="button button-white">Continue Shopping</a>
                <div class="spacer"></div>
            <?php endif; ?>
        </div>

    </div> <!-- end cart-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('extra-js'); ?>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    <script>

        (function() {
            var quantityInputs = document.querySelectorAll('.quantity');
            var events = ['change', 'keydown'];

            events.forEach(function(event) {
                quantityInputs.forEach(function(input) {
                    input.addEventListener(event, function(e) {
                        var form = e.target.form;

                        if (! Boolean(form.getElementsByClassName('quantity-submit')[0])) {
                            var div = document.createElement('div');
                            div.innerHTML = '<button type="submit" class="button-blue quantity-submit">Save</button>';

                            form.append(div);
                        }
                    });
                });
            }); 
        }());

        function showSubmitBtn() {
            console.log(e);
        }

    </script>

    <?php echo $__env->make('partials.js.search-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/cart.blade.php ENDPATH**/ ?>