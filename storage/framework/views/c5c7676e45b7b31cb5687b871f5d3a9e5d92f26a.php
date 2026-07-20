<div class="tab-pane <?php echo e(( Session::get('active_tab') == 'webInfo') ? 'active' : ''); ?>" id="tab-8">
    <div class="p-a-sm">
        <h5>Website Information</h5>
    </div>
    <div class="p-a-sm col-md-12">
        <div class="row">
            
            <div class="col-sm-6" style="margin-bottom: 2px;">
            <label>Language: </label>
            <select name="language_id" class="form-control c-select">
                <option <?php echo e((isset($WebmasterSetting->language_id) && $WebmasterSetting->language_id	 == 1) || old('language_id') == 1  ? 'selected' : ''); ?> value="1">EN</option>
                <option <?php echo e((isset($WebmasterSetting->language_id	) && $WebmasterSetting->language_id	 == 2) || old('language_id') == 2  ? 'selected' : ''); ?> value="2">FR</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label for="phone">Phone Number:</label> <?php echo Form::text('phone', $WebmasterSetting->phone, [ 'placeholder' => '', 'class' => 'form-control', 'id' => 'phone', ]); ?>

        </div>
        </div>
    </div>
    <div class="p-a-sm col-md-12">
        <div class="row">
            <div class="col-sm-6" id="">
                <label>Email:</label> <?php echo Form::text('email', $WebmasterSetting->email, [ 'id' => 'email', 'class' => 'form-control']); ?> <?php if($errors->has('email')): ?> <span class="help-block">
                    <span style="color: red;" class='validate'><?php echo e($errors->first('email')); ?></span>
                </span> <?php endif; ?>
            </div>
            <div class="col-sm-6" id="">
                <label>Fax :</label> <?php echo Form::text('fax', $WebmasterSetting->fax, ['id' => 'fax', 'class' => 'form-control']); ?> <?php if($errors->has('fax')): ?> <span class="help-block">
                    <span style="color: red;" class='validate'><?php echo e($errors->first('fax')); ?></span>
                </span> <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="p-a-sm col-md-12">
        <div class="row">            
            <div class="col-sm-6" id="">
                    <label>Address [EN]:</label>
                    <textarea rows="3" name="address" class="form-control"><?php echo e($WebmasterSetting->address); ?></textarea>
            </div>         
            <div class="col-sm-6" id="">
                    <label>Address [FR]:</label>
                    <textarea rows="3" name="address_fr" class="form-control"><?php echo e($WebmasterSetting->address_fr); ?></textarea>
            </div>
           
        </div>
    </div>
    <div class="p-a-sm col-md-12">
        <div class="row">            
            <div class="col-sm-6" id="">
                    <label>Map URL:</label>
                    <input type="text" name="map_url" class= "form-control" value="<?php echo e($WebmasterSetting->map_url); ?>">
            </div>         
           
        </div>
    </div>
   
    </div>
    <script type="text/javascript">
        $('#map_distance').on("input", function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
            $(this).val($(this).val().replace(/^\s+/g, ''));
        });
        function isNumberBlock(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            // alert($(this).val())
            // evt.which.val().length
            if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
                // alert()
                return false;
            return true;
        }
    </script>

</div><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/webmaster/settings/webinfo.blade.php ENDPATH**/ ?>