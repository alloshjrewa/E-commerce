<?php $__env->startSection('style'); ?>
    <style type="text/css">
    .active-color {border:3px solid #000 !important ;}
    </style>
    <link rel="stylesheet" href="<?php echo e(url('assets/css/plugins/nouislider/nouislider.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <?php if(!empty($getSubCategory)): ?>
                    <h1 class="page-title"><?php echo e($getSubCategory->name); ?></h1>
                <?php elseif(!empty($getCategory)): ?>
                    <h1 class="page-title"><?php echo e($getCategory->name); ?></h1>
                <?php else: ?>
                <h1 class="page-title">Search For <?php echo e(Request::get('q')); ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                    <?php if(!empty($getSubCategory)): ?>
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="<?php echo e(url($getCategory->slug)); ?>"><?php echo e($getCategory->name); ?></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="<?php echo e(url($getCategory->slug . '/' . $getSubCategory->slug)); ?>"><?php echo e($getSubCategory->name); ?></a>
                        </li>
                    <?php elseif(!empty($getCategory)): ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($getCategory->name); ?></li>
                    <?php endif; ?>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span><?php echo e($getProducts->perPage()); ?> of <?php echo e($getProducts->total()); ?></span> Products
                                </div>
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control ChangeSortBy">
                                            <option value="" >select</option>
                                            <option value="popularity" >Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="getProductAjax">
                            <?php echo $__env->make('product._index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <a href="javascript:;" <?php if(empty($page)): ?> style="display: none" <?php endif; ?> data-page = <?php echo e($page); ?> class="btn btn-primary LoadMore">Load More</a>
                </div>
            </div>

                    <aside class="col-lg-3 order-lg-first">
                        <form id="FilterForm" method="POST" action="">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="q" value="<?php echo e(!empty(Request::get('q'))  ? Request::get('q') : ''); ?>">
                            <input type="hidden" name="old_sub_category_id" value="<?php echo e(!empty($getSubCategory) ? $getSubCategory->id : ''); ?>">
                            <input type="hidden" name="old_category_id" value="<?php echo e(!empty($getCategory) ? $getCategory->id : ''); ?>">
                            <input type="hidden" name="sort_by_id" id="get_sort_by_id">
                            <input type="hidden" name="sub_category_id" id="get_sub_category_id">
                            <input type="hidden" name="brand_id" id="get_brand_id">
                            <input type="hidden" name="color_id" id="get_color_id">
                            <input type="hidden" name="start_price" id="get_start_price">
                            <input type="hidden" name="end_price" id="get_end_price">

                        </form>
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3>
                                <?php if(!empty($getSubCategoryFilter)): ?>
                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">

                                            <?php $__currentLoopData = $getSubCategoryFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="filter-item">

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input ChangeCategory" value="<?php echo e($f_category->id); ?>" id="cat-<?php echo e($f_category->id); ?>">
                                                    <label class="custom-control-label" for="cat-<?php echo e($f_category->id); ?>"><?php echo e($f_category->name); ?></label>
                                                </div>
                                                <span class="item-count"><?php echo e($f_category->TotalProduct()); ?></span>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                        aria-controls="widget-3">
                                        color
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            <?php $__currentLoopData = $getColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="javascript:;" class= "ChangeColor " data-val = '0' id= "<?php echo e($f_color->id); ?>"
                                                style="background: <?php echo e($f_color->code); ?>;">
                                                <span class="sr-only" >
                                                    <?php echo e($f_color->name); ?>

                                                </span>
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                        aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                        <?php $__currentLoopData = $getBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input ChangeBrand" value="<?php echo e($f_brand->id); ?>" id="brand-<?php echo e($f_brand->id); ?>">
                                                <label class="custom-control-label" for="brand-<?php echo e($f_brand->id); ?>"><?php echo e($f_brand->name); ?></label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                        aria-controls="widget-5">
                                        Price
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                Price Range:
                                                <span id="filter-price-range"></span>
                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('assets/js/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/wNumb.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/bootstrap-input-spinner.js')); ?>"></script>
    <script type="text/javascript">

    $('.ChangeSortBy').change(function () {
        var id = $(this).val();

            $('#get_sort_by_id').val(id);
            FilterForm()
        });
        $('.ChangeCategory').change(function () {
            var ids = '';
            $('.ChangeCategory').each(function () {
                if(this.checked){
                    var id = $(this).val();
                    ids += id + ',';
                }
            });
            $('#get_sub_category_id').val(ids);
            FilterForm()
        });
        $('.ChangeBrand').change(function () {
            var ids = '';
            $('.ChangeBrand').each(function () {
                if(this.checked){
                    var id = $(this).val();
                    ids += id + ',';
                }
            });
            $('#get_brand_id').val(ids);
            FilterForm()
        });
        $('.ChangeColor').click(function () {
            var id = $(this).attr('id');
            var status = $(this).attr('data-val');
            if(status == 0){
                $(this).attr('data-val',1);
                $(this).addClass('active-color');
            }else {
                $(this).attr('data-val',0);
                $(this).removeClass('active-color')
            }
            var ids = '';
            $('.ChangeColor').each(function () {
                var status = $(this).attr('data-val');
                if(status == 1){
                    var id = $(this).attr('id');
                    ids += id + ',';
                }
            });
            $('#get_color_id').val(ids);
            FilterForm();
        });
        var xhr;

        function FilterForm(){
            if(xhr && xhr.readyState != 4){
                xhr.abort();
            }
          xhr =  $.ajax({
                type : "POST" ,
                url  : "<?php echo e(url('get_filter_product_ajax')); ?>",
                data : $('#FilterForm').serialize(),
                dataType : "json",
                success  : function(data){
                    $('#getProductAjax').html(data.success)
                    $('.LoadMore').attr('data-page' , data.page);
                    if(data.page == 0){
                        $('.LoadMore').hide();
                    }
                    else{
                        $('.LoadMore').show();
                    }
                },
                error    : function(data){}
            });
        }

        $('body').delegate('.LoadMore' , 'click' , function () {
            var page = $(this).attr('data-page');
            $('.LoadMore').html('Loading ... ');
            if(xhr && xhr.readyState != 4){
                xhr.abort();
            }
            xhr =  $.ajax({
                type : "POST" ,
                url  : "<?php echo e(url('get_filter_product_ajax')); ?>?page="+page,
                data : $('#FilterForm').serialize(),
                dataType : "json",
                success  : function(data){
                    $('#getProductAjax').append(data.success)
                    $('.LoadMore').attr('data-page' , data.page);
                    $('.LoadMore').html('Loading More');
                    if(data.page == 0){
                        $('.LoadMore').hide();
                    }
                    else{
                        $('.LoadMore').show();
                    }
                },
                error    : function(data){}
            });
        });
        var i = 0;
        if ( typeof noUiSlider === 'object' ) {
    	var priceSlider  = document.getElementById('price-slider');

    	noUiSlider.create(priceSlider, {
    		start: [ 0, 1000 ],
    		connect: true,
    		step: 1,
    		margin: 1,
    		range: {
    			'min': 0,
    			'max': 1000
    		},
    		tooltips: true,
    		format: wNumb({
    	        decimals: 0,
    	        prefix: '$'
    	    })
    	});
        priceSlider.noUiSlider.on('update', function(values, handle ){
            var start_price = values[0];
            var end_price = values[1];
            $('#get_start_price').val(start_price);
            $('#get_end_price').val(end_price);
            $('#filter-price-range').text(values.join(' - '));
            if( i == 0 || i == 1){
                i++;
            }else{
                FilterForm();
            }


        });
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/product/index.blade.php ENDPATH**/ ?>