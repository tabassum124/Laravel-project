

<?php $__env->startSection('title', 'Shop'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docs-searchbar.js/dist/cdn/docs-searchbar.min.css" />
    <link rel="stylesheet" href="css/plugins/jquery.range.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumbs">
        <div class="container">
            <div>
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <?php if(request()->has('category')): ?>
                    <a href="<?php echo e(route('shop.index')); ?>">Shop</a>
                    <i class="fa fa-chevron-right breadcrumb-separator"></i>
                    <span class="visited"><?php echo e(ucfirst(request()->category)); ?></span>
                <?php else: ?>
                    <span class="visited">Shop</span>
                <?php endif; ?>
            </div>

            <?php echo $__env->make('partials.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section container">
        <div class="sidebar">
            <div class="inner-sidebar">
                <h3>Filter By Category</h3>
                <ul class="categories-list">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(request()->category == $category->slug): ?>
                            <li class="active"><?php echo e($category->name); ?></li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e(route('shop.index', ['category' => $category->slug, 'sort' => request()->sort])); ?>"><?php echo e($category->name); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul> <!-- end categories list -->

                <h3>Sort by Price</h3>
                <ul class="sort-by-price-list">
                    <li class="<?php echo e(request()->sort == 'high_low' ? 'active' : ''); ?>">
                        <?php if(request()->sort == 'high_low'): ?>
                            <span>High to Low</span>
                        <?php else: ?>
                            <a href="<?php echo e(route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])); ?>">High to Low</a>
                        <?php endif; ?>
                    </li>
                    <li class="<?php echo e(request()->sort == 'low_high' ? 'active' : ''); ?>">
                        <?php if(request()->sort == 'low_high'): ?>
                            <span>Low to High</span>
                        <?php else: ?>
                            <a href="<?php echo e(route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])); ?>">Low to High</a>
                        <?php endif; ?>
                    </li>
                </ul> <!-- end sort by price list -->

                <h3>Filter by Price</h3>
                <ul class="filter-by-price">
                    <input class="range-slider" type="hidden" value="25,75"/>
                </ul> <!-- end filter by price -->
            </div>
        </div> <!-- end sidebar -->

        <div class="products-section-all">
            <h1 class="stylish-heading"><?php echo e($categoryName); ?></h1>

            <div class="products text-center">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div>
                        <?php echo $__env->make('partials/product-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty">No items found</div>
                <?php endif; ?>
            </div> <!-- end products -->

            <?php echo e($products->appends(request()->input())->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    
    <script src="/js/plugins/jquery.range.js"></script>
    <script>
        $(document).ready(function(){
            $('.range-slider').jRange({
                from: 0,
                to: 20000,
                step: 100,
                scale: [0,10000,20000],
                format: '%s',
                width: 200,
                showLabels: true,
                isRange: true,
                theme: 'theme-blue',
                ondragend: (e) => {
                    priceRangeChanged(e);
                },
                onbarclicked: (e) => {
                    priceRangeChanged(e);
                }
            });

            let rangeValue = '<?php echo e(request()->minPrice); ?>' + ',' + '<?php echo e(request()->maxPrice); ?>';
            let re = new RegExp('[0-9]+,[0-9]+');

            $('.range-slider').jRange('setValue', rangeValue.search(re) !== -1 ? rangeValue : '0,30000');

            function priceRangeChanged(e) {
                let [min, max] = [...e.split(',')];
                let uri = window.location.search;

                uri = updateQueryStringParameter(uri, 'minPrice', min);
                uri = updateQueryStringParameter(uri, 'maxPrice', max);
                window.location = uri;
            }
        });

        function updateQueryStringParameter(uri, key, value) {
            if (uri) {
                if (uri.search(key) !== -1) {
                    // Key exists -> update uri
                    let re = new RegExp('(?<=' +key+ '\=).*?(?=(&|$))', 'i');
                    let oldKeyValuePairs = uri.substring(1).split('&');
                    let newURI = oldKeyValuePairs.reduce((uri, pair, index, arr) => {
                        if (pair.search(key) !== -1) {
                            uri += pair.replace(re, value);
                        } else {
                            uri += pair;
                        }
                        
                        return index < arr.length - 1 ? uri + '&' : uri;
                    }, '?');

                    return newURI;
                } else {
                    // Add key to uri
                    return uri + '&' + key + '=' + value;
                }
            } else {
                return '?' + key + '=' + value;
            }
        }
    </script>


    <?php echo $__env->make('partials.js.search-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-ecommerce\resources\views/shop.blade.php ENDPATH**/ ?>