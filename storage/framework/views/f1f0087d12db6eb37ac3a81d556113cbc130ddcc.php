<?php
$title_var = "title_" . @Helper::currentLanguage()->code;
$title_var2 = "title_" . env('DEFAULT_LANGUAGE');
?>
<?php $__env->startSection('title', __('backend.label')); ?>
<?php $__env->startPush("after-styles"); ?>
    <link href="<?php echo e(asset("assets/dashboard/js/iconpicker/fontawesome-iconpicker.min.css")); ?>" rel="stylesheet">

    <link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
        .error {
            color: red;
            margin-left: 5px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="padding edit-package">
        <div class="box">
            <div class="box-header dker">
              
                <h3><i class="material-icons">
                        &#xe02e;</i> Edit <?php echo e(__('backend.label')); ?>

                </h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                    <a href="<?php echo e(route('label')); ?>">Labels</a> / Edit Label

                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="<?php echo e(route('label')); ?>">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                <?php echo e(Form::open(['route'=>['label.update',$label->id],'method'=>'POST', 'files' => true,'enctype' => 'multipart/form-data', 'id' => 'labelForm' ])); ?>


                <div class="personal_informations">
                    <!-- <h3><?php echo __('backend.label'); ?></h3>
                    <br>
                    <br> -->
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label"><?php echo __('backend.labelKey'); ?> <span class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="label_name" id="label_key" class="form-control" placeholder="Label Key" value="<?php echo e(isset($label->label_name)?$label->label_name:old('label_name')); ?>" disabled>
                            <?php if($errors->has('label_name')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('label_name')); ?></span>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label"><?php echo __('backend.labelValue'); ?> [EN] <span class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="label_value" id="label_value" class="form-control" placeholder="Label Value [EN]" value="<?php echo e(isset($label->label_value)?$label->label_value:old('label_value')); ?>">
                            <?php if($errors->has('label_value')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('label_value')); ?></span>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label"><?php echo __('backend.labelValue'); ?> [FR] <span class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="label_value_fr" id="label_value" class="form-control" placeholder="Label Value [FR]" value="<?php echo e(isset($label->label_value_fr)?$label->label_value_fr:old('label_value')); ?>">
                            <?php if($errors->has('label_value_fr')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('label_value_fr')); ?></span>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Label type<span class="valid_field">*</span></label>
                       <div class="col-sm-10">
                        <?php $labelvalue=($label->label_type == 0) ? "Mobile" : "Web";?>
                            <select name="label_type" id="label_type" class="form-control" readonly>
                                <!-- <option value="">Select Here</option> -->

                                <?php if($label->label_type == 0): ?> 
                                <option value="0"<?php echo e(($label->label_type == 0) ? 'selected' : ''); ?> readonly>Mobile</option>
                                <?php else: ?>
                                <option value="1"<?php echo e(($label->label_type == 1) ? 'selected' : ''); ?> readonly>Web</option>
                                <?php endif; ?>
                            </select>

                        
                            <?php if($errors->has('label_type')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('label_type')); ?></span>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row m-t-md">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary m-t" id="submitDetail"><i class="material-icons">&#xe31b;</i> Update</button>
                            <a href="<?php echo e(route('label')); ?>" class="btn btn-default m-t">
                                <i class="material-icons">
                                &#xe5cd;</i> <?php echo __('backend.cancel'); ?>

                            </a>
                    </div>
                </div>


                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("after-scripts"); ?>
    <script src="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/summernote/dist/summernote.js')); ?>"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

 

    <script>
        $(function () {
            $('.icp-auto').iconpicker({placement: '<?php echo e((@Helper::currentLanguage()->direction=="rtl")?"topLeft":"topRight"); ?>'});
        });

        function sendFile(file, editor, welEditable, lang) {
            data = new FormData();
            data.append("file", file);
            data.append("_token", "<?php echo e(csrf_token()); ?>");
            
        }

        // update progress bar
        function progressHandlingFunction(e) {
            if (e.lengthComputable) {
                $('progress').attr({value: e.loaded, max: e.total});
                // reset progress on complete
                if (e.loaded == e.total) {
                    $('progress').attr('value', '0.0');
                }
            }
        }
    </script>
    <script type="text/javascript">
       
        $(document).ready(function() {
    $('#submitDetail').on('click', function() {
        var myForm = $("form#labelForm");
        if (myForm) {
            $(this).prop('disabled', true);
            $(myForm).submit();
        }
    });
});
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/label/edit.blade.php ENDPATH**/ ?>