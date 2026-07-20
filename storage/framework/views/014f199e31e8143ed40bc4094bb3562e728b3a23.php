<style>
    iframe {
  border: 0;
  width: 100%;
  border-radius: 0;
}
a {
  font-weight: 400;
  font-size: 16px;
  line-height: 19px;
  display: inline-block;
  color: #2b2b2b;
  text-decoration: none;
  transition: 0.4s;
}
a:focus {
  outline: none;
}
a:active,
a:hover {
  color: #fbb516;
  outline: 0;
  transition: 0.4s;
}
a:hover,
a:focus {
  opacity: 1;
}
ul {
  padding: 0;
  margin: 0;
  list-style: none;
}
i {
    display: flex;
}
.fa-check:before {
    content: "\f00c"; /* Unicode for check icon */
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
                color: #28a745; /* Green color */
}
p:last-child {
    margin-bottom: 0;
}
p {
    font-size: 16px;
    line-height: 24px;
    font-weight: 400;
    color: #858584;
}
.notification-block {
        max-height: 600px; /* Adjust the height as needed */
        overflow-y: auto;
    }
.fa-image:before {
    content: "\f03e"; /* Unicode for image icon */
    font-family: "Font Awesome 5 Free"; /* Ensure the correct Font Awesome font family */
    font-weight: 900; /* Font Awesome 5 Free requires a font-weight for icons */
    color: #007bff; /* Blue color for the image icon */
}
    </style>

    <ul class="notification-block mb-0">                
        <?php $__currentLoopData = $notificationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
    
        $date_time = \Helper::converttimeTozone($notification->created_at);

        $date_time = date('h:i A d M, Y',strtotime($date_time));

        if ($notification->notification_type == 1) {
            $icon = "fa-solid fa-check text-dark-green";
        }elseif ($notification->notification_type == 2) {
            $icon = "fa-solid fa-image text-orange";
            
        }else{
            $icon = "fa-solid fa-image text-orange";

        }
        ?>
        <?php if($notification->notification_type == 1): ?>
            <!-- <li> -->
            <li style="background-color: <?php echo e(@$notification->is_read == 0 ? '#ffc23647' : 'transparent'); ?>;">
   
        
                <div class="preview-img">
                    <span class="bg-light-orange"><i class="<?php echo e(@$icon); ?>"></i></span>
                </div>                    
                <div class="preview-info mb-3">
                    <span class="text-grey d-block"><?php echo e(@$date_time); ?></span>
                    <p class="body-normal text-black"><a href="<?php echo e(route('adminorder.show',[($notification->orderId)])); ?>"><?php echo e(@$notification->order_id); ?> </a> <?php echo e(@$notification->message); ?></p>
                </div>
            </li>
        <?php else: ?>
        <!-- <li> -->
        <li style="background-color: <?php echo e(@$notification->is_read == 0 ? '#ffc23647' : 'transparent'); ?>;">
   
        
                <div class="preview-img">
                    <span class="bg-light-orange"><i class="<?php echo e(@$icon); ?>"></i></span>
                </div>                    
                <div class="preview-info mb-3">
                    <span class="text-grey d-block"><?php echo e(@$date_time); ?></span>
                    <p class="body-normal text-black"><a href="<?php echo e(route('inquiry.show',[($notification->inquiryId)])); ?>"><?php echo e(@$notification->inquiryId); ?> </a> <?php echo e(@$notification->inquiry_message); ?></p>
                </div>
            </li>

        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </ul>

<script type="text/javascript">
    $('.btn-close').click(function(e) {
        $(".offcanvasNotification").removeClass('show');
        // window.location.reload();
    });
</script><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/notification.blade.php ENDPATH**/ ?>