<?php
use App\Helpers;

 $content = Helper::getEmailtemplateContentUserOtp($email,$name,$otp,$id);
?>
<div><?php echo $content; ?></div>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/emails/user_otp.blade.php ENDPATH**/ ?>