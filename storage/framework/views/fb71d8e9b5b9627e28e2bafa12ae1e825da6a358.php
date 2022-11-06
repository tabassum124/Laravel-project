<form class="search-form" id="search-form" action="<?php echo e(route('search')); ?>">
    <input type="search" name="query" id="search-bar-input" class="<?php $__errorArgs = ['query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(request()->input('query')); ?>" placeholder="what are you looking for?" required="" minlength="3">

    <button type="submit"><i class="fa fa-search"></i></button>

    <?php $__errorArgs = ['query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="invalid-feedback text-center" role="alert"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</form><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/search-form.blade.php ENDPATH**/ ?>