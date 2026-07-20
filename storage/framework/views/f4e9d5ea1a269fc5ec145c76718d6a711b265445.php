<?php
use App\Helpers;

 $content = Helper::getEmailtemplateContentUserRegister($email,$name,$id);
?>
<div><?php echo $content; ?></div>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/emails/register_user.blade.php ENDPATH**/ ?>