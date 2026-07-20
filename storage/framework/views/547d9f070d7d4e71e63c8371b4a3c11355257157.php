
<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
        /* @media only screen and (max-width: 767px) {
            .custom-highlight-text {
                color: #000000 !important; 
            }
        } */

        @media only screen and (max-width: 767px) {
            .custom-sizing {
                padding: 0px 10px;
            }
        }

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

    /* .offer:hover {
        transform: scale(1.05);
    } */

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

    @media only screen and (max-width: 575px) {
        #custom-spacing{
            padding-top: 50px !important;
        }
    }
</style>



<?php
if(session::get('language')==2){
    $no_data_found = "Aucune donnée disponible";
}else{
    $no_data_found = "No data found";
}
$user_id = isset(auth()->guard('user')->user()->id) ? auth()->guard('user')->user()->id : '';

?>
<div class="loader" id="loader"></div> 
<!-- Banner -->
<section class="banner">
    <?php if(isset($banners) && count($banners) > 0): ?>
    <div class="swiper banner-slider">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $banner_title='';
            $banner_description='';
            $image_not_found = '';
            
            if(session::get('language')==2){                
                $banner_title = ($banner_result->title_fr)?$banner_result->title_fr:$banner_result->title;
                $banner_description= ($banner_result->description_fr)?$banner_result->description_fr:$banner_result->description;         
            }else{               
                $banner_title = $banner_result->title;
                $banner_description= $banner_result->description;;  
            }
            ?>
            <div class="swiper-slide">
                <div class="banner-wrapper">
                    <div class="banner-image">
                        <?php if(file_exists(public_path() . '/uploads/banners/'.$banner_result->photo)): ?>
                        <img src="<?php echo e(asset('uploads/banners/'.$banner_result->photo)); ?>" title="<?php echo e($banner_title); ?>" alt="<?php echo e($banner_title); ?>" />
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-11 offset-lg-1">
                        <div class="banner-text" style="color: <?php echo e($banner_result->text_color); ?>;">
                            <h1 style="color: <?php echo e($banner_result->text_color); ?>;"><?php echo e(@$banner_title); ?></h1>
                            <p style="color: <?php echo e($banner_result->text_color); ?>;"><?php echo e(@$banner_description); ?></p>
                                        <!-- <h1><?php echo e(@$banner_title); ?></h1>
                                        <p><?php echo e(@$banner_description); ?></p> -->
                                       
                                        <?php if($banner_result->type ==1 && $banner_result->category_id!="" && $banner_result->subcategory_id!="" ): ?>
                                            <a class="solid-button" href="<?php echo e(route('productlist',['id'=>Helper::encodeUrl($banner_result->category_id)])); ?>?sid=<?php echo e(Helper::encodeUrl($banner_result->subcategory_id)); ?>"><?php echo e(@Helper::language('explore_more')); ?></a>
                                        <?php elseif($banner_result->type ==1 && $banner_result->category_id!="" ): ?>
                                            <a href="<?php echo e(route('productlist',['id' => Helper::encodeUrl($banner_result->category_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
                                        <?php elseif($banner_result->type ==2 &&$banner_result->product_id!=""): ?>
                                            <a href="<?php echo e(route('productdetails',['id' => Helper::encodeUrl($banner_result->product_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('shop_now')); ?></a>
                                        <?php elseif($banner_result->type ==0 && $banner_result->brand_id!=""): ?>
                                        <a href="<?php echo e(route('filterbrandlist',['id' => Helper::encodeUrl($banner_result->brand_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
                                        <?php else: ?>
                                            <?php if(!empty($banner_result->banner_url)): ?>
                                                <a href="<?php echo e($banner_result->banner_url); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if( count($banners) > 1): ?>
        <div class="banner-button-row">
            <div class="banner-button-prev common-btn-prev"></div>
            <div class="banner-button-next common-btn-next"></div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>
<!-- End Banner -->

