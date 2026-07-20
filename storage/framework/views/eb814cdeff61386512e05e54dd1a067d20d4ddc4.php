
<?php $__env->startSection('title', 'Order | Admin Panel'); ?>
<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css" />
    <style>
        .remove-border {
            border-top: none !important;
        }
    </style>
    <div class="padding edit-package website-label-show">
        <div class="box">
            <div class="box-header dker">

                <h3><i class="material-icons">
                        &#xe02e;</i> <?php echo e(__('backend.view')); ?> Order Details
                </h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                    <a href="<?php echo e(route('adminorder')); ?>">Order Management</a> /
                    <span><?php echo e(__('backend.view')); ?> Order Details</span>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="<?php echo e(url()->previous()); ?>">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                <form class="table_design">
                    <!-- <h2 class="text-center">Order Detail</h2> -->
                    <?php
                    
                    $method = DB::table('transactions')
                        ->where('order_id', $orderData->id)
                        ->first();
                    $order_type = @$orderData->order_type;
                    // dd(@$orderData);
                    $order_status = @$orderData->order_status;
                    // if (!empty($method) && $method->payment_type == 1) {
                    //     $payment_method = 'Momo Pay';
                    // } elseif{
                    //     $payment_method = 'Card';
                    // }
                    
                    if ($orderData->payment_type == 1) {
                        $payment_type = 'Online Payment';
                    } elseif ($orderData->payment_type == 3) {
                        $payment_type = 'Cash On Delivery';
                    } else {
                        $payment_type = 'Online Payment';
                    }
                    if ($orderData->order_status == 1) {
                        $order_status = 'Pending';
                    } elseif ($orderData->order_status == 2) {
                        $order_status = 'Accepted';
                    } elseif ($orderData->order_status == 3) {
                        $order_status = 'Delivered';
                    } elseif ($orderData->order_status == 5) {
                        $order_status = 'Ready to Pick Up';
                    } elseif ($orderData->order_status == 6) {
                        $order_status = 'Out for Delivery';
                    } else {
                        $order_status = 'Cancelled';
                    }
                    
                    if ($orderData->payment_type == 1) {
                        $payment_type = 'Online Payment';
                    } elseif ($orderData->payment_type == 3) {
                        $payment_type = 'Cash On Delivery';
                    } else {
                        $payment_type = 'Online Payment';
                    }
                    
                    // Conditionally set the payment status
                    if ($orderData->payment_type == 3) {
                        // Cash On Delivery
                        if ($orderData->order_status == 3) {
                            $payment_status = 'Success';
                        } else {
                            if ($orderData->payment_status == 1) {
                                $payment_status = 'Pending';
                            } elseif ($orderData->payment_status == 2) {
                                $payment_status = 'Success';
                            } else {
                                $payment_status = 'Failed';
                            }
                        }
                    } else {
                        // Other payment types
                        if ($orderData->payment_status == 1) {
                            $payment_status = 'Success';
                        }else if ($orderData->payment_status == 2) {
                            $payment_status = 'Failed';
                        } else {
                            $payment_status = 'Pending';
                        }
                    }
                    
                    // if ($orderData->payment_status == 1) {
                    //     $payment_status = 'Success';
                    // } else {
                    //     $payment_status = 'Failed';
                    // }
                    // if ($orderData->order_from == 1) {
                    //     $order_from = 'Web';
                    // } else if ($orderData->order_from == 2) {
                    //     $order_from = 'Android';
                    // } else {
                    //     $order_from = 'Ios';
                    // }
                    if ($orderData->order_from == 1) {
                        $order_from = 'Web';
                    } else {
                        $order_from = 'Application';
                    }
                    
                    if ($order_type == 1) {
                        $order_type = 'Online';
                    } else {
                        $order_type = 'Pickup Order';
                    }
                    
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="30%">
                                    <h4>
                                        <p><b>Customer Details</b></p>
                                    </h4>
                                </td>
                                <td colspan="4">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>Name</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(ucfirst(@$orderData->customer_name)); ?></p>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>Email</b> </p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(@$orderData->customer_email); ?></p>
                                </td>
                            <tr>
                                <td>
                                    <p><b>Phone Number</b></p>
                                </td>
                                <td colspan="4">
                                    <p>+<?php echo e(@$orderData->phone_code); ?> <?php echo e(@$orderData->customer_mobile); ?></p>
                                </td>
                            </tr>
                            <?php if($orderData->order_type == 1): ?>
                                
                                <tr>
                                    <td>
                                        <p><b>Shipping Address</b></p>
                                    </td>
                                    <td colspan="4">
                                        
                                        <p>
                                            <?php
                                            if (strpos($orderData->delivery_address, ',|') !== false) {
                                                $delivery_address = explode(',| ', $orderData->delivery_address);
                                                //removing first element from array, it means name.
                                                $name = array_shift($delivery_address);
                                            }
                                            ?>
                                            <?php echo e(@$name); ?></p>
                                        <p>
                                            <?php echo e($delivery_address ? implode(', ', $delivery_address) : ''); ?>

                                        </p>
                                    </td>
                                </tr>

                                <?php if($orderData->billing_address || !empty($orderData->billing_address)): ?>
                                <tr>
                                    <td>
                                        <p><b>Billing Address</b></p>
                                    </td>
                                    <td colspan="4">
                                        <p>
                                            <?php
                                            if (strpos($orderData->billing_address, ',|') !== false) {
                                                $billing_address = explode(',| ', $orderData->billing_address);
                                                $name = array_shift($billing_address);
                                            }
                                            ?>
                                            <?php echo e(@$name); ?></p>
                                        <p>
                                            <?php echo e($billing_address ? implode(', ', $billing_address) : ''); ?>

                                        </p>
                                    </td>
                                </tr>

                                <?php endif; ?>
                                
                                <?php if($orderData->delivery_options || !empty($orderData->delivery_instructions)): ?>
                                    <tr>
                                        <td>
                                            <p><b>Delivery Instruction</b></p>
                                        </td>
                                        <td colspan="4">
                                            <p>
                                                <?php
                                                if ($orderData->delivery_options==1) {
                                                    $str = 'Hand over to Me';
                                                }
                                                else if($orderData->delivery_options==2)
                                                {
                                                    $str='Leave it at my Door';
                                                }
                                                else {
                                                    $str = '';
                                                }
                                                ?>
                                                <b><u>Drop-off-</b></u> &nbsp;&nbsp;<?php echo e($str); ?>

                                            </p>
                                            <p>
                                                <b><u>Message-</b></u> &nbsp;&nbsp;<?php echo e($orderData->delivery_instructions); ?>

                                            </p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($orderData->order_type != 2): ?>
                                <tr>
                                    <td>
                                        <p><b>Country</b></p>
                                    </td>
                                    <td colspan="4">
                                        <p><?php echo e(@$orderData->country_name ?: '-'); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->order_type == 2): ?>
                                <tr>
                                    <td>
                                        <h4>
                                            <p><b>Store Details</b></p>
                                        </h4>
                                    </td>
                                    <td colspan="4">
                                        <p><b></b></p>
                                    </td>
                                </tr>
                                <td>
                                    <p><b>Store Address</b></p>
                                </td>
                                <td colspan="4">
                                    <p>
                                        <?php
                                        if (strpos(@$orderData->store_pickup_address, ',|') !== false) {
                                            $order_pickup_address = explode(',| ', @$orderData->store_pickup_address);
                                            //removing first element from array, it means name.
                                            $name = array_shift($order_pickup_address);
                                        }
                                        ?>
                                        <?php echo e(@$name); ?></p>
                                    <p>
                                        <?php echo e(@$order_pickup_address ? implode('', @$order_pickup_address) : ''); ?>

                                    </p>
                                </td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <td>
                                    <h4>
                                        <p><b>Order Details</b></p>
                                    </h4>
                                </td>
                                <td colspan="4">
                                    <p><b></b></p>
                                </td>
                            </tr>
                            <td>
                                <p><b>Order ID</b></p>
                            </td>
                            <td colspan="4">
                                <p><?php echo e(@$orderData->order_id); ?></p>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>Order from</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(@$order_from); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>Order Type</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(@$order_type); ?></p>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>Delivery Status</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(@$order_status); ?></p>
                                </td>
                            </tr>

                          
                            
                            <?php if($orderData->order_status == 4): ?>
                                <tr>
                                    <td>
                                        <p><b>Cancelled By</b></p>
                                    </td>
                                    <td colspan="4">
                                        <p><?php echo e($userName); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if(@$orderData->order_type != 2): ?>
                                <?php if($orderData->trans_no != ''): ?>
                                    <tr>
                                        <td>
                                            <p><b>Transaction ID</b></p>
                                        </td>
                                        <td colspan="4">
                                            <p><?php echo e(@$orderData->trans_no); ?></p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                            <tr>
                                <td>
                                    <p><b>Payment Method</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(@$payment_type); ?></p>
                                </td>
                            </tr>
                            
                                <tr>
                                    <td>
                                        <p><b>Payment status</b></p>
                                    </td>
                                    <td colspan="4">
                                        <p><?php echo e(@$payment_status); ?></p>
                                    </td>
                                </tr>
                            
                            <tr>
                                <td>
                                    <p><b>Order Placed</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(\Helper::converttimeTozone($orderData->created_at)); ?>


                                    </p>
                                </td>
                            </tr>
                            <?php if(!empty($orderData->recipientName) || !empty($orderData->note)): ?>
                            <tr>
                                <td>
                                    <h4>
                                        <p><b>Additional Details</b></p>
                                    </h4>
                                </td>
                                <td colspan="4">
                                    <p><b></b></p>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if($orderData->note): ?>
                                <tr>
                                    <td>
                                        <p><b>Note</b></p>
                                    </td>
                                    <td colspan="4">
                                        <p><?php echo e(@$orderData->note); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->recipientName): ?>
                            <tr>
                                <td>
                                    <p><b>Gift Recipient</b></p>
                                </td>
                                <td colspan="4">
                                    <p><?php echo e(@$orderData->recipientName); ?></p>
                                </td>
                            </tr>
                             <?php endif; ?>
                             <?php if($orderData->giftMessage): ?>
                             <tr>
                                 <td>
                                     <p><b>Gift Message</b></p>
                                 </td>
                                 <td colspan="4">
                                     <p><?php echo e(@$orderData->giftMessage); ?></p>
                                 </td>
                             </tr>
                              <?php endif; ?>
                        </thead>
                        <thead>
                            <tr>
                                <td colspan="1">
                                    <h4>
                                        <p><b>Product Details</b></p>
                                    </h4>
                                </td>
                                <td colspan="4">
                                    <p><b></b></p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <p>Product Name</p>
                                </th>
                                <th>
                                    <p>Product Size</p>
                                </th>
                                <th>
                                    <p>Qty</p>
                                </th>
                                <th>
                                    <p>Amount</p>
                                </th>
                                <th>
                                    <p>Total</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                
                                if ($data->variant_unit == 1) {
                                    $variant_unit = 'ML';
                                } else {
                                    $variant_unit = 'L';
                                } 

                                // $display_qty = $data->is_bogo ? floor($data->quantity / 2) : $data->quantity;
                                $display_qty = $data->quantity;
                                // $unit_price = $data->product_original_amount ?? 0;
                                $unit_price = ($data->product_total_amount && $data->product_total_amount > 0) ? $data->product_total_amount : $data->product_original_amount;
                                $total_price = Helper::numberFormat($display_qty * $unit_price);
                                ?>
                                <tr>
                                    <td>
                                        <p><?php echo e(@$data->product_name); ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo e(@$data->variant_size); ?> <?php echo e($variant_unit); ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo e(@$data->quantity); ?></p>
                                    </td>
                                    
                                    <td>
                                        <?php if($data->product_total_amount && $data->product_total_amount < $data->product_original_amount): ?>
                                            <p>
                                                <span style="text-decoration: line-through;">
                                                    <?php echo e(Helper::numberFormat($data->product_original_amount)); ?> <?php echo e(@$settings->currency_symbol); ?>

                                                </span>
                                                <br>
                                                <span>
                                                    <?php echo e(Helper::numberFormat($data->product_total_amount)); ?> <?php echo e(@$settings->currency_symbol); ?>

                                                </span>
                                            </p>
                                        <?php else: ?>
                                            <p><?php echo e(Helper::numberFormat($unit_price)); ?> <?php echo e(@$settings->currency_symbol); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <p><?php echo e($total_price); ?> <?php echo e($settings->currency_symbol); ?></p>
                                    </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="3" class="remove-border"> </td>
                                <td>
                                    <p>Sub Amount</p>
                                </td>
                                <td colspan="1">
                                    
                                    <p> <?php echo e(@Helper::numberFormat(@$totalAmount)); ?><?php echo e(@$settings->currency_symbol); ?></p>
                                </td>
                            </tr>
                            <?php if($bogoDiscount != 0): ?>
                                <tr>
                                    <td colspan="3" class="remove-border"> </td>
                                    <td>
                                        <p>Bogo Discount</p>
                                    </td>
                                    <td colspan="1">
                                        <p>- <?php echo e(@Helper::numberFormat(@$bogoDiscount)); ?> <?php echo e(@$settings->currency_symbol); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->cart_discount != 0): ?>
                                <tr>
                                    <td colspan="3" class="remove-border"> </td>
                                    <td>
                                        <p>Cart Discount</p>
                                    </td>
                                    <td colspan="1">
                                        <p>- <?php echo e(@Helper::numberFormat(@$orderData->cart_discount)); ?> <?php echo e(@$settings->currency_symbol); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->reward_amount != 0): ?>
                                <tr>
                                    <td colspan="3" class="remove-border"> </td>
                                    <td>
                                        <p>Reward Discount</p>
                                    </td>
                                    <td colspan="1">
                                        <p>- <?php echo e(@Helper::numberFormat(@$orderData->reward_amount)); ?> <?php echo e(@$settings->currency_symbol); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->discount_amount != 0): ?>
                                <tr>
                                    <td colspan="3" class="remove-border"> </td>
                                    <td>
                                        <p>Coupon Discount</p>
                                    </td>
                                    <td colspan="1">
                                        <p>- <?php echo e(@Helper::numberFormat(@$orderData->discount_amount)); ?>

                                            <?php echo e(@$settings->currency_symbol); ?> ( <?php echo e($orderData->promocode_name); ?> )</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php
                                // $discountPrice = $orderData->total_amount - $orderData->payable_amount;
                                $discountPrice = $totalAmount - $orderData->payable_amount;
                            ?>
                            <?php if($orderData->tax != 0): ?>
                                <tr>
                                    <td colspan="3" class="remove-border"> </td>
                                    <td>
                                        <p>Tax</p>
                                    </td>
                                    <td colspan="1">
                                        <p><?php echo e(@Helper::numberFormat(@$orderData->tax)); ?> <?php echo e(@$settings->currency_symbol); ?>

                                        </p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->order_type == 1): ?>
                                <tr>
                                    <td colspan="3" class="remove-border"> </td>
                                    <td>
                                        <p>Delivery Fee</p>
                                    </td>
                                    <td colspan="1">
                                        <p><?php echo e(@Helper::numberFormat(@$orderData->delivery_fee)); ?>

                                            <?php echo e(@$settings->currency_symbol); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($orderData->gift_card != 0): ?>
                            <tr>
                                <td colspan="3" class="remove-border"> </td>
                                <td>
                                    <p>Gift Card</p>
                                </td>
                                <td colspan="1">
                                    <p><?php echo e(@Helper::numberFormat(@$orderData->gift_card)); ?>

                                        <?php echo e(@$settings->currency_symbol); ?></p>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td colspan="3" class="remove-border"> </td>
                                <td>
                                    <p><b>Total Amount</b></p>
                                </td>
                                <td colspan="1">
                                    <p><b> <?php echo e(@Helper::numberFormat($orderData->payable_amount)); ?>

                                            <?php echo e(@$settings->currency_symbol); ?></b></p>
                                </td>
                            </tr>

                        </tfoot>
                    </table>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('adminorder')); ?>" class="btn btn-default m-t" style="margin: 0 0 0 0px">
                                <i class="material-icons">
                                    &#xe5cd;</i> Cancel
                            </a>
                            <a href="<?php echo e(route('adminorder.print', ['id' => $orderData->id])); ?>" class="btn btn-default m-t" style="margin: 0 0 0 0px" target="_blank">
                                <i class="fas fa-print"></i>&nbsp; Print Invoice
                            </a>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>

                    <?php echo e(Form::close()); ?>


            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="<?php echo e(asset('assets/dashboard/js/jquery.dataTables.min.js')); ?>"></script>
    Dashboard / Product/ Sdfsdfdsf ( Avg. Rating - 0 )
    Back



    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/order/show.blade.php ENDPATH**/ ?>