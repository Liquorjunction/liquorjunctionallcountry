
<?php $__env->startSection('title',Helper::language('add_address')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .text-red-point{
        color:red;
    }

    .form-check {
    padding-left: 0 !important;
    margin-left: 0 !important;
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
<section class="edit-bill-address pt-20 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('frontend.layouts.account-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-8">
                <h2><?php echo e(@Helper::language('add_address')); ?></h2>
                <div class="common-card">
                    <form class="row edit-bill-address-form" id="add_bill_address_form" novalidate>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('name_label_web')); ?> <span class="text-red">*</span></label>
                                <input type="text" value="<?php echo e(old('bill_name')); ?>" placeholder="<?php echo e(@Helper::language('enter_name_web')); ?>" name="bill_name" id="bill_name" class="" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group has-validation">
                                <label for=""><?php echo e(@Helper::language('phone_number')); ?> <span class="text-red-point">*</span></label>
                                <div class="input-group phone-number">
                                    <select class="numbers" name="bill_phonecode" id="bill_phonecode">
                                        <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->phonecode); ?>">+<?php echo e($value->phonecode.' ('.$value->shortname.')'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="tel" value="<?php echo e(old('bill_phone')); ?>" placeholder="<?php echo e(@Helper::language('enter_phone_number_place')); ?> " name="bill_phone" id="bill_phone">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('country_label_web')); ?> <span class="text-red">*</span></label>
                                <select value="<?php echo e(old('bill_country_id')); ?>" onchange="getSubCatList(this)" name="bill_country_id" id="bill_country_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_country_web')); ?></option>
                                    <?php 
                                        $countryData = @$countryData->sortBy(['name', 'ASC']);
                                        $countryData = $countryData->values();
                                    ?>
                                    <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $selected = ''; ?>
                                    <?php if($value->id == old('bill_country_id')): ?>
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
                                <select value="<?php echo e(old('bill_region_id')); ?>" onchange="getAreaList(this)" name="bill_region_id" id="bill_region_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_region_web')); ?></option>
                                    
                                </select>

                            </div>
                        </div>
                         <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('city_label')); ?> <span class="text-red">*</span></label>
                                <input type="text" value="<?php echo e(old('bill_city')); ?>" placeholder="<?php echo e(@Helper::language('enter_city_label')); ?>" name="bill_city" id="bill_city" class="">

                            </div>
                        </div> 
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('area_label_web')); ?><span class="text-red">*</span></label>
                                <select value="<?php echo e(old('bill_area_id')); ?>" name="bill_area_id" id="bill_area_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_area_web')); ?></option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('street_address')); ?> <span class="text-red">*</span></label>
                                <textarea name="bill_address" id="bill_address" col="5" rows="2" placeholder="<?php echo e(@Helper::language('enter_street_address')); ?>"><?php echo e(old('bill_address')); ?></textarea>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                        <div class="form-group">
                            <label for="bill_zip_code"><?php echo e(@Helper::language('zip_code_label')); ?> <span class="text-red">*</span></label>
                            <input type="text" value="<?php echo e(old('bill_zip_code')); ?>" placeholder="<?php echo e(@Helper::language('enter_zip_code')); ?>" name="bill_zip_code" id="bill_zip_code" class="">
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6" style="margin-bottom:15px ">
                            <div class="form-check" style="display: flex; align-items: center">
                                <input class="form-check-input" type="checkbox" value="" id="defaultAdd">
                                <label class="form-check-label"  style="margin-top: 10px;color: #858584 !important;cursor: pointer;padding-left:10px;font-size:15px;">Set as Default</label>
                            </div>
                        </div>

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

    $('#bill_phone').on("input", function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });

    $('#bill_name').on("input", function() {
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

    var test = $("#add_bill_address_form").validate({
        rules: {
            bill_name: {
                required:true,
                maxlength: 40,
            },
            bill_zip_code: "required",
            bill_city: "required",
            bill_address: "required",
            bill_country_id: "required",
            bill_region_id:"required",
            bill_area_id:"required",
            bill_phone: {
                required: true,
                minlength: 8,
                maxlength: 15
            },

        },
        messages: {
            bill_name: {
                required:validation_name_required,
                maxlength:validation_name_max_required
            },
            bill_zip_code: validation_zip_code_required,
            bill_city: validation_city_required,
            bill_address: validation_address_required,
            bill_country_id: validation_country_required,
            bill_region_id: validation_region_required,
            bill_area_id: validation_area_required,
            bill_phone: {
                required: validation_phone_required,
                minlength: validation_phone_minlength,
                minlength: validation_phone_maxlength,

            },
        },
        submitHandler: function() {
            var form_data = new FormData($('#add_bill_address_form')[0]);
            var isDefaultChecked = $("#defaultAdd").is(":checked");
            form_data.append('isDefault', isDefaultChecked ? 1 : 0);

            action_url = "<?php echo e(route('store-bill-address')); ?>";
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
                    $('.loader').css("visibility", "visible");
                    var url = "<?php echo e(route('my-address')); ?>";
                    window.location.href = url;
                },
            });
        }
    });

    function getSubCatList(thisitem) {

        var idCountry = $('#bill_country_id').val();
        var cat_id = $('#cat_id').val();

        $('#bill_region_id').html('');
        $('#bill_region_id').html('<option value=""><?php echo e(@Helper::language("choose_region_web")); ?></option>');
        $('#bill_area_id').html('<option value=""><?php echo e(@Helper::language("choose_area_web")); ?></option>');
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
                $('#bill_region_id').html('<option value=""><?php echo e(@Helper::language("choose_region_web")); ?></option>');
                $.each(result.sub, function(key, value) {
                    var selected = '';
                    selected = value.country_id == idCountry ? "selected" : "";
                    $("#bill_region_id").append('<option ' + selected + ' value="' + value.id +
                        '">' +
                        value.title + '</option>');
                });
            }
        });
    }

    function getAreaList(thisitem) {

        var idRegion = $('#bill_region_id').val();
        var cat_id = $('#cat_id').val();

        $('#bill_area_id').html('');
        $('#bill_area_id').html('<option value=""><?php echo e(@Helper::language("choose_area_web")); ?></option>');
        $.ajax({
            url: "<?php echo e(route('getarealist')); ?>",
            type: "POST",
            data: {
                id: idRegion,
                cat_id: cat_id,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            dataType: 'json',
            success: function(result) {
                $('#bill_area_id').html('<option value=""><?php echo e(@Helper::language("choose_area_web")); ?></option>');
                $.each(result.sub, function(key, value) {
                    var selected = '';
                    selected = value.area_id == idRegion ? "selected" : "";
                    $("#bill_area_id").append('<option ' + selected + ' value="' + value.id +
                        '">' +
                        value.title + '</option>');
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/my-profile/add-bill-address.blade.php ENDPATH**/ ?>