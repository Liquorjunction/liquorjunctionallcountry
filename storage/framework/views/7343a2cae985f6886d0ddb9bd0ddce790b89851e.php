
<?php $__env->startSection('title','Order Listing'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="bread-crumb-block">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(Helper::language('my_orders')); ?></li>
        </ul>
    </div>
</div>
<section class="account pt-20 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('frontend.layouts.account-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="order-listing-header">
                    <h2 class="mb-0"><?php echo e(Helper::language('my_orders')); ?></h2>                            
                </div>   
                <?php if(isset($orderInfo) && count($orderInfo) > 0): ?>                    
                <?php $__currentLoopData = $orderInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <?php
                        $order_details = $result->order_details->first();
                    ?>

                <?php if($order_details): ?>
                    <?php
                        $unit = Helper::getUnitById($order_details->variant_unit);
                        $product_info = Helper::getProductDetails($order_details->product_id);
                            $product_image = $product_info->get_product_images->first();
                            $product_title='';
                            if(session::get('language')==2){                            
                                $product_title = $product_info->product_name_fr;
                            }else{
                                $product_title = $product_info->product_name;
                            } 
                        
                            $orderDate = $result->order_date;
                            $newDate = date("d-m-Y", strtotime($orderDate));
                            $date = \Carbon\Carbon::createFromFormat('d-m-Y', $newDate);
                            $daysToAdd = Helper::Settings('delivery_days');
                            $date1 = $date->addDays($daysToAdd);
                            $newDate1 = date("d F Y", strtotime($date1));
                    ?>

                <div class="common-card recent-order order-list">
                    <ul class="order-detail">
                        <li>
                            <span class="body-normal text-dark d-block mb-1"><?php echo e(Helper::language('order_placed')); ?></span>
                            <span class="body-normal text-dark-grey d-block mb-0">
                            <?php
                                // $time = strtotime(@$result->created_at);
                                // $dateInLocal = date("Y-m-d H:i:s", $time);
                            ?>
                             <?php
                                $order_placed = \Helper::converttimeTozone($result->created_at);
                                echo $order_palce_date = date("d M Y",strtotime($order_placed));
                             ?>
                               
                            </span> 
                        </li>
                        <?php if($result->order_type==1): ?>
                        <li>
                            <span class="body-normal text-dark d-block mb-1"><?php echo e(Helper::language('deliver_to')); ?></span>
                            <span class="body-normal text-dark-grey d-block mb-0">
                            <?php
                                $order_customer_name  = explode(',|', $result->delivery_address);
                                echo $order_customer_name  = $order_customer_name[0];
                                //$order_customer_name  =  $result->orderInfo->customer_name;
                                //echo $order_customer_name  = $order_customer_name;
                            ?>

                            </span>
                        </li>
                        <?php endif; ?>
                        <?php if($result->order_type==2): ?>
                        <li>
                            <span class="body-normal text-dark d-block mb-1"><?php echo e(Helper::language('order_pickup_from')); ?></span>
                            <span class="body-normal text-dark-grey d-block mb-0">
                                <?php
                                   // $pickup  = explode(', ', $result->orderInfo->store_pickup_address);
                                    //echo $pickup[0];
                                    if ( strpos($result->orderInfo->store_pickup_address, ',|' ) !== false ) {
                                        $pickup  = explode(',| ', $result->orderInfo->store_pickup_address);   
                                        $name = array_shift($pickup);  
                                        echo ($name)?$name:'';  
                                    };
                                    
                                   
                                ?>        
                            </span>
                        </li>
                        <?php endif; ?>
                        
                        <li>
                            <span class="body-normal text-dark d-block mb-1"><?php echo e(Helper::language('order_type')); ?></span>
                            <span class="body-normal text-dark-grey d-block mb-0">
                            <?php if($result->order_type==1): ?>
                                <?php echo e('Online'); ?>

                            <?php elseif($result->order_type==2): ?>
                                <?php echo e('Pickup Order'); ?>

                            <?php endif; ?>
                            </span>
                        </li>
                        <li>
                            <span class="body-normal text-dark d-block mb-1"><?php echo e(Helper::language('order_status')); ?></span>
                            <span class="body-normal text-dark-grey d-block mb-0"><?php echo e(Helper::getOrderStatus($result->order_status)); ?></span>
                        </li>
                         <li class="flex-sm-fill">
                            <span class="body-normal text-dark d-block mb-1"><?php echo e(Helper::language('total_amount_label')); ?></span>
                            <span class="body-normal text-dark-grey d-block mb-0"><?php echo e($result->payable_amount.Helper::Settings( 'currency_symbol')); ?></span>
                        </li>
                        <li>
                            <span class="body-normal text-dark-grey d-block mb-1"><?php echo e(Helper::language('order')); ?> #<?php echo e(@$result->order_id); ?></span>
                            <a href="<?php echo e(route('order-detail',['id'=>Helper::encodeUrl($result->id)])); ?>" class="border-button mb-0"><?php echo e(Helper::language('view_order_details')); ?></a>
                        </li>
                    </ul>
                    <?php if($result->order_type==1): ?>
                        <h6 class="order-list-title">
                            <?php echo e(Helper::language('order_delivery_on')); ?> &nbsp;<span class="d-inline-block text-yellow"><?php echo e($newDate1); ?></span> 
                            <span class="text-dark-grey text-grey-dark">    
                        <?php echo e((count($result->order_details)!=1)?'+'.(count($result->order_details) - 1).' More Products':''); ?>

                            </span>
                        </h6>    
                    <?php endif; ?>     
                                       
                    <div class="single-product">
                        <div class="product-img">                                            
                            <a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($order_details->product_id)])); ?>">                                 
                                <?php if(file_exists(public_path() . '/uploads/product/'.$product_image->image)): ?>					
                                <img src="<?php echo e(asset('uploads/product/'.$product_image->image)); ?>" title="<?php echo e($product_title); ?>" />
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                                <?php endif; ?> 
                            </a>
                        </div>
                        <div class="product-detail">
                            <div class="product-detail-main">
                                <h6><a href="<?php echo e(route('productdetails',['id'=>Helper::encodeUrl($order_details->product_id)])); ?>" class="heading-six mb-0"><?php echo e(ucfirst($product_title)); ?></a></h6>
                                <p class="quantity"><?php echo e(Helper::language('volume')); ?><span>: <?php echo e($order_details->variant_size.' '.$unit); ?></span></p>
                                <p class="quantity"><?php echo e(Helper::language('quantity')); ?><span>: <?php echo e($order_details->quantity); ?></span></p>
                            </div>
                            <ul>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="text-center"><h4 style="color: red;"><?php echo e(Helper::language('no_result_found')); ?></h4></div>
                <?php endif; ?>
                
                
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/order/order-list.blade.php ENDPATH**/ ?>