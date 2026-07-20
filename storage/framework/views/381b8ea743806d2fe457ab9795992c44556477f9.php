<?php
use App\Helpers;
$order_status = ($order_status)?$order_status:'';
 $content = Helper::getEmailtemplateContentOrderStatusChanged($user_name,$sendname,$sendemail,$order, $order_status,$id);
//  dd($content);exit;
?>
<div><?php echo $content; ?></div><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/emails/orderstatuschanged.blade.php ENDPATH**/ ?>