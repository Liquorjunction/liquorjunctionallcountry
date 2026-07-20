
<input type="hidden" name="user_id" id="user_id" value="<?php echo e(@$user_id); ?>">
<?php if(!empty($bogoProductData) && count($bogoProductData) > 0): ?>
<?php
    $last_id = '';
    $i=0
?>
<?php $__currentLoopData = $bogoProductData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $product_title='';
    if(session()->get('language')==1){
        $product_title = $result->product_name;
        $image_not_found = 'Image not available';
    }else{
        $product_title = $result->product_name_fr;
        $image_not_found = 'Image non disponible';
    }   
    
    $product_image = $result->image;            
    $product_unit = Helper::getUnitById(@$result->variant_uof);       
    $fav_data = Helper::userFavoriteProduct($result->product_id);    
?>
<div class="col-lg-3 col-md-4 col-sm-6 product-listing-col">
    <div class="bs-box">
        <div class="bs-image">

            <div class="mb-1 mt-1">
                <?php if($result->bogo_status): ?>
                    <span class="bogo" id="bogo">
                            <?php echo e(@Helper::language('bogo')); ?>

                    </span>
                <?php endif; ?>
            </div>

            <a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($result->product_id)])); ?>" >
                <?php if(file_exists(public_path() . '/uploads/product/'.$product_image)): ?>					
                <img src="<?php echo e(asset('uploads/product/'.$product_image)); ?>" title="<?php echo e($product_title); ?>" />
                <?php else: ?>
                <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e($image_not_found); ?>" alt="<?php echo e($image_not_found); ?>">
                <?php endif; ?> 
            </a>                                    
        </div>
        <div class="bs-content">
            <h6><a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($result->product_id)])); ?>" class="heading-six"><?php echo e(@ucfirst($product_title)?: ''); ?></a></h6>
            <span class="text-sm grey-text"><?php echo e(@$result->variant_size? $result->variant_size.' '.$product_unit :''); ?></span>
            <div class="price-wrapper">
                <?php if($result->variant_discounted_price=='' || $result->variant_discounted_price==0): ?>
                    <span class="sell-price"> <?php echo e(@$result->variant_price? $result->variant_price.Helper::Settings( 'currency_symbol') :''); ?></span>                                        
                <?php else: ?>
                    <span class="sell-price"> <?php echo e(@$result->variant_discounted_price?    $result->variant_discounted_price.Helper::Settings( 'currency_symbol') :''); ?></span>
                    <span class="original-price"><?php echo e(@$result->variant_price? $result->variant_price.Helper::Settings( 'currency_symbol') :''); ?></span>
                <?php endif; ?>
            </div>
            <?php if(!empty($result->average_rating)): ?>
                <div class="product-rating">
                    <span class="text-sm black-text"><?php echo e(@$result->average_rating?: ''); ?></span>
                    <i class="icon-star-fill"></i>
                </div>
                <?php endif; ?>

                <?php
                    $gdisplay = 'none';
                    $adisplay = 'flex';
                    $available_qty = $result->available_qty ?? 0;
                    $is_in_cart = false;
                    $user_id = auth()->guard('user')->id();
                    $product_id = $result->product_id;
                    $variant_id = $result->id;

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

            <?php if($available_qty>0): ?>
                <a style="display: <?php echo $adisplay ; ?>;" title="<?php echo e(Helper::language('add_to_cart')); ?>"  data-product-id="<?php echo e(Helper::encodeUrl($result->product_id)); ?>"  data-variant-id="<?php echo e($result->id); ?>" data-bogo_status="<?php echo e($result->bogo_status); ?>"  class="add-bucket"  href="javascript:void(0);"><i class="icon-bucket"></i></a>
            <?php endif; ?>

            <input class="favs-icon checked_box" type="checkbox" id="fav-item-bogo<?php echo e($key2); ?>" value="<?php echo e(($fav_data != "") ? '1' : "0"); ?>" <?php echo e(($fav_data != "") ? 'checked' : ""); ?> onclick="return productFav(<?php echo e($result->product_id); ?>,<?php echo e(($fav_data != "") ? '1' : "0"); ?>)" />
            <label  class="favs-button" title="<?php echo e(Helper::language('add_to_favourite')); ?>" for="fav-item-bogo<?php echo e($key2); ?>"></label>
        </div>                          
        <div class="load_bogo_products_ids"  data-id="<?php echo e(Helper::encodeUrl($result->product_id)); ?>" >  </div>
    </div>
</div>
<?php
    $i++;
?>
<?php if(count($bogoProductData)==$i): ?> 
<input type="hidden" <?php if(!empty($product_last_id)): ?> value="<?php echo e($product_last_id); ?>" <?php else: ?> value="<?php echo e($result->product_id); ?>" <?php endif; ?> id="bogo-last-id" >
<?php
    if(!empty($product_last_id)) {
        $pd_id = $product_last_id;
    }else{
        $pd_id = $result->product_id;
    }
?>
<div id="appen-bogo-html<?php echo e($pd_id); ?>" ></div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="col-lg-12 col-md-12 col-sm-12 product-listing-col no-result-found">
    
        <h4 class="text-danger text-center no-result-found"><?php echo e(Helper::language('no_result_found')); ?></h4>
    
</div>
<?php endif; ?>          

<div class="bogo_product_counts">
<input type="hidden" id="bogoProFcount" value="<?php echo e(@$bogo_showing_product_count?:''); ?>">
<input type="hidden" id="bogoProTcount" value="<?php echo e(@$bogo_total_product_count?:''); ?>">
</div>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/product/ajax_filter_bogo.blade.php ENDPATH**/ ?>