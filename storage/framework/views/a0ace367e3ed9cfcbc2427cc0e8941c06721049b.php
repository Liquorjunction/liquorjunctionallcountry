
<div class="page-border"></div>
<div class="form-group">
    <label for=""><?php echo e(@Helper::language('name_label_web')); ?><span class="text-red star">*</span></label>
    <input type="text" id="name" value="<?php echo e(@$UserAddressData->name); ?>" onkeypress="return onlyString(event)" placeholder="<?php echo e(@Helper::language('enter_name_web')); ?>" name="name" id="name" class="">

</div>
</div>
<?php
// dd($countryData);
?>
<div class="form-group has-validation">
    <label for=""><?php echo e(@Helper::language('phone_number')); ?><span class="text-red star">*</span></label>
    <div class="input-group phone-number">
        <select class="numbers" id="phone" name="phonecode" value="<?php echo e(@$UserAddressData->phonecode); ?>">
            <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value->phonecode); ?>" <?php echo e((@$UserAddressData->phonecode == $value->phonecode) ? 'selected' : ''); ?>>+ <?php echo e($value->phonecode.' ('.$value->shortname.')'); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="text" value="<?php echo e(@$UserAddressData->phone); ?>" oninput="this.value = this.value.replace(/\D+/g, '')" placeholder="<?php echo e(@Helper::language('enter_phone_number_place')); ?> " name="phone" maxlength="15" id="phone">
    </div>
</div>
</div>
<div class="form-group">
    <label for=""> <?php echo e(@Helper::language('country_label_web')); ?><span class="text-red star">*</span></label>
    <select name="country_id" id="country_id" onchange="getSubCatList(this)" class="form-select" value="<?php echo e(@$UserAddressData->country_id); ?>">
        <option value=""><?php echo e(@Helper::language('choose_country_web')); ?></option>
        <?php 
            $countryData = @$countryData->sortBy(['name', 'ASC']);
            $countryData = $countryData->values();
        ?>
        <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($value->id); ?>" <?php echo e((@$UserAddressData->country_id == $value->id) ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="invalid-feedback">
        Please enter Country.
    </div>
</div>
<div class="form-group">
    <label for=""><?php echo e(@Helper::language('region_label_web')); ?><span class="text-red star">*</span></label>
    <select value="<?php echo e(old('region_id')); ?>" onchange="getAreaList(this)" name="region_id" id="region_id" class="form-select">
        <option value=""><?php echo e(@Helper::language('choose_region_web')); ?></option>
        <?php $__currentLoopData = $region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($value->id); ?>" <?php echo e((@$UserAddressData->region_id == $value->id) ? 'selected' : ''); ?>><?php echo e($value->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

</div>
<div class="form-group">
    <label for=""><?php echo e(@Helper::language('area_label_web')); ?><span class="text-red star">*</span></label>
    <select value="<?php echo e(old('area_id')); ?>" name="area_id" id="area_id" class="form-select">
        <option value=""><?php echo e(@Helper::language('choose_area_web')); ?></option>
        <?php $__currentLoopData = $area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($value->id); ?>" <?php echo e((@$UserAddressData->area_id == $value->id) ? 'selected' : ''); ?>><?php echo e($value->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('zip_code_label')); ?><span class="text-red star">*</span></label>
                                <input type="text" name="zip_code"placeholder="<?php echo e(@Helper::language('enter_code_place')); ?>" value="<?php echo e(@$UserAddressData->zip_code); ?>" class="required" placeholder="Enter Zip Code <?php echo e(@Helper::language('name_label_web')); ?>" required>
                                <div class="invalid-feedback">
                                    Please enter Zip Code.
                                </div>
                            </div>
                        
                   
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('city_label')); ?> <span class="text-red star">*</span></label>
                                <input type="text" value="<?php echo e(@$UserAddressData->city); ?>" name="city" id="city" placeholder="<?php echo e(@Helper::language('enter_city_label')); ?>" class="">
                                <div class="invalid-feedback">
                                    Please enter City.
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('street_address')); ?> <span class="text-red star">*</span></label>
                                <textarea name="address" id="address" placeholder="<?php echo e(@Helper::language('enter_street_address')); ?>" col="5" rows="2"><?php echo e(@$UserAddressData->address); ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter Address.
                                </div>
                            </div>

                               
                            <div class="form-group" style="border: 1px solid #DDDDDD; margin-bottom: 15px;padding: 15px 20px 0px 20px;">
                                <label for="instruction">Delivery Instructions (Optional)</label>
                                
                                <div class="mt-2 mb-2">
                                    <label for="instruction">Drop off Options&nbsp;&nbsp;</label>
                                    <br>
                                    <div class="radio-group">
                                        <input id="user_drop" class="radioPurchase" type="radio" name="delivery_options" <?php echo e(@$UserAddressData->delivery_options == 1 ? 'checked' : ''); ?> value="1" />
                                        <label for="user_drop">Hand over to Me</label>
                                    </div>
                                    &nbsp;&nbsp;
                                    <div class="radio-group">
                                        <input id="door_drop"  <?php echo e(@$UserAddressData->delivery_options == 2 ? 'checked' : ''); ?> value="2" class="radioPurchase" type="radio" name="delivery_options" />
                                        <label for="door_drop">Leave it at my Door</label>
                                    </div>
                                </div>

                                <p class="sidebar-item">Please advise us of any special requirements,if applicable</p>
                                <div class="form-group">
                                    <textarea name="instruction" id="instruction" col="2" rows="1" placeholder="E.g. Leave at front door"><?php echo e(@$UserAddressData->delivery_instructions); ?></textarea>
                                </div>
                            </div>



<input type="hidden" name="checkout_page" id="checkout_page" value="1">
<input type="hidden" name="edit_address_id" id="edit_address_id" value="<?php echo e(@$UserAddressData->id); ?>">
<button type="submit" class="solid-button w-100">Submit</button>
<?php $__env->startPush('after-scripts'); ?>
<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    function onlyNumberKey(num) {
        let ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
<script>
    function onlyString(evt) {
        //var e = evt || window.event;
        var keyCode = (evt.which) ? evt.which : evt.keyCode;
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

            return false;
        return true;

    }


    $('#name').on("input", function() {
        console.log(this.value);
        this.value = this.value.replace(/[^a-zA-Z\s]/gi, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });

</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/checkout/edit-address.blade.php ENDPATH**/ ?>