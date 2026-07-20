<thead>
    <tr>
        <th>No.</th>
        <th>Order Date</th>
        <th>Order Id</th>
        <th>Order Type</th>
        <th>Shop Name</th>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Payment Type</th>
        <th>Country</th>
        <th>Product Name</th>
        <th>Attribute</th>
        <th>Quantity</th>
        <th>M.R.P</th>
        <th>Gross Amount</th>
        <th>Promotion Discount</th>
        <th>Loyalty Discount</th>
        <th>Bogo Discount</th>
        <th>Cart Discount</th>
        <th>Total Discount</th>
        <th>Delivery Charge</th>
        <th>Gift Card</th>
        <th>Paid Amount</th>
        <th>Delivery Status</th>
        <th>Payment Status</th>
    </tr>
</thead>
<tbody>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($order['is_blank']) && $order['is_blank']): ?>
        <tr><td colspan="22">&nbsp;</td></tr>
    <?php elseif(isset($order['is_summary']) && $order['is_summary']): ?>
        <tr style="font-weight: bold;">
            <td colspan="11"><strong>TOTAL</strong></td>
            <td><strong><?php echo e($order['summary']['quantity']); ?></strong></td>
            <td></td>
            <td><strong><?php echo e(number_format($order['summary']['gross'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['promo'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['loyalty'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['bogo'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['cart'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['discount'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['delivery'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['gift'], 2)); ?></strong></td>
            <td><strong><?php echo e(number_format($order['summary']['paid'], 2)); ?></strong></td>
            <td colspan="2"></td>
        </tr>
    <?php else: ?>
        <?php $data = $order['data']; $c = $order['computed']; ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('Y-m-d h:i A')); ?></td>
            <td><?php echo e($data->order_id); ?></td>
            <td><?php echo e($data->order_type == 1 ? 'Online' : 'Pickup'); ?></td>
            <td><?php echo e(explode(',', $data->store_address)[0] ?? '-'); ?></td>
            <td><?php echo e($data->customer_name); ?></td>
            <td><?php echo e('+' . $data->customer_mobile); ?></td>
            <td><?php echo e($data->payment_type == 1 ? 'Online' : 'COD'); ?></td>
            <td><?php echo e($data->country_name); ?></td>
            <td><?php echo e($data->product_name); ?></td>
            <td><?php echo e($data->attribute); ?> <?php echo e($data->size == 1 ? 'ML' : 'L'); ?></td>
            <td><?php echo e($data->quantity); ?></td>
            
            
            <td><?php echo e('GH₵ ' . number_format(($data->total_amount && $data->total_amount > 0) ? $data->total_amount : $data->mrp, 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['item_total'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['promo_discount'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['loyalty_discount'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['bogo_discount'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['cart_discount'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['total_discount'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['delivery_charge'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['gift_card'], 2)); ?></td>
            <td><?php echo e('GH₵ ' . number_format($c['grand_total'], 2)); ?></td>
            <td><?php echo e($data->delivery_status); ?></td>
            
            <td>
                <?php if($data->payment_type == 3): ?> 
                    <?php if($data->order_status == 3): ?>
                        Success
                    <?php else: ?>
                        <?php if($data->payment_status == 1): ?>
                            Pending
                        <?php elseif($data->payment_status == 2): ?>
                            Success
                        <?php else: ?>
                            Failed
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?> 
                    <?php if($data->payment_status == 1): ?>
                        Success
                    <?php else: ?>
                        Failed
                    <?php endif; ?>
                <?php endif; ?>
            </td>

        </tr>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/exports/order_report.blade.php ENDPATH**/ ?>