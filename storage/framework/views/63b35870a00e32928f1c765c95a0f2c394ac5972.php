<?php if(count($errors->all())): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="validation-error-msg"><?php echo $error; ?></div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session()->has('error-msg')): ?>
	<div class="validation-error-msg"><?php echo e(session()->get('error-msg')); ?></div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/errors.blade.php ENDPATH**/ ?>