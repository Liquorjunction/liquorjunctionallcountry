
<?php $__env->startSection('title',Helper::language('add_address')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .text-red-point{
        color:red;
    }
</style>
<div class="bread-crumb-block">
    <div class="container">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('my-account')); ?>"><?php echo e(@Helper::language('my_account_label')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"> <?php echo e(@Helper::language('add_address')); ?></li>
        </ul>
    </div>
</div>
<section class="edit-address pt-20 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('frontend.layouts.account-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-8">
                <h2><?php echo e(@Helper::language('add_address')); ?></h2>
                <div class="common-card">
                    <form class="row edit-address-form" id="add_address_form" novalidate>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('name_label_web')); ?> <span class="text-red">*</span></label>
                                <input type="text" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(@Helper::language('enter_name_web')); ?>" name="name" id="name" class="" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group has-validation">
                                <label for=""><?php echo e(@Helper::language('phone_number')); ?> <span class="text-red-point">*</span></label>
                                <div class="input-group phone-number">
                                    <select class="numbers" name="phonecode">
                                        <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->phonecode); ?>">+<?php echo e($value->phonecode.' ('.$value->shortname.')'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="tel" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(@Helper::language('enter_phone_number_place')); ?> " name="phone" id="phone">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('country_label_web')); ?> <span class="text-red">*</span></label>
                                <select value="<?php echo e(old('country_id')); ?>" onchange="getSubCatList(this)" name="country_id" id="country_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_country_web')); ?></option>
                                    <?php 
                                        $countryData = @$countryData->sortBy(['name', 'ASC']);
                                        $countryData = $countryData->values();
                                    ?>
                                    <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $selected = ''; ?>
                                    <?php if($value->id == old('country_id')): ?>
                                    <?php $selected = 'selected'; ?>
                                    <?php endif; ?>
                                    <option <?php echo e($selected); ?> value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('region_label_web')); ?><span class="text-red">*</span></label>
                                <select value="<?php echo e(old('region_id')); ?>" onchange="getAreaList(this)" name="region_id" id="region_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_region_web')); ?></option>
                                    
                                </select>

                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('state_label')); ?><span class="text-red">*</span></label>
                                <input type="text" value="<?php echo e(old('states')); ?>" placeholder="<?php echo e(@Helper::language('enter_state_place')); ?>" name="states" id="states" class="">

                            </div>
                        </div> -->

                         <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('city_label')); ?> <span class="text-red">*</span></label>
                                <input type="text" value="<?php echo e(old('city')); ?>" placeholder="<?php echo e(@Helper::language('enter_city_label')); ?>" name="city" id="city" class="">

                            </div>
                        </div> 
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('area_label_web')); ?><span class="text-red">*</span></label>
                                <select value="<?php echo e(old('area_id')); ?>" name="area_id" id="area_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_area_web')); ?></option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('street_address')); ?> <span class="text-red">*</span></label>
                                <textarea name="address" id="address" col="5" rows="2" placeholder="<?php echo e(@Helper::language('enter_street_address')); ?>"><?php echo e(old('address')); ?></textarea>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                        <div class="form-group">
                            <label for="zip_code"><?php echo e(@Helper::language('zip_code_label')); ?> <span class="text-red">*</span></label>
                            <input type="text" value="<?php echo e(old('zip_code')); ?>" placeholder="<?php echo e(@Helper::language('enter_zip_code')); ?>" name="zip_code" id="zip_code" class="">
                        </div>
                    </div>


                        <!-- <div class="col-12">
                            <div class="form-group">
                                <div class="check-group">
                                    <input class="form-check-input" type="checkbox" value="1" name="billing_address" id="flexCheckAddress"="">
                                    <label class="form-check-label" for="flexCheckAddress">Make this my default billing address</label>
                                </div>
                            </div>
                        </div> -->

                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button class="solid-button w-100" type="submit"><?php echo e(@Helper::language('save_details_btn')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    function isNumberKey(evt) {
        //var e = evt || window.event;
        var keyCode = (evt.which) ? evt.which : evt.keyCode;
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

            return false;
        return true;

    }

    $('#phone').on("input", function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });

    $('#name').on("input", function() {
        // console.log(this.value);
        this.value = this.value.replace(/[^a-zA-Z\s]/gi, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });
    var validation_name_required = "<?php echo e(\Helper::language('name_field_is_required')); ?>";
    var validation_name_max_required = "<?php echo e(\Helper::language('the_name_may_not_be_greater_than_40_characters')); ?>";

    var validation_states_required = "<?php echo e(\Helper::language('states_field_is_required')); ?>";
    var validation_zip_code_required = "<?php echo e(\Helper::language('zipcode_field_is_required')); ?>";
    var validation_city_required = "<?php echo e(\Helper::language('city_field_is_required')); ?>";

    var validation_address_required = "<?php echo e(\Helper::language('address_field_is_required')); ?>";
    var validation_country_required = "<?php echo e(\Helper::language('validation_country_required')); ?>";

    var validation_region_required = "<?php echo e(\Helper::language('validation_region_required')); ?>";
    var validation_area_required = "<?php echo e(\Helper::language('validation_area_required')); ?>";

    var validation_phone_required = "<?php echo e(\Helper::language('phone_number_field_is_required')); ?>";
    var validation_phone_minlength = "<?php echo e(\Helper::language('phone_number_min_max')); ?>";
    var validation_phone_maxlength = "<?php echo e(\Helper::language('phone_number_min_max')); ?>";
    var test = $("#add_address_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: {
                required:true,
                maxlength: 40,
            },
            states: "required",
            zip_code: "required",
            city: "required",
            address: "required",
            country_id: "required",
            region_id:"required",
            area_id:"required",
            phone: {
                required: true,
                minlength: 8,
                maxlength: 15
            },

        },
        // in 'messages' user have to specify message as per rules
        messages: {
            name: {
                required:validation_name_required,
                maxlength:validation_name_max_required
            },
            states: validation_states_required,
            zip_code: validation_zip_code_required,
            city: validation_city_required,
            address: validation_address_required,
            country_id: validation_country_required,
            region_id: validation_region_required,
            area_id: validation_area_required,

            phone: {
                required: validation_phone_required,
                minlength: validation_phone_minlength,
                minlength: validation_phone_maxlength,

            },
        },
        submitHandler: function() {
            var form_data = new FormData($('#add_address_form')[0]);
            action_url = "<?php echo e(route('store-address')); ?>";
            var csrf = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: action_url,
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                processData: false,
                contentType: false,
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $(".loader").fadeIn();
                    $('.loader').css("visibility", "visible");
                },
                success: function(response) {
                    // return false;
                    // console.log(response);
                    $('.loader').css("visibility", "visible");
                    var url = "<?php echo e(route('my-address')); ?>";
                    window.location.href = url;
                },
            });
        }
    });

    function getSubCatList(thisitem) {

    var idCountry = $('#country_id').val();
    var cat_id = $('#cat_id').val();
    //alert(category_id);
    $('#region_id').html('');
    $('#region_id').html('<option value=""><?php echo e(@Helper::language("choose_region_web")); ?></option>');
    $('#area_id').html('<option value=""><?php echo e(@Helper::language("choose_area_web")); ?></option>');
    $.ajax({
        url: "<?php echo e(route('getsubcatlist')); ?>",
        type: "POST",
        data: {
            id: idCountry,
            cat_id: cat_id,
            _token: '<?php echo e(csrf_token()); ?>'
        },
        dataType: 'json',
        success: function(result) {
            console.log(result);
            $('#region_id').html('<option value=""><?php echo e(@Helper::language("choose_region_web")); ?></option>');
            $.each(result.sub, function(key, value) {
                var selected = '';
                selected = value.country_id == idCountry ? "selected" : "";
                $("#region_id").append('<option ' + selected + ' value="' + value.id +
                    '">' +
                    value.title + '</option>');
            });
        }
    });
    }

    function getAreaList(thisitem) {

    var idCountry = $('#region_id').val();
    var cat_id = $('#cat_id').val();

    //alert(category_id);
    $('#area_id').html('');
    $('#area_id').html('<option value=""><?php echo e(@Helper::language("choose_area_web")); ?></option>');
    $.ajax({
        url: "<?php echo e(route('getarealist')); ?>",
        type: "POST",
        data: {
            id: idCountry,
            cat_id: cat_id,
            _token: '<?php echo e(csrf_token()); ?>'
        },
        dataType: 'json',
        success: function(result) {
            console.log(result);
            $('#area_id').html('<option value=""><?php echo e(@Helper::language("choose_area_web")); ?></option>');
            $.each(result.sub, function(key, value) {
                var selected = '';
                selected = value.area_id == idCountry ? "selected" : "";
                $("#area_id").append('<option ' + selected + ' value="' + value.id +
                    '">' +
                    value.title + '</option>');
            });
        }
    });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/my-profile/add-address.blade.php ENDPATH**/ ?>