<!-- Shop By Spirit -->
<section class="shop-by-spirit py-60" id="custom-spacing">
    <div class="container">
        <h2 class="text-center mb-30"><?php echo e(@Helper::language('shop_by_spirit')); ?></h2>

        <div class="shop-slider-wrapper">
            <?php if(isset($categories) && count($categories) > 0): ?>
            <div class="swiper shop-spirit-slider">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if(session::get('language')==2){                    
                        $category_title = ($categories_result->title_fr)?$categories_result->title_fr:$categories_result->title;                     
                    }else{
                        $category_title = $categories_result->title;               
                    }
                    ?>
                    <div class="swiper-slide">
                        <a href="<?php echo e(route('productlist',['id'=>Helper::encodeUrl($categories_result->id)])); ?>" class="product-wrapper">
                            <div class="product-image">
                                <?php if(file_exists(public_path() . '/uploads/category/'.$categories_result->imagefile)): ?>
                                <img src="<?php echo e(asset('uploads/category/'.$categories_result->imagefile)); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>" />
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                                <?php endif; ?>
                            </div>
                            <h5><?php echo e($category_title); ?></h5>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php if(count($categories) > 10): ?>
                <div class="nav-btn-wrapper">
                    <div class="shop-spirit-button-prev common-btn-prev"></div>
                    <div class="shop-spirit-button-next common-btn-next"></div>
                </div>
            <?php endif; ?>
            <div class="swiper-scrollbar shop-spirit-scrollbar common-scroll"></div>
            <?php else: ?>
            <h3 class="text-center mb-30 text-danger"><?php echo e(@$no_data_found?:''); ?></h3>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Shop By Spirit -->

<!-- Free Shipping -->
<?php if(!empty($banners_offer)): ?>
<?php
if(session::get('language')==2){
    $boffer_title = ($banners_offer->title_fr)?$banners_offer->title_fr:$banners_offer->title;
    $boffer_description= ($banners_offer->description_fr)?$banners_offer->description_fr:$banners_offer->description;
}else{
    $boffer_title = $banners_offer->title;
    $boffer_description= $banners_offer->description;
}
?>
<section class="free-shipping" style="background-image: url('<?php echo e(asset('uploads/banners/'.$banners_offer->photo)); ?>');">
    <!-- <div class="container">
        <h2 class="m-0"><?php echo e($boffer_title); ?></h2>
        <span><?php echo e($boffer_description); ?></span> -->
        <div class="container" style="color: <?php echo e($banners_offer->text_color); ?>;">
        <h2 class="m-0" style="color: <?php echo e($banners_offer->text_color); ?>;"><?php echo e($boffer_title); ?></h2>
        <span style="color: <?php echo e($banners_offer->text_color); ?>;"><?php echo e($boffer_description); ?></span>
        <?php if($banners_offer->type ==1 && $banners_offer->category_id!="" && $banners_offer->subcategory_id!="" ): ?>
            <a class="solid-button" href="<?php echo e(route('productlist',['id'=>Helper::encodeUrl($banners_offer->category_id)])); ?>?sid=<?php echo e(Helper::encodeUrl($banners_offer->subcategory_id)); ?>"><?php echo e(@Helper::language('explore_more')); ?></a>
        <?php elseif($banners_offer->type ==1 && $banners_offer->category_id!="" ): ?>
        <a href="<?php echo e(route('productlist',['id' => Helper::encodeUrl($banners_offer->category_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
        <?php elseif($banners_offer->type ==2 &&$banners_offer->product_id!=""): ?>
        <a href="<?php echo e(route('productdetails',['id' => Helper::encodeUrl($banners_offer->product_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('order_now')); ?></a>
        <?php elseif($banners_offer->type ==0 && $banners_offer->brand_id!=""): ?>
        <a href="<?php echo e(route('filterbrandlist',['id' => Helper::encodeUrl($banners_offer->brand_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
        <?php else: ?>
            <?php if(!empty($banners_offer->banner_url)): ?>
                <a href="<?php echo e($banners_offer->banner_url); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- End Free Shipping -->


