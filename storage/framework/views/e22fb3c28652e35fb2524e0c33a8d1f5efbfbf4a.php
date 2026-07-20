
<?php $__env->startSection('title', 'Create Promo Code'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<style type="text/css">
    #startdate {
    z-index: 1200 !important;
    }
</style>
<div class="padding edit-package add-schoo">
<div class="box">
    <div class="box-header dker">
        <h3><i class="material-icons">&#xe02e;</i> New Promo Code </h3>
        <small>
        <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
        <a href="<?php echo e(route('promocode')); ?>">Promo Code</a> / New Promo Code
        </small>
    </div>
    <div class="box-tool">
        <ul class="nav">
            <li class="nav-item inline">
                <a class="nav-link" href="<?php echo e(route('users')); ?>">
                <i class="material-icons md-18">×</i>
                </a>
            </li>
        </ul>
    </div>
    <div class="box nav-active-border b-info" style="position:relative;">
        <div class="tab-content clear b-t">
            <div class="tab-pane active" id="tab_details">
                <div class="box-body">
                    <?php echo e(Form::open(['route' => ['promocode.store'], 'method' => 'POST', 'id' => 'promocode-form', 'files' => true])); ?>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 form-control-label">Promo Code<span
                            class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <?php echo Form::text('promo_code', '', [
                            'placeholder' => 'Promo Code',
                            'maxlength' => '20',
                            'class' => 'form-control',
                            'id' => 'promo_code',
                            ]); ?>

                            <?php $__errorArgs = ['promo_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="valid_field"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-2 form-control-label">Start Date<span
                            class="valid_field">*</span> </label>
                        <div class="col-sm-10" style="position:relative;">
                            <input class="form-control" id="startdate" name="startdate"
                                value="<?php echo e(old('startdate')); ?>" placeholder="DD-MM-YYYY" type="datetime" />
                            <?php $__errorArgs = ['startdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="valid_field"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-2 form-control-label">End Date<span
                            class="valid_field">*</span></label>
                        <div class="col-sm-10" style="position:relative;">
                            <input class="form-control" id="enddate" placeholder="DD-MM-YYYY"
                                value="<?php echo e(old('enddate')); ?>" name="enddate" type="datetime" />
                            <?php $__errorArgs = ['enddate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="valid_field"> <?php echo e($message); ?> </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="min_amount" class="col-sm-2 form-control-label">Minimum Amount<span
                                class="valid_field">*</span></label>
                        <div class="col-sm-10">
                             <?php echo Form::text('min_amount','' , [
                            'placeholder' => '100',
                            'maxlength' => '5',
                            'class' => 'form-control',
                            'id' => 'min_amount',
                            ]); ?>

                            <?php $__errorArgs = ['min_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="valid_field"><?php echo e($message); ?> </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Per User Limit<span
                                    class="valid_field">*</span></label>
                            <div class="col-sm-10">
                                <?php echo Form::text('total_usage','' , [
                                    'placeholder' => '3',
                                    'maxlength' => '5',
                                    'class' => 'form-control',
                                    'id' => 'total_usage',
                                    'onkeyup' => 'onlyNumber(this),this.value = minmax(this.value,1,100)',
                                    ]); ?>

                                    <?php $__errorArgs = ['total_usage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="valid_field"><?php echo e($message); ?> </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="person" class="col-sm-2 form-control-label">Discount Percentage(%)<span
                            class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <?php echo Form::text('discount_percentage', old('discount_percentage'), [
                            'placeholder' => 'Discount Percentage',
                            'maxlength' => '5',
                            'class' => 'form-control',
                            'id' => 'discount_percentage',
                            'onkeyup' => 'onlyNumber(this),this.value = minmax(this.value,1,100)',
                            ]); ?>

                            <?php $__errorArgs = ['discount_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="valid_field"><?php echo e($message); ?> </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" style="border: none">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger">
                                    <?php echo e($message); ?>

                                </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div> -->
                    <div class="form-group row">
                        <!-- <label for="person" class="col-sm-2 form-control-label">Allowed Time
                            </label>
                            
                            <div class="col-sm-10">
                                <?php echo Form::text('allowed_time', old('allowed_time'), [
                                    'placeholder' => 'Allowed Time',
                                    'maxlength' => '2',
                                    'class' => 'form-control',
                                    'id' => 'allowed_time',
                                    'onkeyup' => 'onlyNumber(this),this.value = minmax(this.value,1,10)',
                                ]); ?>

                                <small>* how many times a single user is allowed to use the promotion code</small>
                                <?php $__errorArgs = ['allowed_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                            </div> -->
                    </div>
                    <div class="form-group row m-t-md">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit"  class="btn btn-primary m-t" onclick ="dateCheck()"><i
                                class="material-icons">
                            &#xe31b;</i> <?php echo __('backend.add'); ?></button>
                            <a href="<?php echo e(route('promocode')); ?>" class="btn btn-default m-t"><i
                                class="material-icons">
                            &#xe5cd;</i> <?php echo __('backend.cancel'); ?></a>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-scripts'); ?>
<script src="<?php echo e(asset('assets/dashboard/js/jquery.validate.min.js')); ?> "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment-with-locales.min.js"
    integrity="sha512-bD+NptvsSHsytHV6cB1VGqsz70DB8skG6CR943xg1cm8pIoGP/uhZz1RrMQCgVDGI35iDcpnp0cIIu31RNM6SQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">  
    var validNumber = new RegExp(/^\d*\.?\d*$/);
    var lastValid = document.getElementById("discount_percentage").value;

    function onlyNumber(elem) {
        if (validNumber.test(elem.value)) {
            lastValid = elem.value;
        } else {
            elem.value = lastValid;
        }
    }
    
    function minmax(value, min, max) {
        if (parseInt(value) < min || isNaN(parseInt(value)))
            return '';
        else if (parseInt(value) > max)
            return max;
        else return value;
    }
    
    function dateCheck(event) {  
        var from_date = $('#startdate').val();
        var to_date = $('#enddate').val();
        if (from_date != '' && from_date != null && to_date != '' && to_date != null) {
            // if (new Date(to_date) < new Date(from_date)) {
            //     alert('End Date should be greater than the Start Date!!');
            //     return false;
            // } else {
            //   //  $('#promocode-form').submit();
            // }
        } else {
         //   $('#promocode-form').submit();
        }
    }

    $("#startdate").datepicker({
        changeMonth: true,
        startDate: '+0d',
        changeYear: true,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        orientation: "bottom",
        autoclose: true
    }).on('changeDate', function(selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#enddate').datepicker('setStartDate', minDate);
    });
    $("#enddate").datepicker({
        changeMonth: true,
        //startDate: '+0d',
        changeYear: true,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        orientation: "bottom",
        autoclose: true,
    }).on('click', function(selected) {
        var minDate = $('#startdate').datepicker("getDate");
        minDate = new Date(minDate.valueOf());
        $('#enddate').datepicker('setStartDate', minDate);
    });
   
        
    var specialKeys = new Array();
    specialKeys.push(8);
    
    function IsNumeric(e) {
    
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
        //document.getElementById("error").style.display = ret ? "none" : "inline";  
        return ret;
    }
</script>








<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/promocode/create.blade.php ENDPATH**/ ?>