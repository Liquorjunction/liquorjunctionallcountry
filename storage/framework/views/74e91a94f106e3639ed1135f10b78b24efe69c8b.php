
<?php $__env->startSection('title', __('backend.cms')); ?>

<?php $__env->startPush('after-styles'); ?>
    <link href="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="padding edit-package">
    <div class="box">
        <div class="box-header dker">
            <h3>
                <i class="material-icons">&#xe02e;</i> Edit <?php echo e(__('backend.cms')); ?>

            </h3>
            <small>
                <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                <a href="<?php echo e(route('cms')); ?>"><?php echo e(__('backend.cms')); ?></a> / Edit CMS
            </small>
        </div>

        <div class="box-tool">
            <ul class="nav">
                <li class="nav-item inline">
                    <a class="nav-link" href="<?php echo e(route('cms')); ?>">
                        <i class="material-icons md-18">×</i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="box-body">
            <?php echo e(Form::open(['route' => ['cms.update', $cms->id], 'method' => 'POST', 'files' => true])); ?>

            <div class="personal_informations">

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Image<span class="valid_field"></span></label>
                    <div class="col-sm-10">
                        <input
                            type="file"
                            name="photo"
                            id="bannerimage"
                            class="form-control"
                            accept="image/png, image/jpeg"
                            style="margin-left: -10px;"
                        >
                        <div class="help-block with-errors text-danger"></div>
                        <small><i class="material-icons">&#xe8fd;</i> Choose image .png, .jpg, .jpeg files only.</small><br>
                        <small><i class="material-icons">&#xe8fd;</i> Recommended size 1440(Width) x 250(Height).</small>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
                        <?php
                            $imagePath = $cms->photo && file_exists(public_path('uploads/cms/' . $cms->photo))
                                ? asset('uploads/cms/' . $cms->photo)
                                : asset('uploads/contacts/noimage.png');
                        ?>
                        <img id="previewImage" src="<?php echo e($imagePath); ?>" width="100" height="100" alt="Preview Image">
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label"><?php echo __('backend.newpage'); ?> [EN] <span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="page_name"
                            id="page_name"
                            class="form-control"
                            placeholder="Name"
                            value="<?php echo e(old('page_name', $cms->page_name)); ?>"
                        >
                        <?php $__errorArgs = ['page_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label"><?php echo __('backend.newpage'); ?> [FR] <span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="page_name_fr"
                            id="page_name_fr"
                            class="form-control"
                            placeholder="Name"
                            value="<?php echo e(old('page_name_fr', $cms->page_name_fr)); ?>"
                        >
                        <?php $__errorArgs = ['page_name_fr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label"><?php echo __('backend.pagecontent'); ?> [EN] <span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control"
                            id="page_content"
                            name="page_content"
                            autofocus
                        ><?php echo e(old('page_content', urldecode($cms->page_content))); ?></textarea>
                        <?php $__errorArgs = ['page_content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label"><?php echo __('backend.pagecontent'); ?> [FR] <span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control"
                            id="page_content_fr"
                            name="page_content_fr"
                            autofocus
                        ><?php echo e(old('page_content_fr', urldecode($cms->page_content_fr))); ?></textarea>
                        <?php $__errorArgs = ['page_content_fr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Mobile <?php echo __('backend.pagecontent'); ?> [EN] <span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control"
                            id="mobile_page_content"
                            name="mobile_page_content"
                            autofocus
                        ><?php echo e(old('mobile_page_content', urldecode($cms->mobile_page_content))); ?></textarea>
                        <?php $__errorArgs = ['mobile_page_content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Mobile <?php echo __('backend.pagecontent'); ?> [FR] <span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control"
                            id="mobile_page_content_fr"
                            name="mobile_page_content_fr"
                            autofocus
                        ><?php echo e(old('mobile_page_content_fr', urldecode($cms->mobile_page_content_fr))); ?></textarea>
                        <?php $__errorArgs = ['mobile_page_content_fr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

            </div>

            <div class="form-group row mt-3">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">&#xe31b;</i> Update
                    </button>
                    <a href="<?php echo e(route('cms')); ?>" class="btn btn-default">
                        <i class="material-icons">&#xe5cd;</i> <?php echo __('backend.cancel'); ?>

                    </a>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script src="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/summernote/dist/summernote.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    

    <script>
        $(function() {
            // Initialize icon picker
            $('.icp-auto').iconpicker({
                placement: '<?php echo e((app()->getLocale() === "ar" || app()->getLocale() === "he") ? "topLeft" : "topRight"); ?>'
            });

            // Image validation and preview
            $('#bannerimage').on('change', function(evt) {
                const file = this.files[0];
                const helpBlock = $(this).siblings('.help-block.with-errors');
                helpBlock.text('');

                if (!file) return;

                const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                const maxSize = 2 * 1024 * 1024; // 2 MB

                if (!allowedExtensions.exec(file.name)) {
                    this.value = '';
                    helpBlock.text('Please upload only .png, .jpg, .jpeg files.');
                    $('#previewImage').attr('src', '<?php echo e(asset("uploads/contacts/noimage.png")); ?>');
                    return;
                }

                if (file.size > maxSize) {
                    this.value = '';
                    helpBlock.text('File upload size must not exceed 2 MB.');
                    $('#previewImage').attr('src', '<?php echo e(asset("uploads/contacts/noimage.png")); ?>');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            });

            // Initialize CKEditor for textareas
            ['page_content', 'page_content_fr', 'mobile_page_content', 'mobile_page_content_fr'].forEach(function(id) {
                CKEDITOR.replace(id, {
                    height: 400,
                    on: {
                        focus: function() {
                            console.log(id + ' focused');
                        },
                        blur: function() {
                            console.log(id + ' lost focus');
                        }
                    }
                });
            });

            $('form').on('submit', function() {
                console.log('Form submit triggered');
                for (const instanceName in CKEDITOR.instances) {
                    if (CKEDITOR.instances.hasOwnProperty(instanceName)) {
                        CKEDITOR.instances[instanceName].updateElement();
                        console.log('Updated CKEditor:', instanceName);
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/cms/edit.blade.php ENDPATH**/ ?>