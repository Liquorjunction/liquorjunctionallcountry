
<?php
$title_var = "title_" . @Helper::currentLanguage()->code;
$title_var2 = "title_" . env('DEFAULT_LANGUAGE');
?>
<?php $__env->startSection('title', 'Banner'); ?>
<?php $__env->startPush("after-styles"); ?>
    <link href="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/dashboard/css/select2.min.css')); ?>" rel="stylesheet" />
    <link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert.css')); ?>">

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
        .error {
            color: red;
            margin-left: 5px;
        }
    </style>
    <style>
     .select2-container 
       {
        width: 100% !important;
       }
        .pac-container {
            z-index: 10000 !important;
            
        }
        
    </style>
    <style>
        /* Style for the text color picker container */
        .text-color-picker-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height: 100%;
        }
    
        /* Adjust the color picker size */
        #textColorPicker {
            width:110px; /* Adjust as needed */
            height: 30px; /* Adjust as needed */
            border: none;
            padding: 0;
            margin: 0 0 0 10px;
            border-radius: 60px !important; /* Adjust the value to get the desired roundness */
        overflow: hidden;
        }
        .text-color-picker-container label {
        margin-left: 10px; /* Adjust spacing between color picker and label as needed */
    }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="padding edit-package">
        <div class="box">
            <div class="box-header dker">
                <?php
                $title_var = "title_" . @Helper::currentLanguage()->code;
                $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                ?>
                <h3><i class="material-icons">
                        &#xe02e;</i> <?php echo e(__('backend.topicEdit')); ?> Banner
                </h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                    <a href="<?php echo e(route('banner')); ?>"><?php echo e(__('backend.banner_management')); ?></a> / Edit Banner
                    <!-- <a>Banner</a> -->
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="<?php echo e(route('banner')); ?>">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="alert alert-danger alert-block validate email_validate" style="display:none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong id="email_msg"></strong>
            </div>

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success alert-block validate">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo e($message); ?></strong>
                    </div>
            <?php endif; ?>


            <?php if($message = Session::get('error')): ?>
                <div class="alert alert-danger alert-block validate">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo e($message); ?></strong>
                </div>
            <?php endif; ?>

            <!-- <div class="box-body">
                <?php echo e(Form::open(['route'=>['banner.update',$banner->id],'method'=>'POST', 'files' => true,'enctype' => 'multipart/form-data', 'id' => 'delivery_chargeForm' ])); ?>

                <input type="hidden"  id="user_id" value="<?php echo e($banner->id); ?>">
                <div class="personal_informations">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Title [EN]</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title [EN]" value="<?php echo e(isset($banner->title)?$banner->title:old('title')); ?>">
                           
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Title [FR]</label>
                        <div class="col-sm-10">
                            <input type="text" name="title_fr" id="title_fr" class="form-control" placeholder="Title [FR]" value="<?php echo e(isset($banner->title_fr)?$banner->title_fr:old('title_fr')); ?>">
                          
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-cms">Description [EN]</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description"  rows="5" autofocus ><?php echo e(isset($banner->description)?$banner->description:old('description')); ?></textarea>
                            
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-cms">Description [FR]</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description_fr" name="description_fr" rows="5" placeholder="Description [FR]"><?php echo e(isset($banner->description_fr)?$banner->description_fr:old('description_fr')); ?></textarea>
                          
                        </div>
                    </div> -->
                    <div class="box-body">
                        <?php echo e(Form::open(['route' => ['banner.update', $banner->id], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'id' => 'delivery_chargeForm'])); ?>

                        <input type="hidden" id="user_id" value="<?php echo e($banner->id); ?>">
                        
                        <div class="personal_informations">
                            <!-- <div class="form-group row">
                            <div class="col-sm-2">
                                <input type="color" id="textColorPicker" class="form-control" value="<?php echo e(isset($banner->text_color) ? $banner->text_color : '#000000'); ?>">
                                <input type="hidden" name="text_color" id="textColorInput" value="<?php echo e(isset($banner->text_color) ? $banner->text_color : '#000000'); ?>">
                            </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Title [EN]</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title [EN]" value="<?php echo e(isset($banner->title) ? $banner->title : old('title')); ?>">
                                    </div>
                                <div class="col-sm-2">
                                    <div class="text-color-picker-container">
                                    <label for="textColorPicker" class="form-control-label">Color:</label>
                                        <input type="color" id="textColorPicker" class="form-control" value="<?php echo e(isset($banner->text_color) ? $banner->text_color : '#000000'); ?>">
                                        <input type="hidden" name="text_color" id="textColorInput" value="<?php echo e(isset($banner->text_color) ? $banner->text_color : '#000000'); ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Title [FR]</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title_fr" id="title_fr" class="form-control" placeholder="Title [FR]" value="<?php echo e(isset($banner->title_fr) ? $banner->title_fr : old('title_fr')); ?>">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-cms">Description [EN]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="5"><?php echo e(isset($banner->description) ? $banner->description : old('description')); ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-cms">Description [FR]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description_fr" name="description_fr" rows="5" placeholder="Description [FR]"><?php echo e(isset($banner->description_fr) ? $banner->description_fr : old('description_fr')); ?></textarea>
                                </div>
                            </div>
                        </div>
                    <div class="form-group row">
                    <label class="col-sm-2 form-control-cms">Type<span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <select name="type" id="type" onchange="showHide()" class="form-control" value="">
                            <option value="">Select type</option>
                            <option <?php echo e((isset($banner->type) && $banner->type == 0) || old('type') == 0  ? 'selected' : ''); ?> value="0">Brand</option>
                            <option <?php echo e((isset($banner->type) && $banner->type == 1) || old('type') == 1  ? 'selected' : ''); ?> value="1">Category</option>
                            <option <?php echo e((isset($banner->type) && $banner->type == 2) || old('type') == 2  ? 'selected' : ''); ?> value="2">Product</option>
                            <option <?php echo e((isset($banner->type) && $banner->type == 3) || old('type') == 3  ? 'selected' : ''); ?> value="3">Custom URL</option>
                        </select>
                        <?php if($errors->has('type')): ?>
                        <span class="help-block">
                            <span style="color: red;" class='validate'><?php echo e($errors->first('type')); ?></span>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row brand">
                    <div class="col-sm-2 form-control-cms ">Brand<span class="valid_field">*</span></div>
                    <div class="col-sm-10">
                        <select name="brand_id" id="brand_id" class="form-control" value="">
                            <option value="">Select Brand</option>
                            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php echo e(($banner->brand_id == $value->id) ? 'selected' : ''); ?>>
                                <?php echo e(ucfirst($value->title)); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row category">
                        <div class="col-sm-2 form-control-cms "><?php echo e(__('backend.category')); ?><span class="valid_field">*</span></div>
                        <div class="col-sm-10">
                            <select name="category_id" id="category_id" class="form-control" value=""  onchange="getSubCatList(this)">
                                <option value="">Select category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(($banner->category_id == $value->id) ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($value->title)); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                </div>
                      <div class="form-group row subcategory">
                        <div class="col-sm-2 form-control-cms ">Subcategory</div>
                        <div class="col-sm-10">
                            <select name="subcategory_id" id="subcategory_id" class="form-control" value="">
                                <option value="">Select Subcategory</option>
                                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(($banner->subcategory_id == $value->id) ? 'selected' : ''); ?>><?php echo e(ucfirst($value->title)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                </div>
                <div class="form-group row product">
                        <div class="col-sm-2 form-control-cms ">Product<span class="valid_field">*</span></div>
                        <div class="col-sm-10">
                            <select name="product_id" id="product_id" class="form-control" value="">
                                <option value="">Select product</option>
                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(($banner->product_id == $value->id) ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($value->product_name)); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                </div>
                    <div class="form-group row url">
                        <label class="col-sm-2 form-control-cms">URL<span class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="banner_url" id="banner_url" class="form-control" placeholder="Title [FR]" value="<?php echo e(isset($banner->banner_url)?$banner->banner_url:old('banner_url')); ?>">
                            <?php if($errors->has('banner_url')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('banner_url')); ?></span>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>      
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-cms">Banner Type<span class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <select name="banner_type"  class="form-control" value="">
                                <option value="">Select banner type</option>
                                <option <?php if($banner->highlight!=1 && $banner->highlight!=1): ?> <?php echo e('selected'); ?> <?php endif; ?>  value="1">Main banner</option>
                                <option <?php if($banner->highlight==1): ?> <?php echo e('selected'); ?> <?php endif; ?> value="2">Highlight</option>
                                <option <?php if($banner->offer==1): ?> <?php echo e('selected'); ?> <?php endif; ?>  value="3">Offer</option>
                            </select>
                            <?php if($errors->has('banner_type')): ?>
                            <span class="help-block">
                                <span style="color: red;" class='validate'><?php echo e($errors->first('banner_type')); ?></span>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Image<span class="valid_field">*</span></label>
                        <div class="col-sm-10">
                            <input type="file" name="photo" id="bannerimage" class="form-control" style="margin-left: -10px;" accept="image/*">
                            <?php if($errors->has('photo')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('photo')); ?></span>
                            </span>
                            
                            <?php endif; ?>
                            <div>
                                <small>
                                    <i class="material-icons">&#xe8fd;</i>
                                    Choose image, .png, .jpg, .jpeg files only.
                                </small>
                                <br>
                                <small>
                                    <i class="material-icons">&#xe8fd;</i>
                                    Recommended size for main banner & offer 1440(Width) x 560(Height).
                                </small> 
                                <br>                              
                                <small>
                                    <i class="material-icons">&#xe8fd;</i>
                                    Recommended size for our highlights 628(Width) x 472(Height).
                                </small>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <?php if(isset($banner->photo) && $banner->photo != ""): ?>
                                    <img id="image" src="<?php echo ($banner->photo!="")? asset('uploads/banners/').'/'.$banner->photo:'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image' ?>"  width="100px" height="100px"/>&nbsp; &nbsp; &nbsp;
                                     
                            <?php else: ?>
                                <img src="<?php echo e(asset('uploads/contacts/noimage.png')); ?>"  width="100px" height="100px" >
                            <?php endif; ?>
                        </div> 
                    </div>   
                </div>
                
                <div class="form-group row m-t-md">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t" id="submitDetail"><i class="material-icons">&#xe31b;</i> Update</button>
                        <a href="<?php echo e(route('banner')); ?>" class="btn btn-default m-t">
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
 <script src="<?php echo e(asset('assets/css/sweetalert.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/select2.min.js')); ?>"></script>
    <script>
    $(document).ready(function() {
        showHide();
    });

    // mutliselect2();

    function showHide() {
        var type = $("#type").val();
        console.log(type);
        $('.url').hide();
        $('.category').hide();
        $('.product').hide();
        $('.brand').hide();
        $('.subcategory').hide();
        if (type != '' && type != null) {
            if (type == '1') {
                $('.url').hide();
                $('.category').show();
                $('.product').hide();
                $('.brand').hide();
                $('.subcategory').show();
            } else if(type == '2') {
                $('.url').hide();
                $('.category').hide();
                $('.product').show();
                $('.brand').hide();
                $('.subcategory').hide();
            }
            else if(type == '0') {
                $('.url').hide();
                $('.category').hide();
                $('.product').hide();
                $('.brand').show();
                $('.subcategory').hide();
            }
            else{
                $('.url').show();
                $('.category').hide();
                $('.product').hide();
                $('.brand').hide();
                $('.subcategory').hide();
            }
        }
    }
</script>
    <script type="text/javascript">
          $(document).on('click', '.removeImage', function() {
            swal({
                    title: "",
                    text: "Are you sure you want to remove this image.",
                    icon: "warning",
                     buttons: {
                        confirm: {
                          text: "OK",
                          value: true,
                          visible: true,
                          className: "",
                          closeModal: true
                        },
                        cancel: {
                          text: "Cancel",
                          value: false,
                          visible: true,
                          className: "",
                          closeModal: true,
                        }
                      }
                    
                    }).then(function(isConfirm) {
                    if (isConfirm) {

                        var csrf = "<?php echo e(csrf_token()); ?>";
                        var  user_id = $("#user_id").val();
                        $.ajax({

                                url: '<?php echo route('banner.image'); ?>',
                                type: 'POST',
                                data: {
                                    user_id:user_id,
                                },
                                headers: {'X-CSRF-TOKEN':  csrf }, 
                                dataType: 'JSON',
                                success: function (data) {
                                swal({
                                    title: "",
                                    text: "Image removed successfully.",
                                    icon: "success",
                                    buttons : 'OK',
                                    }).then(function(isConfirm) {
                                    location.reload();
                                    });
                                

                                }
                            });
                    }else {
                         return false;
                        }
                });
            });
        function mutliselect2()
        {
            $('#category').select2();
            
        }
        mutliselect2();
    </script>
<script type="text/javascript">
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
        bannerimage.onchange = evt => {
        const [file] = bannerimage.files
        fileName = document.querySelector('#bannerimage').value;
        extension = fileName.split('.').pop();
        document.querySelector('.output').textContent = extension;
        if (file) {
            image.src = URL.createObjectURL(file)
        }
        }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var colorPicker = document.getElementById('textColorPicker');
        var textColorInput = document.getElementById('textColorInput');
        var title = document.getElementById('title');
        var titleFr = document.getElementById('title_fr');
        var description = document.getElementById('description');
        var descriptionFr = document.getElementById('description_fr');

        // Update the text color when the color picker changes
        colorPicker.addEventListener('input', function() {
            var color = colorPicker.value;
            textColorInput.value = color;
            title.style.color = color;
            titleFr.style.color = color;
            description.style.color = color;
            descriptionFr.style.color = color;
        });

        // Set initial colors
        var initialColor = colorPicker.value;
        title.style.color = initialColor;
        titleFr.style.color = initialColor;
        description.style.color = initialColor;
        descriptionFr.style.color = initialColor;
    });
</script>


<script>
    function getSubCatList(thisitem) {
        var idCategory = $('#category_id').val();
        $('#subcategory_id').html('<option value="">Select Subcategory</option>');

        $.ajax({
            url: "<?php echo e(route('product.getsubcatlist')); ?>",
            type: "POST",
            data: {
                id: idCategory,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            dataType: 'json',
            success: function(result) {
                if (result.sub && result.sub.length > 0) {
                    $.each(result.sub, function(key, value) {
                        $("#subcategory_id").append(
                            '<option value="' + value.id + '">' + value.title + '</option>'
                        );
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }
</script> 

<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/banner/edit.blade.php ENDPATH**/ ?>