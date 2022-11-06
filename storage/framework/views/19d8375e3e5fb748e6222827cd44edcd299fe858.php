<ul>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
    		<?php if($menu_item->title == 'Follow Us:'): ?>
                <span><?php echo e($menu_item->title); ?></span>
            <?php else: ?>
        		<a href="<?php echo e($menu_item->link()); ?>"><i class="<?php echo e($menu_item->icon_class); ?>"></i></a>
    		<?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/menus/footer.blade.php ENDPATH**/ ?>