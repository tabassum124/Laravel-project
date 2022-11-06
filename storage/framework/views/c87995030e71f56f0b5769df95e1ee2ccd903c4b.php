<div class="product-card" >
    <div class="product-badges">
        <?php if($product->isNew()): ?>
            <span class="badge product-badge-new">New</span>
        <?php endif; ?>    
    </div>

    <div class="product-image">
        <a href="<?php echo e(route('shop.show', $product->id)); ?>"><img src="<?php echo e($product->imgPath()); ?>" alt="product"></a>
    </div>

    <div class="product-details">
        <div class="product-details-top">
            <div class="product-name">
                <a href="<?php echo e(route('shop.show', $product->id)); ?>"><?php echo e(strlen($product->name) > 40 ? substr($product->name, 0, 40) . '...' : $product->name); ?></a>
            </div>

            <div class="product-price"><?php echo e($product->presentPrice()); ?></div>
        </div>

        <div class="product-actions">
            <?php if($product->isInCart()): ?>
                <div class="badge badge-success">Already in Cart</div>
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

            <?php if($product->isInWishlist()): ?>
                
                <form class="heart-item-form" action="<?php echo e(route('wishlist.destroy', $product->getCartRowId('wishlist'))); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="button-icon" title="Remove from Wishlist">
                        <i class="fas fa-heart solid-heart"></i>
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
                        <i class="far fa-heart"></i>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div> <!-- end product details -->
</div> <!-- end product card -->


<div class="product-card">
    <div class="product-badges">
        <?php if($product->isNew()): ?>
            <span class="badge product-badge-new">New</span>
        <?php endif; ?>    
    </div>

    <div class="product-image">
        <a href="<?php echo e(route('shop.show', $product->id)); ?>"><img src="<?php echo e($product->imgPath()); ?>" alt="product"></a>
    </div>

    <div class="product-details">
        <div class="product-details-top">
            <div class="product-name">
                <a href="<?php echo e(route('shop.show', $product->id)); ?>"><?php echo e(strlen($product->name) > 40 ? substr($product->name, 0, 40) . '...' : $product->name); ?></a>
            </div>

            <div class="product-price"><?php echo e($product->presentPrice()); ?></div>
        </div>

        <div class="product-actions">
            <?php if($product->isInCart()): ?>
                <div class="badge badge-success">Already in Cart</div>
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

            <?php if($product->isInWishlist()): ?>
                
                <form class="heart-item-form" action="<?php echo e(route('wishlist.destroy', $product->getCartRowId('wishlist'))); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="button-icon" title="Remove from Wishlist">
                        <i class="fas fa-heart solid-heart"></i>
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
                        <i class="far fa-heart"></i>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div> <!-- end product details -->
</div> <!-- end product card -->

<div class="product-card">
    <div class="product-badges">
        <?php if($product->isNew()): ?>
            <span class="badge product-badge-new">New</span>
        <?php endif; ?>    
    </div>

    <div class="product-image">
        <a href="<?php echo e(route('shop.show', $product->id)); ?>"><img src="<?php echo e($product->imgPath()); ?>" alt="product"></a>
    </div>

    <div class="product-details">
        <div class="product-details-top">
            <div class="product-name">
                <a href="<?php echo e(route('shop.show', $product->id)); ?>"><?php echo e(strlen($product->name) > 40 ? substr($product->name, 0, 40) . '...' : $product->name); ?></a>
            </div>

            <div class="product-price"><?php echo e($product->presentPrice()); ?></div>
        </div>

        <div class="product-actions">
            <?php if($product->isInCart()): ?>
                <div class="badge badge-success">Already in Cart</div>
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

            <?php if($product->isInWishlist()): ?>
                
                <form class="heart-item-form" action="<?php echo e(route('wishlist.destroy', $product->getCartRowId('wishlist'))); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="button-icon" title="Remove from Wishlist">
                        <i class="fas fa-heart solid-heart"></i>
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
                        <i class="far fa-heart"></i>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div> <!-- end product details -->
</div> <!-- end product card -->

<div class="product-card">
    <div class="product-badges">
        <?php if($product->isNew()): ?>
            <span class="badge product-badge-new">New</span>
        <?php endif; ?>    
    </div>

    <div class="product-image">
        <a href="<?php echo e(route('shop.show', $product->id)); ?>"><img src="<?php echo e($product->imgPath()); ?>" alt="product"></a>
    </div>

    <div class="product-details">
        <div class="product-details-top">
            <div class="product-name">
                <a href="<?php echo e(route('shop.show', $product->id)); ?>"><?php echo e(strlen($product->name) > 40 ? substr($product->name, 0, 40) . '...' : $product->name); ?></a>
            </div>

            <div class="product-price"><?php echo e($product->presentPrice()); ?></div>
        </div>

        <div class="product-actions">
            <?php if($product->isInCart()): ?>
                <div class="badge badge-success">Already in Cart</div>
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

            <?php if($product->isInWishlist()): ?>
                
                <form class="heart-item-form" action="<?php echo e(route('wishlist.destroy', $product->getCartRowId('wishlist'))); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="button-icon" title="Remove from Wishlist">
                        <i class="fas fa-heart solid-heart"></i>
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
                        <i class="far fa-heart"></i>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div> <!-- end product details -->
</div> <!-- end product card --><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/partials/product-card.blade.php ENDPATH**/ ?>