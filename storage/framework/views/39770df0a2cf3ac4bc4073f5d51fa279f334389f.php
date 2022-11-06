
<ul class="nav-left">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($menu_item->title == 'Categories'): ?>
            <li class="nav-item-dropdown" data-dropdown-menu="categories-dropdown-menu">
                <a class="custom-dropdown-toggle" data-dropdown-menu="categories-dropdown-menu" href="<?php echo e($menu_item->link()); ?>"><?php echo e($menu_item->title); ?></a>

                <div class="custom-dropdown-menu custom-dropdown-menu-categories">
                    <ul class="custom-dropdown-menu-ul" id="categories-dropdown-menu">
                        <?php $__currentLoopData = getCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('shop.index', ['category' => lcfirst($category->name)])); ?>"><?php echo e($category->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </li>
        <?php else: ?>
            <li>
            	<a class="nav-<?php echo e(lcfirst($menu_item->title)); ?>" href="<?php echo e($menu_item->link()); ?>"><?php echo e($menu_item->title); ?></a>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>


<ul class="nav-right">
    <?php if(auth()->guard()->guest()): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
        </li>
        <?php if(Route::has('register')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Sign Up')); ?></a>
            </li>
        <?php endif; ?>
    <?php else: ?>
        <li class="nav-item-dropdown" data-dropdown-menu="user-dropdown-menu">
            <a class="nav-link custom-dropdown-toggle" data-dropdown-menu="user-dropdown-menu" href="<?php echo e(route('profile.edit')); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
            </a>

            <div class="custom-dropdown-menu">
                <ul class="custom-dropdown-menu-ul" id="user-dropdown-menu">
                    <li>
                        <a href="<?php echo e(route('profile.edit')); ?>">My Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('orders.index')); ?>">My Orders</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <li>
        <a href="<?php echo e(route('wishlist.index')); ?>" title="Wishlist">
            <i class="far fa-heart"></i>
            <?php if(Cart::instance('wishlist')->count()): ?>
                <span class="wishlist-count"><span><?php echo e(Cart::instance('wishlist')->count()); ?></span></span>
            <?php endif; ?>
        </a> 
    </li>

    <li>
        <a href="<?php echo e(route('cart.index')); ?>" title="Cart">
            <i class="fa fa-cart-plus"></i> 
            <?php if(Cart::instance('default')->count()): ?>
                <span class="cart-count"><span><?php echo e(Cart::instance('default')->count()); ?></span></span>
            <?php endif; ?>
        </a> 
    </li>
</ul>

<script>

    
    var dropdownToggleList = document.querySelectorAll('.custom-dropdown-toggle');
    var dropdownMenuUlList = document.querySelectorAll('.custom-dropdown-menu-ul');
    var navItemDropdownList = document.querySelectorAll('.nav-item-dropdown');
    
    // Show dropdown menu when hovering over the user name
    if (dropdownToggleList.length) {
        dropdownToggleList.forEach(el => {
            el.addEventListener('mouseover', e => {
                document.getElementById(e.target.dataset.dropdownMenu).classList.add('show');
            });
        });
    }

    if (navItemDropdownList.length) {
        navItemDropdownList.forEach(el => {
            el.addEventListener('mouseleave', (e) => {
                document.getElementById(e.target.dataset.dropdownMenu).classList.remove('show');
            });
        });
    }

    if (dropdownMenuUlList) {
        dropdownMenuUlList.forEach((el) => {
            el.addEventListener('mouseover', (e) => {
                e.target.classList.add('show');
            });

            el.addEventListener('mouseleave', (e) => {
                e.target.classList.remove('show');
            });
        });
    }


    
    var sDropdownToggleList = document.querySelectorAll('.small-devices-navbar-items .custom-dropdown-toggle');
    var sDropdownMenuList = document.querySelectorAll('.small-devices-navbar-items .custom-dropdown-menu');
    
    // Show dropdown menu
    if (sDropdownToggleList.length) {
        sDropdownToggleList.forEach(el => {
            el.addEventListener('click', e => {
                e.preventDefault();
                e.target.parentElement.querySelector('#'+e.target.dataset.dropdownMenu).parentElement.classList.toggle('toggle-down');
            });
        });
    }

</script>
<?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/menus/main.blade.php ENDPATH**/ ?>