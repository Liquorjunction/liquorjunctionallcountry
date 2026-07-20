
<?php $__env->startSection('title', 'Special Offers'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
/* Base style for tab buttons */
.nav-tabs {
    border-bottom: none !important;
}

.nav-tabs .nav-link {
    padding: 0.5rem 1rem;
    border: 1px solid rgb(36, 36, 36);;
    color: rgb(36, 36, 36);
    background-color:  #fff;
    border-radius: 40px;
    font-size: 1.15rem;
    transition: all 0.3s ease;
    margin-right: 10px;
}

/* Active tab */
.nav-tabs .nav-link.active {
    background-color: rgb(36, 36, 36);;
    color: #fff;
    border-color: rgb(36, 36, 36);
}

/* Hover effect */
.nav-tabs .nav-link:hover {
    background-color:rgb(36, 36, 36);
    color: rgb(251, 181, 22);
    border-color: #fff;
}

/* Optional: Fix for focus outline (accessibility) */
.nav-tabs .nav-link:focus {
    box-shadow: none;
    outline: none;
}


/* Bogo */
   .bogo {
        /* position: absolute; */
        top: 5px;
        right: 14px;
        background-color: #fbb516;
        color: #242424;
        text-align: center;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
        text-transform: uppercase;
        padding:4px 12px;
        z-index: 1;
        border-radius: 28px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        white-space: nowrap;
        letter-spacing: 0.5px;
        transition: all 0.3s ease-in-out;
        transform: scale(1);
    }

    /* .bogo:hover {
        transform: scale(1.05);
    } */

    /* Discount */
     .offer {
        /* position: absolute; */
        top: 5px;
        right: 14px;
        background-color: #fbb516;
        color: #242424;
        text-align: center;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
        text-transform: uppercase;
        padding:4px 12px;
        z-index: 1;
        border-radius: 28px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        white-space: nowrap;
        letter-spacing: 0.5px;
        transition: all 0.3s ease-in-out;
        transform: scale(1);
    }

    .offer:hover {
        transform: scale(1.05);
    }


    /* Swal alerts */
     .swal-custom-confirm {
            background: #fbb516 !important; 
            color: black !important;
            border: 1px solid #fbb516 !important;
        }

        .swal-custom-confirm:focus {
            outline: none !important; 
            /* box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.5) !important;  */
            box-shadow: none !important; 
        }

        .swal2-icon.swal2-success {
            border-color: black !important;
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            border: 4px solid #fbb516 !important;
        }

        .swal2-icon.swal2-success .swal2-success-line-tip,
        .swal2-icon.swal2-success .swal2-success-line-long {
            background-color: #fbb516 !important;
        }


</style>


<div class="loader" id="loader"></div>


<?php if(!$has_offer_products && !$has_bogo_products): ?>
    <div class="text-center py-5">
        <div class="content-text">
            <div class="error-page largest-text">
                <div class="image-center" style="margin-right:55px;">
                    <img width="380px" src="<?php echo e(asset('assets/dashboard/images/error.png')); ?>" alt="offer-not-found">
                </div>
                <h2 class="mt-3">No active offers or promotions right now. Please check back later!</h2>
            </div>
        </div>
      
    </div>
<?php else: ?>
<section class="product-listing mt-5">
    <div class="container">
        <div class="row" id = "product_list">
            <div class="col-12">
                
                
                <ul class="nav nav-tabs mb-4" id="specialOfferTabs" role="tablist">
                    <?php if($has_offer_products): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="offer-tab" data-bs-toggle="tab" data-bs-target="#offer" type="button"
                            role="tab" aria-controls="offer" aria-selected="true">OFFER</button>
                    </li>
                    <?php endif; ?>

                    <?php if($has_bogo_products): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo e(!$has_offer_products ? 'active' : ''); ?>" id="bogo-tab" data-bs-toggle="tab"
                            data-bs-target="#bogo" type="button" role="tab" aria-controls="bogo"
                            aria-selected="false">BOGO</button>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="short-by">
                    
                    <p class="mb-0">
                        <?php echo e(Helper::language('all_products')); ?>

                        (
                        <span id="total_offer_page_count">
                            <?php echo e($offer_total_product_count ?: 0); ?>

                        </span>
                        <span id="total_bogo_page_count" style="display: none;">
                            <?php echo e($bogo_total_product_count ?: 0); ?>

                        </span>
                        Items )
                    </p>


                    <div class="short-by-block">
                        <form action="">
                            <select name="" id="sort-by">
                                <option value=""><?php echo e(Helper::language('sort_by')); ?></option>
                                <option value="1">Newest</option>
                                <option value="2"><?php echo e(Helper::language('high_to_low')); ?></option>
                                <option value="3"><?php echo e(Helper::language('low_to_high')); ?></option>
                                <option value="4">Popular</option>
                            </select>
                        </form>
                        
                    </div>
                </div>
                <div class="tab-content" id="specialOfferTabContent">
                    <?php if($has_offer_products): ?>
                        <div class="tab-pane fade show active" id="offer" role="tabpanel" aria-labelledby="offer-tab">
                            <div class="row product-listing-row" id="offer_table_data">
                                <?php echo $__env->make('frontend.product.ajax_filter_offer', [
                                    'offerProductData' => $offerProductData,
                                    'offer_total_product_count' => $offer_total_product_count,
                                    'offer_showing_product_count' => $offer_showing_product_count
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            
                            <div class="row">
                                <div class="offset-md-5 col-md-7">
                                    <div class="show-more">
                                        <button
                                            <?php if($offer_total_product_count != 0 && $offer_total_product_count > 16): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>
                                            class="solid-button show-more load-more-offer-data"><?php echo e(Helper::language('show_more')); ?></button>
                                        <?php if($offer_total_product_count != 0): ?>
                                            <p id="offer_showing"><?php echo e(Helper::language('showing')); ?>

                                                <span id="p-offer-current-count"><?php echo e($offer_showing_product_count ?: 0); ?> </span> of <span
                                                    id="p-offer-total-count"><?php echo e($offer_total_product_count); ?></span>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php endif; ?>
                    
                    <?php if($has_bogo_products): ?>
                    <div class="tab-pane fade <?php echo e(!$has_offer_products ? 'show active' : ''); ?>" id="bogo" role="tabpanel"
                        aria-labelledby="bogo-tab">
                        <div class="row product-listing-row" id="bogo_table_data">
                            <?php echo $__env->make('frontend.product.ajax_filter_bogo', [
                                'bogoProductData' => $bogoProductData,
                                'bogo_total_product_count' => $bogo_total_product_count,
                                'bogo_showing_product_count' => $bogo_showing_product_count
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        
                        <div class="row">
                            <div class="offset-md-5 col-md-7">
                                <div class="show-more">
                                    <?php if($bogo_total_product_count > 16): ?>
                                        <button class="solid-button show-more load-more-bogo-data"><?php echo e(Helper::language('show_more')); ?></button>
                                    <?php endif; ?>

                                    <?php if($bogo_total_product_count != 0): ?>
                                        <p id="bogo_showing"><?php echo e(Helper::language('showing')); ?>

                                            <span id="p-bogo-current-count"><?php echo e($bogo_showing_product_count ?: 0); ?> </span> of <span
                                                id="p-bogo-total-count"><?php echo e($bogo_total_product_count); ?></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php endif; ?>

                </div>
              

            </div>
        </div>
    </div>
</section>

<!-- Service -->
<?php echo $__env->make('frontend.service.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Service -->

<!-- Newsletter -->
<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Newsletter -->
<?php endif; ?>
<!-- End Product Listing -->


<div class="offcanvas offcanvas-end filteroffcanvas" tabindex="-1" id="filteroffcanvas"
aria-labelledby="offcanvasRightLabel" style="display: flex; flex-direction: column; height: 100%;">
<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel"><?php echo e(Helper::language('filter')); ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body" style="flex-grow: 1; overflow-y: auto;padding-bottom:10px;">

    
        <div class="wrapper">
            <div class="price-title">
                <p class="text-sm mb-0 black-text"><?php echo e(Helper::language('price')); ?></p>
            </div>
        
            <div class="values">
                <span id="range1">
                    <?php echo e($product_min_price->min_price . Helper::Settings('currency_symbol') ?: '0'); ?>

                </span>
                <span> &dash; </span>
                <span id="range2">
                    <?php echo e($product_max_price->max_price . Helper::Settings('currency_symbol') ?: '0'); ?>

                </span>
            </div>
        
            <div class="container-range">
                <div class="slider-track"></div>
        
                <!-- Sliders together -->
                <input type="range"
                    min="<?php echo e($product_min_price->min_price ?: '0'); ?>"
                    max="<?php echo e($product_max_price->max_price ?: '0'); ?>"
                    value="<?php echo e($product_min_price->min_price ?: '0'); ?>"
                    id="slider-1"
                    oninput="slideOne()">
        
                <input type="range"
                    min="<?php echo e($product_min_price->min_price ?: '0'); ?>"
                    max="<?php echo e($product_max_price->max_price ?: '0'); ?>"
                    value="<?php echo e($product_max_price->max_price ?: '0'); ?>"
                    id="slider-2"
                    oninput="slideTwo()">
            </div>
        
            <!-- ✅ Visible input boxes BELOW sliders -->
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <input type="number" name="min_price" id="min-price" value="<?php echo e($product_min_price->min_price); ?>" placeholder="Min">
                <input type="number" name="max_price" id="max-price" value="<?php echo e($product_max_price->max_price); ?>" placeholder="Max">
            </div>
        </div>
        
        <div class="filter-listing" style="padding: 0px 0px">
            <span class="filter-title custom-border m-3 border-2" style="background-color: #f1f1f1; padding-left:10px ; padding-right:10px;  
           border: 10px solid  #e4e2e2;"><?php echo e(Helper::language('category')); ?></span>
            <ul class="filter-list p-3" style="background-color:white; margin:15px;">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="check-group">
                            <input type="checkbox"
                                class="form-check-input product_categories  border border-dark"
                                name="product_categories[]"
                                value="<?php echo e($category->id); ?>"
                                id="category_id_<?php echo e($category->id); ?>">
                            <label for="category_id_<?php echo e($category->id); ?>" class="form-check-label">
                                <?php echo e(session('language') == 1 ? $category->title : $category->title_fr); ?>

                            </label>
                        </div>
        
                        <?php if($category->subcategory && $category->subcategory->count()): ?>
                            <ul class="sub-filter-list">
                                <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="padding-left: 12px;">
                                        <div class="check-group">
                                            <input type="checkbox"
                                                class="form-check-input subcategories border border-dark"
                                                name="subcategories[]"
                                                value="<?php echo e($sub->id); ?>"
                                                id="sub_category_<?php echo e($category->id); ?>_<?php echo e($sub->id); ?>"
                                                data-parent="<?php echo e($category->id); ?>">
                                            <label for="sub_category_<?php echo e($category->id); ?>_<?php echo e($sub->id); ?>" class="form-check-label">
                                                <?php echo e(session('language') == 1 ? $sub->title : $sub->title_fr); ?>

                                            </label>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        


        <?php if($brandData && count($brandData) > 0): ?>
             <div class="">
                <span class="filter-title m-3 p4 border-2" style="background-color: #f1f1f1 ; padding-left:10px ; padding-right:10px ;
                border: 10px solid #e4e2e2;"><?php echo e(Helper::language('brand')); ?></span>
                <div class="filter-list p-3" style="margin:15px">
                    <input type="text" id="brand-search"
                        placeholder="Search" onkeyup="filterBrands()"
                        class="form-control form-control-solid mb-3">
                    <ul id="brand-list">
                        <?php $__currentLoopData = $brandData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                if (session::get('language') == 1) {
                                    $brand_title = $brand_result->title;
                                } else {
                                    $brand_title = $brand_result->title_fr;
                                }
                            ?>
                           <li>
                            <div class="check-group">
                                <input class="form-check-input brands border border-dark" name="brands[]" type="checkbox"
                                    id="brands_<?php echo e($brand_result->id); ?>" value="<?php echo e($brand_result->id); ?>">
                                <label class="form-check-label"
                                    for="brands_<?php echo e($brand_result->id); ?>"><?php echo e($brand_title); ?></label>
                            </div>
                        </li>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="card-footer" style="padding: 31px;">
    <div class="filter-button">
        <div class="filter-button-group">
            <a href="javascript:void(0);" onclick="location.reload();" 
               id="clear-filter"
               style="background-color: #fff; color: #000; border: 0.5px solid #000; 
                      padding: 11px 40px; font-size: 16px; line-height: 24px;
                      cursor: pointer; text-align: center; text-decoration: none;
                      border-radius: 0; display: inline-flex; align-items: center;
                      justify-content: center; text-transform: uppercase; 
                      transition: all 0.4s ease;">
               <?php echo e(Helper::language('clear')); ?>

            </a>
 
            <a href="javascript:void(0);" id="apply-filter" 
               class="solid-button" data-bs-dismiss="offcanvas" 
               aria-label="Close">
               <?php echo e(Helper::language('apply_filter')); ?>

            </a>
        </div>
    </div>
 </div>
 </div>


<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>

<script>      
    const clearButton = document.getElementById('clear-filter');

    clearButton.addEventListener('mouseenter', () => {
        clearButton.style.backgroundColor = '#fbb516';
        clearButton.style.color = '#242424';             
        clearButton.style.border = '2px solid #fbb516';  
    });

    clearButton.addEventListener('mouseleave', () => {
        clearButton.style.backgroundColor = '#fff';     
        clearButton.style.color = '#000';                
        clearButton.style.border = '2px solid #000';   
    });
</script>

<script type="text/javascript">
        function brandsFilterIds() {
            var brand_ids = [];
            $.each($("input[name='brands[]']:checked"), function() {
                brand_ids.push($(this).val());
            });
            return brand_ids;
        }

        function categoryFilterIds() {
            var category_ids = [];
            $.each($("input[name='product_categories[]']:checked"), function() {
                category_ids.push($(this).val());
            });
            return category_ids;
        }

        function subCategoryFilterIds() {
            var subcategory_ids = [];
            $.each($("input[name='subcategories[]']:checked"), function() {
                subcategory_ids.push($(this).val());
            });
            return subcategory_ids;
        }

        function filterBrands() {
            const searchInput = document.getElementById('brand-search').value.toLowerCase();
            const brandList = document.getElementById('brand-list');
            const brands = brandList.getElementsByTagName('li');

            for (let i = 0; i < brands.length; i++) {
                const label = brands[i].querySelector('.form-check-label').textContent.toLowerCase();

                if (label.includes(searchInput)) {
                    brands[i].style.display = ''; 
                } else {
                    brands[i].style.display = 'none'; 
                }
            }
        }

        $(document).ready(function () {
            function updateProductCount() {
                if ($('#offer-tab').hasClass('active')) {
                    $('#total_offer_page_count').show();
                    $('#total_bogo_page_count').hide();
                } else if ($('#bogo-tab').hasClass('active')) {
                    $('#total_offer_page_count').hide();
                    $('#total_bogo_page_count').show();
                }
            }

            // On tab change
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
                updateProductCount();
            });

            // Run on page load
            updateProductCount();
        });


        $(document).ready(function() {
            $("#apply-filter, #sort-by").click(function() {
                getOfferProductData();
                getBogoProductData();
            });

            $(".load-more-offer-data").click(function() {
                $(".offer_product_counts").remove();
                var product_last_id = $("#offer-last-id").val();
                var sort_by = $("#sort-by").val();
                var brand_ids = brandsFilterIds();
                var category_ids = categoryFilterIds();
                var subcategory_ids = subCategoryFilterIds();
                var min_price = $("#min-price").val();
                var max_price = $("#max-price").val();
                var current_page_count = $("#p-offer-current-count").text();

                $.ajax({
                    url: "<?php echo e(route('loadfilterofferlist')); ?>?sort_by=" + sort_by + "&brand_ids=" +
                        brand_ids + "&category_ids=" + category_ids + "&subcategory_ids=" +
                        subcategory_ids + "&min_price=" + min_price + "&max_price=" + max_price +
                        '&product_last_id=' + product_last_id + "&current_page_count=" +
                        current_page_count,
                    beforeSend: function() {
                        $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(data) {
                        $('.loader').css("visibility", "hidden");
                        $('#appen-offer-html' + product_last_id).after(data);
                        $("#offer-last-id").remove();
                
                    }
                }).done(function() {
                    var current_count = $(".load_offer_products_ids").length;
                    $("#p-offer-current-count").text(current_count);
                    var pro_total_count = $("#p-offer-total-count").text();
                    
                    if (pro_total_count == current_count) {
                        $('.load-more-offer-data').hide();
                    }
                    else {
                        $('.load-more-offer-data').show(); 
                    }
                });
            });

            $(".load-more-bogo-data").click(function() {
                $(".bogo_product_counts").remove();
                var product_last_id = $("#bogo-last-id").val();
                var sort_by = $("#sort-by").val();
                var brand_ids = brandsFilterIds();
                var category_ids = categoryFilterIds();
                var subcategory_ids = subCategoryFilterIds();
                var min_price = $("#min-price").val();
                var max_price = $("#max-price").val();
                var current_page_count = $("#p-bogo-current-count").text();

                $.ajax({
                    url: "<?php echo e(route('loadfilterbogolist')); ?>?sort_by=" + sort_by + "&brand_ids=" +
                        brand_ids + "&category_ids=" + category_ids + "&subcategory_ids=" +
                        subcategory_ids + "&min_price=" + min_price + "&max_price=" + max_price +
                        '&product_last_id=' + product_last_id + "&current_page_count=" +
                        current_page_count,
                    beforeSend: function() {
                        $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(data) {
                        $('.loader').css("visibility", "hidden");
                        $('#appen-bogo-html' + product_last_id).after(data);
                        $("#bogo-last-id").remove();
                
                    }
                }).done(function() {
                    var current_count = $(".load_bogo_products_ids").length;
                    $("#p-bogo-current-count").text(current_count);
                    var pro_total_count = $("#p-bogo-total-count").text();
                    
                    if (pro_total_count == current_count) {
                        $('.load-more-bogo-data').hide();
                    }
                    else {
                        $('.load-more-bogo-data').show(); 
                    }
                });
            });
        })


        function getOfferProductData() {
            var brand_ids = brandsFilterIds();  
            var category_ids = categoryFilterIds(); 
            var subcategory_ids = subCategoryFilterIds();  
            var min_price = $("#min-price").val(); 
            var max_price = $("#max-price").val();  
            var sort_by = $("#sort-by").val();  

            // remove old data for load
            $("#p-offer-current-count").text(0); 
            $(".load-more-offer-data").show();

            $.ajax({
                url: "<?php echo e(route('loadfilterofferlist')); ?>", 
                data: {
                    sort_by: sort_by,
                    brand_ids: brand_ids,
                    category_ids: category_ids,
                    subcategory_ids: subcategory_ids,
                    min_price: min_price,
                    max_price: max_price,
                    current_page_count: 0
                },
                beforeSend: function() {
                    $(".loader").fadeIn();
                    $('.loader').css("visibility", "visible");
                },
                success: function(data) {
                    $('.loader').css("visibility", "hidden");
                    $('#offer_table_data').html(data);  
                    productOfferCountData(); 

                }
            });
        }

        function getBogoProductData() {
            var brand_ids = brandsFilterIds();  
            var category_ids = categoryFilterIds(); 
            var subcategory_ids = subCategoryFilterIds();  
            var min_price = $("#min-price").val(); 
            var max_price = $("#max-price").val();  
            var sort_by = $("#sort-by").val();  

            // remove old data for load
            $("#p-bogo-current-count").text(0); 
            $(".load-more-bogo-data").show();

            $.ajax({
                url: "<?php echo e(route('loadfilterbogolist')); ?>", 
                data: {
                    sort_by: sort_by,
                    brand_ids: brand_ids,
                    category_ids: category_ids,
                    subcategory_ids: subcategory_ids,
                    min_price: min_price,
                    max_price: max_price,
                    current_page_count: 0
                },
                beforeSend: function() {
                    $(".loader").fadeIn();
                    $('.loader').css("visibility", "visible");
                },
                success: function(data) {
                    $('.loader').css("visibility", "hidden");
                    $('#bogo_table_data').html(data);  
                    productBogoCountData(); 

                }
            });
        }

        function productOfferCountData() {
            $("#p-offer-current-count").text($("#offerProFcount").val());
            var pro_tcount = $("#offerProTcount").val();
            if (pro_tcount == 0) {
                $("#offer_showing").hide();
                pro_tcount = 0
            } else {
                $("#offer_showing").show();
            }
            $("#p-offer-total-count").text($("#offerProTcount").val());
            // $("#total_offer_page_count").text(pro_tcount);

             // Reset the visibility of the "Load More" button based on the new count
            var current_count = $(".load_offer_products_ids").length;
            if (pro_tcount > current_count) {
                $(".load-more-offer-data").show();
            } else {
                $(".load-more-offer-data").hide();
            }
        }

        function productBogoCountData() {
            $("#p-bogo-current-count").text($("#bogoProFcount").val());
            var pro_tcount = $("#bogoProTcount").val();
            if (pro_tcount == 0) {
                $("#bogo_showing").hide();
                pro_tcount = 0
            } else {
                $("#bogo_showing").show();
            }
            $("#p-bogo-total-count").text($("#bogoProTcount").val());
            // $("#total_bogo_page_count").text(pro_tcount);

            // Reset the visibility of the "Load More" button based on the new count
            var current_count = $(".load_bogo_products_ids").length;
            if (pro_tcount > current_count) {
                $(".load-more-bogo-data").show();
            } else {
                $(".load-more-bogo-data").hide();
            }
        }

        function productFav(product_id, status) {
            var status = status;
            var user_id = $("#user_id").val();
            if (user_id) {
                action_url = "<?php echo e(route('productfav')); ?>";
            } else {
                var url = "<?php echo e(route('websitelogin')); ?>";
                window.location.href = url;
            }
            var csrf = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: action_url,
                data: {
                    'user_id': user_id,
                    'product_id': product_id,
                    'status': status
                },
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                type: "POST",

                beforeSend: function() {
                    $(".loader").fadeIn();
                    $('.loader').css("visibility", "visible");
                },
                success: function(response) {
                    $('.loader').css("visibility", "visible");
                    if (user_id != '') {
                        location.reload();
                    } else {
                        location.href = "<?php echo e(route('websitelogin')); ?>";
                    }
                },
            });
        }

        var currency_type = "<?php echo e(Helper::Settings('currency_symbol')); ?>";
          
        $(document).ready(function () {
            // When a category is (un)checked, update its subcategories
            $('.product_categories').on('change', function () {
                const categoryId = $(this).attr('value'); // FIXED: .val() replaced
                const isChecked = $(this).is(':checked');

                $('.subcategories[data-parent="' + categoryId + '"]').prop('checked', isChecked);
                getProductData();
            });

            //  When a subcategory is (un)checked, update its parent category
            $('.subcategories').on('change', function () {
                const categoryId = $(this).data('parent');
                const subCheckboxes = $('.subcategories[data-parent="' + categoryId + '"]');
                const allChecked = subCheckboxes.length === subCheckboxes.filter(':checked').length;

                $('#category_id_' + categoryId).prop('checked', allChecked);
                getProductData();
            });

            //  On page load, sync parent checkboxes
            function checkCategorySelection() {
                $('.product_categories').each(function () {
                    const categoryId = $(this).attr('value'); // FIXED here too
                    const subCheckboxes = $('.subcategories[data-parent="' + categoryId + '"]');
                    const allChecked = subCheckboxes.length > 0 && subCheckboxes.length === subCheckboxes.filter(':checked').length;

                    $(this).prop('checked', allChecked);
                });
            }

            checkCategorySelection();

        })
</script>


<script type="text/javascript">
        function checkCategorySelection() {
            $('.product_categories').each(function () {
                const categoryId = $(this).val();
                const subCheckboxes = $("input.subcategories[data-parent='" + categoryId + "']");
                const checkedSubs = subCheckboxes.filter(":checked");

                // If all subcategories are checked => check parent
                if (subCheckboxes.length > 0 && subCheckboxes.length === checkedSubs.length) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });
        }

        // Trigger when subcategory changes
        $(document).on('change', '.subcategories', function () {
            checkCategorySelection();
        });

        // Run on page load
        $(document).ready(function () {
            checkCategorySelection();
        });
</script>

 <script>
    const sliderOne = document.getElementById("slider-1");
    const sliderTwo = document.getElementById("slider-2");
    const displayValOne = document.getElementById("range1");
    const displayValTwo = document.getElementById("range2");
    const minPriceInput = document.getElementById("min-price");
    const maxPriceInput = document.getElementById("max-price");
    const currency = "<?php echo e(Helper::Settings('currency_symbol') ?: 'GH₵'); ?>";

    const minGap = 1; 
    const sliderTrack = document.querySelector(".slider-track");
    const sliderMaxValue = parseFloat(sliderTwo.max);

    function ensureNonNegative(value) {
        return value < 0 ? 0 : value; 
    }

    function slideOne() {
        if (parseFloat(sliderTwo.value) - parseFloat(sliderOne.value) <= minGap) {
            sliderOne.value = parseFloat(sliderTwo.value) - minGap;
        }
        updateSlider();
    }

    function slideTwo() {
        if (parseFloat(sliderTwo.value) - parseFloat(sliderOne.value) <= minGap) {
            sliderTwo.value = parseFloat(sliderOne.value) + minGap;
        }
        updateSlider();
    }

    function updateSlider() {
        displayValOne.textContent = parseFloat(sliderOne.value).toFixed(2) + currency;
        displayValTwo.textContent = parseFloat(sliderTwo.value).toFixed(2) + currency;
        minPriceInput.value = sliderOne.value;
        maxPriceInput.value = sliderTwo.value;

        fillColor();
    }

    function fillColor() {
    let percent1 = (sliderOne.value / sliderMaxValue) * 100;
    let percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #d3d3d3 ${percent1}% , #FFA500 ${percent1}% , #FFA500 ${percent2}%, #d3d3d3 ${percent2}%)`;
    }

    // Initialize on page load
    window.addEventListener("DOMContentLoaded", () => {
        updateSlider();


        minPriceInput.addEventListener("focusout", () => {
            let minVal = parseFloat(minPriceInput.value) || 0;
            let maxVal = parseFloat(maxPriceInput.value) || sliderMaxValue;

            minVal = ensureNonNegative(minVal);

            // If min is greater than max, adjust max
            if (minVal > maxVal) {
                maxVal = minVal + minGap;
            }

            if (minVal < parseFloat(sliderOne.min)) {
                minVal = parseFloat(sliderOne.min);
            }

            if (maxVal > parseFloat(sliderTwo.max)) {
                maxVal = parseFloat(sliderTwo.max);
            }

            sliderOne.value = minVal;
            sliderTwo.value = maxVal;
            updateSlider();
        });

        maxPriceInput.addEventListener("focusout", () => {
            let minVal = parseFloat(minPriceInput.value) || 0;
            let maxVal = parseFloat(maxPriceInput.value) || sliderMaxValue;

            maxVal = ensureNonNegative(maxVal);

            // If min is greater than max, adjust max
            if (minVal > maxVal) {
                maxVal = minVal + minGap;
            }

            if (maxVal > parseFloat(sliderTwo.max)) {
                maxVal = parseFloat(sliderTwo.max);
            }

            sliderOne.value = minVal;
            sliderTwo.value = maxVal;
            updateSlider();
        });
    });
</script>


<script>
    // add to cart
    $(document).on('click', '.add-bucket', function(e) {
            e.preventDefault();

            var $this = $(this);
            $this.hide();

            var product_id = $this.data('product-id');
            var variantId = $this.data('variant-id');
            var bogo_status = $this.data('bogo_status');
            var offer_status = $this.data('offer_status');
            var quantity = 1;
            var action_url = "<?php echo e(route('productcartadd')); ?>";
            var csrf = "<?php echo e(csrf_token()); ?>";
            var currentCount = $(".cart-item-total-count").html();

            var added_product_message = "<?php echo e(\Helper::language('product_added_to_cart_successfully')); ?>";
            var success_message = "<?php echo e(\Helper::language('success')); ?>";

            $.ajax({
                url: action_url,
                data: {
                    'product_id': product_id,
                    'quantity': quantity,
                    'variantId': variantId,
                    'bogo_status':bogo_status,
                    'offer_status':offer_status
                },
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                type: "POST",
                beforeSend: function() {
                     $(".loader").fadeIn().css("visibility", "visible");
                },
                success: function(response) {
                    $('.loader').css("visibility", "hidden");
                    $('#cart-url').removeAttr("onclick").attr('href', '<?php echo e(route('cart')); ?>');
                    $(".cart-item-total-count").html(response.cart_count);
                    if (response.success == "true") {
                        updateCartUI();
                        // Swal.fire({
                        //     icon: "success",
                        //     title: success_message,
                        //     text: added_product_message,
                        //     customClass: {
                        //         confirmButton: 'swal-custom-confirm'
                        //     }
                        // });
                        if (typeof shakeFloatingCart === 'function') shakeFloatingCart();
                    // Add shake animation to button
                    $this.addClass('shake');
                    $this.one('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function() {
                        $this.removeClass('shake');
                    });
                    }
                },
            });
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/product/offer-list.blade.php ENDPATH**/ ?>