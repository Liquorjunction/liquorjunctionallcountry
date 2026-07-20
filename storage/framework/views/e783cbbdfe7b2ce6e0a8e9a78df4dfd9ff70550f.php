<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purchase Order</title>
    <style>
        /* General Styles */
        body {
        font-family: 'DejaVu Sans', sans-serif;
        font-size: 11px;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        }

        .container {
        width: 100%;
        margin: 0 auto;
        background-color: #fff;
        }

        /* Header Styles */
        .top-bar {
        background-color: #fbb516;
        padding: 5px;
        }


       .top-bar-flex {
        display: flex;
        flex-direction: row;
        align-items: flex-start; 
        justify-content: flex-start;
        gap: 10px;
        width: 100%;
        max-width: 100%; 
        box-sizing: border-box;
        }


     .logo {
        flex-shrink: 0; 
        }

        .store-details {
        flex: 1;
        font-size: 11px;
        color: #242424;
        line-height: 1.5;
        word-wrap: break-word;
        word-break: break-word;
        max-width: 100%;

        }

        .store-details strong {
        font-size: 14px;
        font-weight: bold;
        display: block;
        color: #000;
        margin-bottom: 3px;
        }

        /* Section Titles */
        .section-title {
            background-color: #212529;
            color: #fff;
            padding: 2px;
            font-weight: 700;
        }

        .row {
            display: table;
            width: 100%;
            gap: 20px; 
            table-layout: fixed;
            margin-top: 8px;
        }

        .col {
          display: table-cell;
          vertical-align: top;
          width: 48%; 
          padding-right: 1px;
          padding-left: 1px;
          word-wrap: break-word; 
          word-break: break-word; 
          white-space: normal;  
          overflow-wrap: break-word; 
        }

        .col p{
            margin:0;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 10.5px;
        }

        th, td {
            padding: 2px 4px;
            text-align: left;
            border: 1px solid #ddd;

            line-height: 1.2;
            vertical-align: middle;
        }

        td p {
            margin: 0;
            padding: 0;
            line-height: 1.2; 
        }

        th {
            background-color: #212529;
            color: #fff;
            font-weight: bold;
        }

        .totals {
              text-align: right;
              font-weight: bold;
        }

        .totals td {
              display: flex;
              justify-content: space-between;
              padding: 8px 16px;
        }

        /* Footer Styles */
        .footer {
        /* background-color: #fbb516; */
        padding: 10px;
        text-align: center;
        font-size: 11px;
        margin-top: 20px;
        }

        .footer strong {
            font-weight: bold;
        }

    </style>
  </head>
  <body>
    <div class="container">
      <!-- Header Section -->
    <div class="top-bar">
        <table width="100%" cellpadding="0" cellspacing="0" style="border: none;padding-left: 30px;">
            <tr valign="top">
            <td style="width: 100px; border: none;padding-top:15px;">
                <img src="<?php echo e(public_path('assets/frontend/images/logo.png')); ?>" alt="Liquor Junction Logo" style="width: 180px;">
            </td>
            <td style="padding-left: 10px; font-size: 11px; color: #242424; line-height: 1.5; border: none;">
                <strong style="font-size: 25px; font-weight: bold; color: #000; display: block;">
                Liquor Junction
                </strong>
                <strong tyle="font-size: 12px; font-weight: bold; color: #000;">Think Celebration, Think Liquor Junction</strong><br>
                Near Rabito Clinic, Adjoatse Street, Behind Koala, Osu, Accra, Greater Accra 233<br>
                Phone: <a href="tel:0555667788">0555667788</a>, 
                Email: <a href="mailto:info@liquorjunctionghana.com">info@liquorjunctionghana.com</a>
            </td>
            </tr>
        </table>
    </div>


      <!-- Invoice and Ship Section -->
      <div class="row">
        <div class="col">
          <?php
            $order_type = @$orderData->order_type;

            if ($orderData->payment_type == 1) {
                $payment_type = 'Online Payment';
            } elseif ($orderData->payment_type == 3) {
                $payment_type = 'Cash On Delivery';
            } else {
                $payment_type = 'Online Payment';
            }

            if ($order_type == 1) {
                $order_type = 'Online';
            } else {
                $order_type = 'Pickup Order';
            }
          ?>

          <div class="section-title">PURCHASE INVOICE</div>
          <p><strong>Order No. </strong>- <?php echo e($orderData->order_id); ?> <br /> <strong>Order Date</strong> -  <?php echo e(\Helper::converttimeTozone($orderData->created_at)); ?>

            <br /><strong>Order Type</strong> - <?php echo e($order_type); ?> <br /> <strong>Payment Method</strong>- <?php echo e(@$payment_type); ?>

          </p>
        </div>
        <div class="col">
          <?php if($orderData->order_type == 1): ?>
              <?php if($orderData->isSameAddress == 1): ?>
              <div class="section-title">BILLING ADDRESS</div>
              <?php
                  $address_to_use = !empty($orderData->delivery_address) ? $orderData->delivery_address : $orderData->billing_address;
      
                  if (strpos($address_to_use, ',|') !== false) {
                      $address_parts = explode(',| ', $address_to_use);
                      $name = array_shift($address_parts);
      
                      $row1 = array_slice($address_parts, 0, 2);
                      $row2 = array_slice($address_parts, 2, 2); 
                      $row3 = array_slice($address_parts, 4);    
                  }
              ?>
              <p>
                  <strong>Name</strong> - <?php echo e($name ?? ''); ?><br />
                  <strong>Address</strong> - <?php echo e($row1 ? implode(', ', $row1) . ',' : ''); ?> <br/>
                  <?php echo e($row2 ? implode(', ', $row2) . ',' : ''); ?> <br/>
                  <?php echo e($row3 ? implode(', ', $row3) : ''); ?>

              </p>
            <?php else: ?>
                  <?php if(!empty($orderData->billing_address)): ?>
                  <div class="section-title">BILLING ADDRESS</div>
                  <?php
                      if (strpos($orderData->billing_address, ',|') !== false) {
                          $billing_parts = explode(',| ', $orderData->billing_address);
                          $billing_name = array_shift($billing_parts);
          
                          $billing_row1 = array_slice($billing_parts, 0, 2);
                          $billing_row2 = array_slice($billing_parts, 2, 2); 
                          $billing_row3 = array_slice($billing_parts, 4);    
                      }
                  ?>
                  <p>
                      <strong>Name</strong> - <?php echo e($billing_name ?? ''); ?><br />
                      <strong>Address</strong> - <?php echo e(!empty($billing_row1) ? implode(', ', $billing_row1) . ',' : ''); ?> <br/>
                      <?php echo e(!empty($billing_row2) ? implode(', ', $billing_row2) . ',' : ''); ?> <br/>
                      <?php echo e(!empty($billing_row3) ? implode(', ', $billing_row3) : ''); ?>

                  </p>
              <?php endif; ?>

              <div class="section-title">DELIVERY ADDRESS</div>
              <?php
                  if (strpos($orderData->delivery_address, ',|') !== false) {
                      $delivery_parts = explode(',| ', $orderData->delivery_address);
                      $delivery_name = array_shift($delivery_parts);
      
                      $delivery_row1 = array_slice($delivery_parts, 0, 2);
                      $delivery_row2 = array_slice($delivery_parts, 2, 2); 
                      $delivery_row3 = array_slice($delivery_parts, 4);    
                  }
              ?>
              <p>
                  <strong>Name</strong> - <?php echo e($delivery_name ?? ''); ?><br />
                  <strong>Address</strong> - <?php echo e($delivery_row1 ? implode(', ', $delivery_row1) . ',' : ''); ?> <br/>
                  <?php echo e($delivery_row2 ? implode(', ', $delivery_row2) . ',' : ''); ?> <br/>
                  <?php echo e($delivery_row3 ? implode(', ', $delivery_row3) : ''); ?>

              </p>

          <?php endif; ?>

          <?php endif; ?>
          <?php if($orderData->order_type == 2): ?>
                <div class="section-title">STORE ADDRESS</div>
                  <?php
                      if (strpos($orderData->store_pickup_address, ',|') !== false) {
                          $order_pickup_address = explode(',| ', $orderData->store_pickup_address);

                          $name = array_shift($order_pickup_address);

                          $row1 = array_slice($order_pickup_address, 0, 2);
                          $row2 = array_slice($order_pickup_address, 2, 2); 
                          $row3 = array_slice($order_pickup_address, 4);    
                      }
                  ?>
                  <p>
                        <strong>Name</strong>- <?php echo e($name); ?><br />
                        <strong>Address</strong> - <?php echo e($row1 ? implode(', ', $row1) . ',' : ''); ?> <br/>
                          <?php echo e($row2 ? implode(', ', $row2) . ',' : ''); ?> <br/>
                          <?php echo e($row3 ? implode(', ', $row3) : ''); ?>

                  </p>

                  <div class="section-title" style="margin-bottom: 10px;">CUSTOMER DETAILS</div>
                  <?php if(!empty($orderData->first_name) || !empty($orderData->last_name)): ?>
                      <strong>Name</strong> - <?php echo e(trim($orderData->first_name . ' ' . $orderData->last_name)); ?><br />
                  <?php endif; ?>

                  <?php if(!empty($orderData->email)): ?>
                      <strong>Email</strong> - <?php echo e($orderData->email); ?><br />
                  <?php endif; ?>

                  <?php if(!empty($orderData->phone_code) && !empty($orderData->phone)): ?>
                      <strong>Phone</strong> - + (<?php echo e($orderData->phone_code); ?>) <?php echo e($orderData->phone); ?><br />
                  <?php elseif(!empty($orderData->phone)): ?>
                      <strong>Phone</strong> - <?php echo e($orderData->phone); ?><br />
                  <?php endif; ?>


          <?php endif; ?>
        </div>
      </div>

      <!-- Table Section -->
      <table>
        <thead>
          <tr>
            <th>ITEM</th>
            <th>ITEM SIZE</th>
            <th>QTY</th>
            <th>UNIT PRICE</th>
            <th>TOTAL</th>
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
          
            // $display_qty = ($data->is_bogo) ? floor($data->quantity / 2) : $data->quantity;
            $display_qty = $data->quantity;

            // $product_amount = Helper::numberFormat($display_qty * $data->product_original_amount);
            $unit_price = ($data->product_total_amount && $data->product_total_amount > 0) 
                ? $data->product_total_amount 
                : $data->product_original_amount;

            $product_amount = Helper::numberFormat($display_qty * $unit_price);
          
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
                        &nbsp;
                        <span>
                            <?php echo e(Helper::numberFormat($data->product_total_amount)); ?> <?php echo e(@$settings->currency_symbol); ?>

                        </span>
                    </p>
                <?php else: ?>
                    <p><?php echo e(Helper::numberFormat($unit_price)); ?> <?php echo e(@$settings->currency_symbol); ?></p>
                <?php endif; ?>
            </td>

              <td>
                <p><?php echo e($product_amount); ?> <?php echo e(@$settings->currency_symbol); ?></p>
              </td>
          </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

        <!-- Billing and Tax Summary Section -->
        <table style="width: 100%; margin-top: 8px; border-collapse: collapse;">
        <tr>
            <!-- Billing Summary -->
            <td style="width: 50%; vertical-align: top;">
            <strong>Billing Summary</strong><br>
            <table style="width: 100%; margin-top: 2px;">
                <tr>
                <td>Total Sale</td>
                
                <td align="right"> <?php echo e(@Helper::numberFormat(@$totalAmount)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                </tr>

                <?php
                    $discountAmount = @$orderData->discount_amount ?? 0;
                    $cartDiscount = @$orderData->cart_discount ?? 0;
                    $rewardDiscount = @$orderData->reward_amount ?? 0;
                    $totalDiscount = $discountAmount + $cartDiscount + $rewardDiscount + $bogoDiscount;
                ?>

                <?php if($discountAmount > 0): ?>
                    <tr>
                        <td>Coupon Discount<?php echo e($orderData->promocode_name ? ' (' . $orderData->promocode_name . ')' : ''); ?></td>
                        <td align="right">(-) <?php echo e(@Helper::numberFormat($discountAmount)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                    </tr>
                <?php endif; ?>

                
                <?php if($bogoDiscount > 0): ?>
                    <tr>
                        <td>Bogo Discount</td>
                        <td align="right">(-) <?php echo e(@Helper::numberFormat($bogoDiscount)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                    </tr>
                <?php endif; ?>
                       

                <?php if($cartDiscount > 0): ?>
                    <tr>
                        <td>Cart Discount</td>
                        <td align="right">(-) <?php echo e(@Helper::numberFormat($cartDiscount)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                    </tr>
                <?php endif; ?>

                 <?php if($rewardDiscount > 0): ?>
                    <tr>
                        <td>Reward Discount</td>
                        <td align="right">(-) <?php echo e(@Helper::numberFormat($rewardDiscount)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if($totalDiscount == 0): ?>
                    <tr>
                        <td>Discount</td>
                        <td align="right">0 <?php echo e(@$settings->currency_symbol); ?></td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td><strong>Total (After Discount)</strong></td>
                    <td align="right">
                        
                        <strong><?php echo e(@Helper::numberFormat(@$totalAmount - $totalDiscount)); ?> <?php echo e(@$settings->currency_symbol); ?></strong>
                    </td>
                </tr>

            </table>
            </td>

            <!-- Tax Summary -->
            <td style="width: 50%; vertical-align: top;">
            <strong>Tax Summary</strong><br>
            <table style="width: 100%; margin-top: 2px;">
                <tr>
                <td>(i) Tax Exclusive Value</td>
                <td align="right"> <?php echo e(@Helper::numberFormat(@$subTotal)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                </tr>
                <tr>
                <td>(ii) NHIL (2.5%)</td>
                <td align="right"><?php echo e(@Helper::numberFormat(@$nhil)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                </tr>
                <tr>
                <td>(iii) Get Funds Levy (2.5%)</td>
                <td align="right"><?php echo e(@Helper::numberFormat(@$getFund)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                </tr>
                <tr>
                <td>(iv) VAT 15%</td>
                <td align="right"><?php echo e(@Helper::numberFormat(@$vat)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                </tr>
                <tr>
                <td colspan="2"><hr></td>
                </tr>
                <tr>
                <td><strong>Total Tax Inclusive Value(i+ii+iii+iv)</strong></td>
                <td align="right"><strong><?php echo e(round(@Helper::numberFormat(@$subTotal +  @$nhil + @$getFund + @$vat))); ?> <?php echo e(@$settings->currency_symbol); ?></strong></td>
                </tr>
            </table>
            </td>
        </tr>

        <!-- Extra Charges -->
        <tr>
            <td colspan="2" style="padding-top: 2px;">
            <table style="width: 100%;">
                <tr>
                <td>Gift Card</td>
                <td align="right"><?php echo e(@Helper::numberFormat(@$orderData->gift_card)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                </tr>
                <?php if($orderData->order_type == 1): ?>
                    <tr>
                        <td>Delivery Fee:</td>
                        <td align="right"><?php echo e(@Helper::numberFormat(@$orderData->delivery_fee)); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                <td colspan="2"><hr></td>
                </tr>
                <tr>
                <td><strong>Total (paid by client taxes inclusive)</strong></td>
                <td align="right"><strong><?php echo e(round(@Helper::numberFormat(@$subTotal + @$nhil + @$getFund + @$vat + @$orderData->gift_card + (@$orderData->order_type == 1 ? @$orderData->delivery_fee : 0) ))); ?> <?php echo e(@$settings->currency_symbol); ?></strong></td>
                </tr>
            </table>
            </td>
        </tr>
        </table>

      <!-- Footer Section -->
      <div class="footer">
        <p> Thank you <br><strong>Keep shopping with us.</strong></p>
      </div>
    </div>
  </body>
</html>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/layouts/orders.blade.php ENDPATH**/ ?>