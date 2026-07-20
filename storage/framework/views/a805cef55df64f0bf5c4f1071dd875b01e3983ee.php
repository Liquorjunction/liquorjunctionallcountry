<div class="tab-pane test_mail  <?php echo e(( Session::get('active_tab') == 'mailSettingsTab') ? 'active' : ''); ?>"
     id="tab-7">
    <div class="p-a-sm"><h5><?php echo __('backend.mailSettings'); ?></h5></div>

    <div class="p-a-sm col-md-12">
        <div class="row">
            <div class="col-sm-5 form-group">
                <label><?php echo __('backend.mailDriver'); ?></label>
                <select name="mail_driver" id="mail_driver" class="form-control c-select">
                  <!--   <option
                        value="" <?php echo e((env("MAIL_DRIVER")== "") ? "selected='selected'":""); ?>>
                        None
                    </option> -->
                   <!--  <option
                        value="sendmail" <?php echo e((env("MAIL_DRIVER")== "sendmail") ? "selected='selected'":""); ?>>
                        sendmail - PHP mail()
                    </option> -->
                    <option
                        value="smtp" <?php echo e((env("MAIL_DRIVER")== "smtp") ? "selected='selected'":""); ?>>
                        SMTP ( Recommended )
                    </option>
                   <!--  <option
                        value="mailgun" <?php echo e((env("MAIL_DRIVER")== "mailgun") ? "selected='selected'":""); ?>>
                        Mailgun
                    </option>
                    <option
                        value="ses" <?php echo e((env("MAIL_DRIVER")== "ses") ? "selected='selected'":""); ?>>
                        Amazon SES
                    </option>
                    <option
                        value="postmark" <?php echo e((env("MAIL_DRIVER")== "postmark") ? "selected='selected'":""); ?>>
                        Postmark
                    </option> -->
                </select>
            </div>
            <div class="col-sm-5 form-group <?php echo e((env("MAIL_DRIVER") != "sendmail" && env("MAIL_DRIVER") != "")?"":"displayNone"); ?>"
                 id="mail_host_div">
                <label><?php echo __('backend.mailHost'); ?></label>
                <?php echo Form::text('mail_host',env("MAIL_HOST"), array('id' => 'mail_host','class' => 'form-control', 'dir'=>'ltr')); ?>

            </div>
            <div class="col-sm-2 form-group <?php echo e((env("MAIL_DRIVER") != "sendmail" && env("MAIL_DRIVER") != "")?"":"displayNone"); ?>"
                 id="mail_port_div">
                <label><?php echo __('backend.mailPort'); ?></label>
                <?php echo Form::text('mail_port',env("MAIL_PORT"), array('id' => 'mail_port','class' => 'form-control', 'dir'=>'ltr')); ?>

            </div>
        </div>
    </div>
    <div class="p-a-sm col-md-12 ">
        <div class="row">
            <div class="col-sm-5 form-group <?php echo e((env("MAIL_DRIVER") != "sendmail" && env("MAIL_DRIVER") != "")?"":"displayNone"); ?>"
                 id="mail_username_div">
                <label><?php echo __('backend.mailUsername'); ?></label>
                <?php echo Form::text('mail_username',env("MAIL_USERNAME"), array('id' => 'mail_username','class' => 'form-control', 'dir'=>'ltr')); ?>

            </div>
            <div class="col-sm-7 form-group <?php echo e((env("MAIL_DRIVER") != "sendmail" && env("MAIL_DRIVER") != "")?"":"displayNone"); ?>"
                 id="mail_password_div">
                <label><?php echo __('backend.mailPassword'); ?></label>
                <?php echo Form::text('mail_password',env("MAIL_PASSWORD"), array('id' => 'mail_password','class' => 'form-control', 'dir'=>'ltr')); ?>

            </div>
        </div>
    </div>
    <div class="p-a-sm col-md-12 ">
        <div class="row">
            <div class="col-sm-5 form-group <?php echo e((env("MAIL_DRIVER") != "sendmail" && env("MAIL_DRIVER") != "")?"":"displayNone"); ?>"
                 id="mail_encryption_div">
                <label><?php echo __('backend.mailEncryption'); ?></label>
                <select name="mail_encryption" id="mail_encryption" class="form-control c-select">
                    <option
                        value="" <?php echo e((env("MAIL_ENCRYPTION") == "") ? "selected='selected'":""); ?>>
                        none
                    </option>
                    <option
                        value="ssl" <?php echo e((env("MAIL_ENCRYPTION") == "ssl") ? "selected='selected'":""); ?>>
                        ssl
                    </option>
                    <option
                        value="tls" <?php echo e((env("MAIL_ENCRYPTION") == "tls") ? "selected='selected'":""); ?>>
                        tls
                    </option>
                </select>
            </div>
            <div class="col-sm-7 form-group <?php echo e((env("MAIL_DRIVER") == "")?"displayNone":""); ?>" id="mail_from_div">
                <label><?php echo __('backend.mailNoReplay'); ?></label>
                <?php echo Form::text('mail_no_replay',env("MAIL_FROM_ADDRESS"), array('id' => 'mail_no_replay','class' => 'form-control', 'dir'=>'ltr')); ?>

                <?php if($errors->has('mail_no_replay')): ?>
                
                <span class="help-block">
                    <span  style="color: red;" class='validate'><?php echo e($errors->first('mail_no_replay')); ?></span>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="p-a-sm col-md-12 ">
        <div class="row">
            <div class="col-sm-5 form-group" id="support_name">
                <label>Support Name</label>
                <?php echo Form::text('support_name',env("SUPPORT_NAME"), array('id' => 'support_name','class' => 'form-control', 'dir'=>'ltr')); ?>

            </div>
            <div class="col-sm-7 form-group" id="support_email">
                <label>Support Email</label>
                <?php echo Form::text('support_email',env("SUPPORT_EMAIL"), array('id' => 'support_email','class' => 'form-control', 'dir'=>'ltr')); ?>

                <?php if($errors->has('support_email')): ?>
                <span class="help-block">
                    <span  style="color: red;" class='validate'><?php echo e($errors->first('support_email')); ?></span>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="p-a-sm col-md-12 ">
        <div class="row">
            <div class="col-sm-5 form-group" id="support_name">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo e($WebmasterSetting->phone); ?>" class="form-control">
            </div>
            <div class="col-sm-7 form-group" >
                <label>Address</label>
                <textarea rows="3" name="address" class="form-control"><?php echo e($WebmasterSetting->address); ?></textarea>
            </div>
            
            





        </div>
        
        <input type="hidden" name="mail_test" id="to_email" value="">
    </div>

    
</div>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/webmaster/settings/mail.blade.php ENDPATH**/ ?>