

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="auth-pages login-checkout">
            <div class="auth-left">
                <?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <h2>Returning Customer</h2>
                <div class="spacer"></div>

                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>


                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required autofocus>
                    <input type="password" id="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required>

                    <div class="login-container">
                        <button type="submit" class="button button-black">Login</button>
                        <label>
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                        </label>
                    </div>

                    <div class="spacer"></div>

                    <a href="<?php echo e(route('password.request')); ?>">
                        Forgot Your Password?
                    </a>

                </form>
            </div>

            <div class="auth-right">
                <h2>New Customer</h2>
                <div class="spacer"></div>
                <p><strong>Save time now.</strong></p>
                <p>You don't need an account to checkout.</p>
                <div class="spacer"></div>
                <a href="<?php echo e(route('checkout.detailsIndex')); ?>" class="button button-white">Continue as Guest</a>
                <div class="spacer"></div>
                &nbsp;
                <div class="spacer"></div>
                <p><strong>Save time later.</strong></p>
                <p>Create an account for fast checkout and easy access to order history.</p>
                <div class="spacer"></div>
                <a href="<?php echo e(route('register')); ?>" class="button button-white">Create Account</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/auth/loginToCheckout.blade.php ENDPATH**/ ?>