<!-- Offers -->
<?php if(isset($offer_product) && count($offer_product) > 0): ?>
<section class="offers py-60">
    <div class="container">
        <h2 class="text-center mb-30 text-white"><?php echo e(@Helper::language('offers')); ?></h2>
        <div class="offers-slider-wrapper">
            <?php if(count($offer_product) > 0): ?>
            <div class="swiper offers-slider pb-30">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $offer_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1=>$offer_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $product_title='';
                    if(session::get('language')==2){
                        $product_title = ($offer_result->product_name_fr)?$offer_result->product_name_fr:$offer_result->product_name;
                    }else{
                        $product_title = $offer_result->product_name;
                    }
                    $product_image = $offer_result->get_product_images->first();
                    $product_variant = $offer_result->get_product_variants->first();
                    $product_unit = Helper::getUnitById($product_variant->variant_uof);
                    $fav_data = Helper::userFavoriteProduct($offer_result->id);


                    // Cart
                    $gdisplay = 'none';
                    $adisplay = 'flex';
                    $is_in_cart = false;
                    $user_id = auth()->guard('user')->id();
                    $product_id = $offer_result->id;
                    $variant_id = $product_variant->id;
                    $available_qty = $product_variant->available_qty ?? 0;

                    $get_cart_array = Session::get('cart_info');

                    if(isset($get_cart_array)){           
                        if(array_key_exists($product_id,$get_cart_array)){
                            foreach($get_cart_array as $key => $variant_array){   
                                if($key==$product_id && array_key_exists($variant_id,$variant_array)){                       
                                    $is_in_cart = true;
                                }
                            }
                        }
                    }else{                                    
                        if($user_id) {
                            $cartItem = DB::table('cart')
                                ->where('user_id', $user_id)
                                ->where('product_id', $product_id)
                                ->where('status', 1)
                                ->first();

                            if($cartItem) {
                                $is_in_cart = true;
                            }
                        }
                    }   

                    if($is_in_cart==true){                                   
                        $gdisplay = 'flex';
                        $adisplay = 'none';
                    }


                    ?>
                    <div class="swiper-slide">
                        <div class="bs-box">
                            <div class="bs-image responsive-image">

                                <?php if($offer_result->bogo_status): ?>
                                    <div class="mb-1 mt-1">
                                        <span class="bogo" id="bogo">
                                            <?php echo e(@Helper::language('bogo')); ?>

                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if($offer_result->offer_status && !$offer_result->bogo_status): ?>
                                    <div class="mb-1 mt-1">
                                        <span class="offer" id="offer">
                                            <?php if($offer_result->offer_type === 'flat'): ?>
                                                Flat <?php echo e(intval($offer_result->discount_amount)); ?> <?php echo e(Helper::Settings('currency_symbol')); ?> Off
                                            <?php elseif($offer_result->offer_type === 'percentage'): ?>
                                                <?php echo e(intval($offer_result->discount_amount)); ?>% Off
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($offer_result->id)])); ?>" >
                                    <?php if(file_exists(public_path() . '/uploads/product/'.$product_image->image)): ?>					
                                    <img src="<?php echo e(asset('uploads/product/'.$product_image->image)); ?>" title="<?php echo e($product_title); ?>" />
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                                    <?php endif; ?> 
                                </a>
                            </div>
                            <div class="offers-content">
                                <h6>
                                    <a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($offer_result->id)])); ?>" class="heading-six"><?php echo e(@ucfirst($product_title)?: ''); ?> </a>
                                </h6>
                                <span class="text-sm grey-text"><?php echo e(@$product_variant->variant_size? $product_variant->variant_size.' '.$product_unit :''); ?></span>
                                

                                <div class="price-wrapper">
                                    <?php
                                        $original_price = $product_variant->variant_price;
                                        $final_price = $original_price;

                                        if ($offer_result->offer_status && !$offer_result->bogo_status) {
                                            if ($offer_result->offer_type === 'flat') {
                                                $final_price = max(0, $original_price - $offer_result->discount_amount);
                                            } elseif ($offer_result->offer_type === 'percentage') {
                                                $final_price = max(0, $original_price - ($original_price * $offer_result->discount_amount / 100));
                                            }
                                        }
                                    ?>

                                    <?php if($final_price < $original_price): ?>
                                        <span class="sell-price">
                                            <?php echo e($final_price); ?><?php echo e(Helper::Settings('currency_symbol')); ?>

                                        </span>
                                        <span class="original-price">
                                            <?php echo e($original_price); ?><?php echo e(Helper::Settings('currency_symbol')); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="sell-price">
                                            <?php echo e($original_price); ?><?php echo e(Helper::Settings('currency_symbol')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                                <?php if(!empty($offer_result->average_rating)): ?>
                                <div class="product-rating">
                                    <span class="text-sm black-text"><?php echo e(@$offer_result->average_rating?: ''); ?></span>
                                    <i class="icon-star-fill"></i>
                                </div>
                                <?php endif; ?>
                                

                                <?php if($available_qty>0): ?>
                                    <a style="display: <?php echo $adisplay ; ?>;" title="<?php echo e(Helper::language('add_to_cart')); ?>"  data-product-id="<?php echo e(Helper::encodeUrl($product_id)); ?>"  data-variant-id="<?php echo e($variant_id); ?>" data-bogo_status="<?php echo e($offer_result->bogo_status); ?>" data-offer_status="<?php echo e($offer_result->offer_status); ?>"  class="add-bucket"  href="javascript:void(0);"><i class="icon-bucket"></i></a>
                                <?php endif; ?>
                            </div>
                            <input class="fav-icon checked_box" type="checkbox" id="fav-item1<?php echo e($key1); ?>" value="<?php echo e((isset($fav_data) && $fav_data != false) ? '1' : "0"); ?>" <?php echo e((isset($fav_data) && $fav_data != false) ? 'checked' : ""); ?> onclick="return productFavTest(<?php echo e($offer_result->id); ?>,<?php echo e((isset($fav_data) && $fav_data != false) ? '1' : "0"); ?>)" />
                                <label class="fav-button" title="<?php echo e(Helper::language('add_to_favourite')); ?>" for="fav-item1<?php echo e($key1); ?>"></label>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="nav-btn-wrapper">
                <div class="offers-button-prev common-btn-prev"></div>
                <div class="offers-button-next common-btn-next"></div>
            </div>
            <div class="swiper-scrollbar offers-scrollbar common-scroll"></div>
            <?php else: ?>
            <h3 class="text-center mb-30 text-danger"><?php echo e(@$no_data_found?:''); ?></h3>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Offers -->

<!-- Our Highlights -->
<?php if(isset($banners_highlight) && count($banners_highlight) > 0): ?>
<section class="our-highlights py-60">
    <div class="container">
        <h2 class="text-center mb-30"><?php echo e(@Helper::language('our_highlights')); ?></h2>
        <?php if(isset($banners_highlight) && count($banners_highlight) > 0): ?>
        <div class="our-highlights-slider-wrapper">
            <div class="swiper our-highlights-slider pb-30">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $banners_highlight; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $banner_title='';
                    $banner_description='';
                    $image_not_found = '';
                    if(session::get('language')==1){
                    $banner_title = $highlight_result->title;
                    $banner_description= $highlight_result->description;
                    }else{
                    $banner_title = ($highlight_result->title_fr)?$highlight_result->title_fr:$highlight_result->title;
                    $banner_description= ($highlight_result->description_fr)?$highlight_result->description_fr:$highlight_result->description;
                    }
                    ?>
                    <div class="swiper-slide custom-sizing">
                        <div class="our-highlights-box">
                            <div class="our-highlights-image">
                                <?php if(file_exists(public_path() . '/uploads/banners/'.$highlight_result->photo)): ?>
                                <img src="<?php echo e(asset('uploads/banners/'.$highlight_result->photo)); ?>" title="<?php echo e($banner_title); ?>" alt="<?php echo e($banner_title); ?>" />
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="our-highlights-content">
                                <!-- <span><?php echo e($banner_title); ?></span>
                                <h3><?php echo e($banner_description); ?></h3> -->
                                <span class="custom-highlight-text" style="color: <?php echo e($highlight_result->text_color); ?>;"><?php echo e($banner_title); ?></span>
                                <h3 class="custom-highlight-text" style="color: <?php echo e($highlight_result->text_color); ?>;"><?php echo e($banner_description); ?></h3> 
                                
                                <?php
                                //  dd($highlight_result->category_id );
                                ?>
                                <?php if($highlight_result->type ==1 && $highlight_result->category_id!="" && $highlight_result->subcategory_id!="" ): ?>
                                <a class="solid-button" href="<?php echo e(route('productlist',['id'=>Helper::encodeUrl($highlight_result->category_id)])); ?>?sid=<?php echo e(Helper::encodeUrl($highlight_result->subcategory_id)); ?>"><?php echo e(@Helper::language('explore_more')); ?></a>
                                <?php elseif($highlight_result->type ==1 && $highlight_result->category_id!="" ): ?>
                                <a href="<?php echo e(route('productlist',['id' => Helper::encodeUrl($highlight_result->category_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
                                <?php elseif($highlight_result->type ==2 &&$highlight_result->product_id!=""): ?>
                                <a href="<?php echo e(route('productdetails',['id' => Helper::encodeUrl($highlight_result->product_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('order_now')); ?></a>
                                <?php elseif($highlight_result->type ==0 && $highlight_result->brand_id!=""): ?>
                                <a href="<?php echo e(route('filterbrandlist',['id' => Helper::encodeUrl($highlight_result->brand_id)])); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e($highlight_result->banner_url); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="nav-btn-wrapper">
                <div class="our-highlights-button-prev common-btn-prev"></div>
                <div class="our-highlights-button-next common-btn-next"></div>
            </div>
            <div class="swiper-scrollbar highlights-scrollbar common-scroll"></div>
        </div>
        <?php else: ?>
        <h3 class="text-center mb-30 text-danger"><?php echo e(@$no_data_found?:''); ?></h3>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- End Our Highlights -->
<!-- Best Seller -->
<?php if(isset($best_seller_product) && count($best_seller_product) > 0): ?>
<section class="best-seller py-60 offers">
    <div class="container">
        <h2 class="text-center mb-30 text-white"><?php echo e(@Helper::language('best_seller')); ?></h2>

        <div class="best-seller-wrapper">
            <?php if(count($best_seller_product) > 0): ?>
            <div class="swiper best-seller-slider pb-30">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $best_seller_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$best_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $product_title='';
                    if(session::get('language')==2){                        
                        $product_title = ($best_result->product_name_fr)?$best_result->product_name_fr:$best_result->product_name;
                    }else{
                        $product_title = $best_result->product_name;
                    }
                    $product_image = $best_result->get_product_images->first();
                    $product_variant = $best_result->get_product_variants->first();
                    $product_unit = Helper::getUnitById($product_variant->variant_uof);
                    
                    $fav_data = Helper::userFavoriteProduct($best_result->id);


                    // Cart
                    $gdisplay = 'none';
                    $adisplay = 'flex';
                    $is_in_cart = false;
                    $user_id = auth()->guard('user')->id();
                    $product_id = $best_result->id;
                    $variant_id = $product_variant->id;
                    $available_qty = $product_variant->available_qty ?? 0;

                    $get_cart_array = Session::get('cart_info');

                    if(isset($get_cart_array)){           
                        if(array_key_exists($product_id,$get_cart_array)){
                            foreach($get_cart_array as $key => $variant_array){   
                                if($key==$product_id && array_key_exists($variant_id,$variant_array)){                       
                                    $is_in_cart = true;
                                }
                            }
                        }
                    }else{                                    
                        if($user_id) {
                            $cartItem = DB::table('cart')
                                ->where('user_id', $user_id)
                                ->where('product_id', $product_id)
                                ->where('status', 1)
                                ->first();

                            if($cartItem) {
                                $is_in_cart = true;
                            }
                        }
                    }   

                    if($is_in_cart==true){                                   
                        $gdisplay = 'flex';
                        $adisplay = 'none';
                    }

                    ?>
                    <div class="swiper-slide">
                        <div class="bs-box">
                            <div class="bs-image">

                                 <?php if($best_result->bogo_status): ?>
                                    <div class="mb-1 mt-1">
                                        <span class="bogo" id="bogo">
                                            <?php echo e(@Helper::language('bogo')); ?>

                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if($best_result->offer_status && !$best_result->bogo_status): ?>
                                    <div class="mb-1 mt-1">
                                        <span class="offer" id="offer">
                                            <?php if($best_result->offer_type === 'flat'): ?>
                                                Flat <?php echo e(intval($best_result->discount_amount)); ?> <?php echo e(Helper::Settings('currency_symbol')); ?> Off
                                            <?php elseif($best_result->offer_type === 'percentage'): ?>
                                                <?php echo e(intval($best_result->discount_amount)); ?>% Off
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($best_result->id)])); ?>" >
                                    <?php if(file_exists(public_path() . '/uploads/product/'.$product_image->image)): ?>					
                                        <img src="<?php echo e(asset('uploads/product/'.$product_image->image)); ?>" title="<?php echo e($product_title); ?>" />
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                                    <?php endif; ?> 
                                </a>
                            </div>
                            <div class="bs-content">
                                <h6><a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($best_result->id)])); ?>" class="heading-six"><?php echo e(@ucfirst($product_title)?: ''); ?></a></h6>
                                <span class="text-sm grey-text"><?php echo e(@$product_variant->variant_size? $product_variant->variant_size.' '.$product_unit :''); ?></span>
                                

                                <div class="price-wrapper">
                                        <?php
                                            $original_price = $product_variant->variant_price;
                                            $final_price = $original_price;

                                            if ($best_result->offer_status && !$best_result->bogo_status) {
                                                if ($best_result->offer_type === 'flat') {
                                                    $final_price = max(0, $original_price - $best_result->discount_amount);
                                                } elseif ($best_result->offer_type === 'percentage') {
                                                    $final_price = max(0, $original_price - ($original_price * $best_result->discount_amount / 100));
                                                }
                                            }
                                        ?>

                                        <?php if($final_price < $original_price): ?>
                                            <span class="sell-price">
                                                <?php echo e($final_price); ?><?php echo e(Helper::Settings('currency_symbol')); ?>

                                            </span>
                                            <span class="original-price">
                                                <?php echo e($original_price); ?><?php echo e(Helper::Settings('currency_symbol')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="sell-price">
                                                <?php echo e($original_price); ?><?php echo e(Helper::Settings('currency_symbol')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>


                                <?php if(!empty($best_result->average_rating)): ?>
                                <div class="product-rating" >
                                    <span class="text-sm black-text"><?php echo e(@$best_result->average_rating?: ''); ?></span>
                                    <i class="icon-star-fill" ></i>
                                </div>
                                <?php endif; ?>
                                

                                <?php if($available_qty>0): ?>
                                    <a style="display: <?php echo $adisplay ; ?>;" title="<?php echo e(Helper::language('add_to_cart')); ?>"  data-product-id="<?php echo e(Helper::encodeUrl($product_id)); ?>"  data-variant-id="<?php echo e($variant_id); ?>" data-bogo_status="<?php echo e($best_result->bogo_status); ?>" data-offer_status="<?php echo e($best_result->offer_status); ?>" class="add-bucket"  href="javascript:void(0);"><i class="icon-bucket"></i></a>
                                <?php endif; ?>

                                </div>
                                <input class="fav-icon checked_box" type="checkbox" id="fav-item1<?php echo e($key2); ?>" value="<?php echo e((isset($fav_data) && $fav_data != false) ? '1' : "0"); ?>" <?php echo e((isset($fav_data) && $fav_data != false) ? 'checked' : ""); ?> onclick="return productFavTest(<?php echo e($best_result->id); ?>,<?php echo e((isset($fav_data) && $fav_data != false) ? '1' : "0"); ?>)" />
                                <label class="fav-button" title="<?php echo e(Helper::language('add_to_favourite')); ?>" for="fav-item1<?php echo e($key2); ?>"></label>
                            
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="nav-btn-wrapper">
                <div class="best-seller-button-prev common-btn-prev"></div>
                <div class="best-seller-button-next common-btn-next"></div>
            </div>
            <div class="swiper-scrollbar best-seller-scrollbar common-scroll"></div>
            <?php else: ?>
            <h3 class="text-center mb-30 text-danger"><?php echo e(@$no_data_found?:''); ?></h3>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Best Seller -->

<!-- Latest Blog -->
<section class="latest-blog py-60">
    <div class="container">
        
        <h2 class="text-center mb-40"><?php echo e(@Helper::language('event')); ?></h2>
        <div class="blog-wrapper mb-40">
            <div class="row blog-row">
                <?php if(isset($blogs) & (count($blogs) > 0 )): ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $blog_title='';
                if(session::get('language')==2){                    
                    $blog_title = ($blogs_result->title_fr)?$blogs_result->title_fr:$blogs_result->title;
                }else{
                    $blog_title = $blogs_result->title;
                }
                ?>
                <div class="col-md-4 col-sm-6 blog-col">
                    <div class="blog-box">
                        <div class="blog-image">
                            <?php if(file_exists(public_path() . '/uploads/blog/'.$blogs_result->image)): ?>
                            <img src="<?php echo e(asset('uploads/blog/'.$blogs_result->image)); ?>" title="<?php echo e($blog_title); ?>" />
                            <?php else: ?>
                            <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="blog-content">
                            <h5><a href="<?php echo e(url('blog-details/'.Helper::encodeUrl($blogs_result->id))); ?>"><?php echo e($blog_title); ?></a></h5>
                            <span><?php echo @$blogs_result->created_at ? Carbon\Carbon::parse($blogs_result->created_at)->format(env('DATE_FORMAT', 'Y-m-d')) : "-"; ?></span>
                            <a href="<?php echo e(url('blog-details/'.Helper::encodeUrl($blogs_result->id))); ?>" class="text-link"><?php echo e(Helper::language('read_more')); ?>

                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path id="Vector" d="M5.02442 4.9663C5.02536 5.05124 5.01005 5.13552 4.97939 5.21432C4.94872 5.29313 4.90331 5.36489 4.84573 5.42551L1.11855 9.3181C1.00158 9.44027 0.842405 9.5094 0.676054 9.5103C0.509704 9.51119 0.349799 9.44377 0.231517 9.32288C0.113236 9.20198 0.0462661 9.0375 0.0453413 8.86563C0.0444166 8.69375 0.109612 8.52857 0.226586 8.4064L3.51897 4.9744L0.196093 1.57799C0.0930913 1.45508 0.0387609 1.29655 0.0439595 1.13408C0.049158 0.971613 0.113503 0.81718 0.224135 0.701639C0.334766 0.586097 0.483537 0.517959 0.640718 0.510839C0.797899 0.503719 0.951912 0.558141 1.07198 0.663232L4.84084 4.51549C4.95689 4.63508 5.02282 4.79699 5.02442 4.9663Z" fill="#2B2B2B" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <h3 class="text-center mb-30 text-danger"><?php echo e(@$no_data_found?:''); ?></h3>
                <?php endif; ?>
            </div>
        </div>
        <?php if(isset($blogs) & (count($blogs) > 0 )): ?>
        <div class="btn-wrapper text-center">
            <a href="<?php echo e(route('frontend.blog')); ?>" class="solid-button"><?php echo e(@Helper::language('explore_more')); ?></a>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- End Latest Blog -->
<!-- Service -->
<?php echo $__env->make('frontend.service.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Service -->

<!-- Newsletter -->
<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Newsletter -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function productFavTest(product_id, status) {
        // alert('')
        var status = status;
        var user_id = $("#user_id").val();
        // alert(user_id);
        if (user_id) {
            // alert('ttt')
            action_url = "<?php echo e(route('productfav')); ?>";
        } else {
            // alert('ttt25')
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
                // return false;
                if(user_id != ''){
                    location.reload();
                }else{
                    location.href="<?php echo e(route('websitelogin')); ?>";
                }
                },
                error:function(){
                    
            }
        });

    }
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
                    updateCartUI();
                    if (response.success == "true") {
                        if (typeof shakeFloatingCart === 'function') shakeFloatingCart();
                    // Add shake animation to button
                    $this.addClass('shake');
                    $this.one('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function() {
                        $this.removeClass('shake');
                    });
                        // Swal.fire({
                        //     icon: "success",
                        //     title: success_message,
                        //     text: added_product_message,
                        //     customClass: {
                        //         confirmButton: 'swal-custom-confirm'
                        //     }
                        // });
                    }
                },
            });
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/home.blade.php ENDPATH**/ ?>