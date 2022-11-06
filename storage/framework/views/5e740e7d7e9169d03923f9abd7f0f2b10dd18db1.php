

<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <h1 class="checkout-heading stylish-heading">Checkout</h1>

        
        <?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($productsAreNoLongerAvailable): ?>
            <div class="validation-error-msg"><?php echo e($productsAreNoLongerAvailable); ?></div>
        <?php endif; ?>

        <div class="checkout-section">
            <div class="checkout-section-left">
                <form action="<?php echo e(route('checkout.validateDetails')); ?>" method="POST" id="checkout-form">
                    <h2>Billing Details</h2>

                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required="">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo e(old('phone_number')); ?>" required="">
                    </div>

                    <div class="form-group">
                        <label for="billing_address">Address</label>
                        <input type="text" class="form-control" id="billing_address" name="billing_address" value="<?php echo e(old('billing_address')); ?>" required="">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" required="">
                                <option value="">Select Country...</option>
                                <?php $__currentLoopData = countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country['val2']); ?>" <?php echo e(old('country') == $country['val2'] ? 'selected' : ''); ?>><?php echo e($country['val0']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo e(old('city')); ?>" required="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="<?php echo e(old('state')); ?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="number" class="form-control" id="postal_code" name="postal_code" value="<?php echo e(old('postal_code')); ?>" required="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <div class="address-checkbox-container">
                        <label id="address-checkbox" class="checkbox" for="same_shipping_address"><span class="check-mark">&#10003;</span></label> 
                        <input type="checkbox" name="same_shipping_address" id="same_shipping_address" class="hidden">
                        Check if Shipping Address is the same as Billing Address
                    </div>

                    <div id="shipping-details-container" class="shipping-details-container">
                        <h2>Shipping Details</h2>

                        <div class="form-group">
                            <label for="address_shipping">Address</label>
                            <input type="text" class="form-control" id="address_shipping" name="address_shipping" value="<?php echo e(old('address_shipping')); ?>" required="">
                        </div>

                        <div class="half-form">
                            <div class="form-group">
                                <label for="country_shipping">Country</label>
                                <select class="form-control" id="country_shipping" name="country_shipping" required="">
                                    <option value="">Select Country...</option>
                                    <?php $__currentLoopData = countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country['val2']); ?>" <?php echo e(old('country_shipping') == $country['val2'] ? 'selected' : ''); ?>><?php echo e($country['val0']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city_shipping">City</label>
                                <input type="text" class="form-control" id="city_shipping" name="city_shipping" value="<?php echo e(old('city_shipping')); ?>" required="">
                            </div>
                        </div> <!-- end half-form -->

                        <div class="half-form">
                            <div class="form-group">
                                <label for="state_shipping">State</label>
                                <input type="text" class="form-control" id="state_shipping" name="state_shipping" value="<?php echo e(old('state_shipping')); ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="postal_code_shipping">Postal Code</label>
                                <input type="number" class="form-control" id="postal_code_shipping" name="postal_code_shipping" value="<?php echo e(old('postal_code_shipping')); ?>" required="">
                            </div>
                        </div> <!-- end half-form -->
                    </div><!-- end shipping details container -->
                    
                    <div class="spacer"></div>

                    <div>
                        <button type="submit" class="button button-blue can-be-disabled" id="checkout-submit-btn">Continue</button>
                    </div>
                </form><!-- end form -->
            </div>

            <div class="checkout-section-right">
                <h2>Your Order</h2>

                <div class="checkout-table">
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="<?php echo e($item->model->imgPath()); ?>" alt="<?php echo e($item->model->name); ?>" class="checkout-table-img">

                                <div class="checkout-item-details">
                                    <div class="checkout-table-item"><?php echo e($item->model->name); ?></div>
                                    <div class="checkout-table-description"><?php echo e($item->model->details); ?></div>
                                    <div class="checkout-table-price"><?php echo e($item->model->presentPrice()); ?></div>

                                    <?php if(! $item->model->isAvailable()): ?>
                                        <span class="badge badge-danger">Not Available</span>
                                    <?php endif; ?>
                                </div>
                            </div> <!-- end checkout-table -->

                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity"><?php echo e($item->qty); ?></div>
                            </div>
                        </div> <!-- end checkout-table-row -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div> <!-- end checkout-table -->

                <?php echo $__env->make('checkout.partials.checkout-totals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div> <!-- end checkout-section -->
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('extra-js'); ?>
    <script>
        const shippingDetailsContainer = document.querySelector('#shipping-details-container');
        const shippingAddressElementIDs = ['address_shipping', 'country_shipping', 'city_shipping', 'state_shipping', 'postal_code_shipping'];
        const customAddressCheckbox = document.querySelector('#address-checkbox');

        document.querySelector('#same_shipping_address').addEventListener('change', e => {
            if (e.target.checked) {
                shippingDetailsContainer.style.maxHeight = '0';

                shippingAddressElementIDs.forEach(id => {
                    document.querySelector('#' + id).required = false;
                })
            } else {
                shippingDetailsContainer.style.maxHeight = '1000px';

                shippingAddressElementIDs.forEach(id => {
                    document.querySelector('#' + id).required = true;
                })
            }
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/checkout/details.blade.php ENDPATH**/ ?>