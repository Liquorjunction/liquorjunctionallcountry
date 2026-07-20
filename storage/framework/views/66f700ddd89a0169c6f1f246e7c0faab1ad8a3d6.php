<?php
use App\Helpers;

 $content = Helper::getEmailtemplateContentForgotpassword($id,$email,@$otp,$name,$url,$logo);

?>
<div><?php echo $content; ?></div>

<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/password.blade.php ENDPATH**/ ?>