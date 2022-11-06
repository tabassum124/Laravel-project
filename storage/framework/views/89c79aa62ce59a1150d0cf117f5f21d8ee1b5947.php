<?php if(session()->has('success-message')): ?>
    <div class="success-session-msg">
    	<i class="far fa-check-circle"></i>
    	<p><?php echo e(session()->get('success-message')); ?></p>
    </div>
<?php endif; ?>

<?php if(session()->has('error-message')): ?>
    <div class="error-session-msg"><?php echo e(session()->get('error-message')); ?></div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/session-messages.blade.php ENDPATH**/ ?>