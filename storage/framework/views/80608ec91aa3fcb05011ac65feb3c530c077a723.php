
    <ul class="notification-block mb-0">                
        <?php $__currentLoopData = $notificationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
    
        $date_time = \Helper::converttimeTozone($notification->created_at);

        $date_time = date('h:i A d M, Y',strtotime($date_time));

        if ($notification->notification_type == 1) {
            $icon = "fa-solid fa-check text-dark-green";
        }elseif ($notification->notification_type == 2) {
            $icon = "fa-solid fa-image text-orange";
            
        }elseif ($notification->notification_type == 3) {
            $icon = "fa-solid fa-van-shuttle text-pink";
            
        }elseif ($notification->notification_type == 4) {
            $icon = "fa-solid fa-check text-dark-green";
            
        }elseif ($notification->notification_type == 5) {
            $icon = "fa-solid fa-xmark text-dark-green";
            
        }else{
            $icon = "fa-solid fa-image text-orange";

        }
        ?>
        <li>
            <div class="preview-img">
                <span class="bg-light-orange"><i class="<?php echo e(@$icon); ?>"></i></span>
            </div>                    
            <div class="preview-info mb-3">
                <span class="text-grey d-block"><?php echo e(@$date_time); ?></span>
                <p class="body-normal text-black"><a href="<?php echo e(route('order-detail',['id'=>Helper::encodeUrl($notification->orderId)])); ?>"><?php echo e(@$notification->order_id); ?> </a> <?php echo e(@$notification->message); ?></p>
            </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </ul>

<script type="text/javascript">
    $('.btn-close').click(function(e) {
        $(".offcanvasNotification").removeClass('show');
        // window.location.reload();
    });
</script><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/notification.blade.php ENDPATH**/ ?>