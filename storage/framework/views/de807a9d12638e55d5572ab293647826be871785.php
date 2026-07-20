
<?php $__env->startSection('title', 'Product | Admin Panel'); ?>
<?php $__env->startPush('after-styles'); ?>
    <style type="text/css">
        #blah {
            height: 50% !important;
            width: 25% !important;
        }

        #blah1 {
            height: 50% !important;
            width: 25% !important;
        }

        .product-single-variant {
            margin: 30px 0 10px 0;
            padding: 20px 0px 0 0;
        }

        .product-single-variant:not(:first-child) {
            border-top: 1px solid gray;
            /* border-bottom: 1px solid gray; */
        }

        .product-single-variant:last-child {
            /* border-top: 1px solid gray; */
            border-bottom: 1px solid gray;
        }
    </style>
    <link href="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

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
                        &#xe02e;</i> <?php echo e(__('backend.topicNew')); ?> <?php echo e(__('backend.product')); ?>

                </h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                    <a href="<?php echo e(route('product')); ?>"><?php echo e(__('backend.product_management')); ?></a> / New Product
                </small>
            </div>

            <div class="box-body">
                <!-- <form class="cmxform" id="productForm" method="post" action="" autocomplete="off"> -->
                <?php echo e(Form::open(['route' => ['product.store'], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'id' => 'cmsForm'])); ?>


                <div class="personal_informations">
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"><?php echo __('backend.product_name'); ?> [EN] <span
                                class="valid_field">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="product_name" id="product_name" class="form-control"
                                placeholder="Product Name" value="<?php echo e(old('product_name')); ?>">
                            <?php if($errors->has('product_name')): ?>
                                <span class="help-block">
                                    <span style="color: red;" class='validate'><?php echo e($errors->first('product_name')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"><?php echo __('backend.product_name'); ?> [FR] <span
                                class="valid_field">*</span></label>
                        
                        <div class="col-sm-9">
                            <input type="text" name="product_name_fr" id="product_name_fr" class="form-control"
                                placeholder="Product Name" value="<?php echo e(old('product_name_fr')); ?>">
                            <?php if($errors->has('product_name_fr')): ?>
                                <span class="help-block">
                                    <span style="color: red;"
                                        class='validate'><?php echo e($errors->first('product_name_fr')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 form-control-label"><?php echo __('backend.brand'); ?><span class="valid_field">*</span>
                        </div>
                        <div class="col-sm-9">
                            <select name="brand_id" id="brand_id" class="form-control" value="<?php echo e(old('brand_id')); ?>">
                                <option value="">Select Brand</option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"
                                        <?php echo e(old('brand_id') == $value->id ? 'selected' : ''); ?>>
                                        <?php echo e(ucfirst($value->title)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('brand_id')): ?>
                                <span class="help-block">
                                    <span style="color: red;" class='validate'><?php echo e($errors->first('brand_id')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 form-control-label"><?php echo e(__('backend.product_category')); ?> <span
                                class="valid_field">*</span></div>
                        <div class="col-sm-9">
                            <select name="category_id" id="category_id" class="form-control"
                                value="<?php echo e(old('category_id', @$product->category_id ?: '')); ?>">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"
                                        <?php echo e(old('category_id', @$product->category_id ?: '') == $value->id ? 'selected' : ''); ?>>
                                        <?php echo e(ucfirst($value->title)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('category_id')): ?>
                                <span class="help-block">
                                    <span style="color: red;" class='validate'><?php echo e($errors->first('category_id')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 form-control-cms">Subcategory <span class="valid_field">*</span></div>
                        <div class="col-sm-9">
                            <select name="subcategory_id" id="subcategory_id" onchange="getSubCatList(this)"
                                class="form-control" value="<?php echo e(old('subcategory_id')); ?>">
                                <option value="">Select Subcategory</option>
                            </select>
                            <?php if($errors->has('subcategory_id')): ?>
                                <span class="help-block">
                                    <span style="color: red;"
                                        class='validate'><?php echo e($errors->first('subcategory_id')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Images<span class="valid_field">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="property_images[]" id="property_images" class="form-control"
                                accept="image/*" placeholder="<?php echo e(__('backend.property_images')); ?>" multiple>
                            <span class="help-block" id="property_images_input_error">

                                <?php if(!empty(@$errors) && @$errors->has('property_images.*')): ?>
                                    <span style="color: red;"
                                        class='validate'><?php echo e(is_string($errors->first('property_images.*')) ? $errors->first('property_images.*') : @$errors->first('property_images.*')[0]); ?>

                                    </span>
                                <?php endif; ?>
                                <span style="color: red;" class='validate'><?php echo e($errors->first('property_images')); ?></span>
                            </span>
                            <div>
                                <small>
                                    <i class="material-icons">&#xe8fd;</i>
                                    Choose maximum of 5 images, .png, .jpg, .jpeg files only.
                                </small>
                                <br>
                                <small>
                                    <i class="material-icons">&#xe8fd;</i>
                                    Recommended size 480(Width) x 520(Height).
                                </small>
                                <br>
                                <small>
                                    <i class="material-icons">&#xe8fd;</i>
                                    You can select multiple images by pressing CTRL + Select Image.
                                </small>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="mt-1 text-center uploaded_images" style="display: none">
                                <h3>New Uploaded Images</h3>
                                <div class="images-preview-div">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Product Video (optional)</label>
                        <div class="col-sm-9">
                            <span class="video-tag">

                            </span>
                            <input type="file" name="video" id="video" class="form-control"
                                accept="video/mp4">
                            <small>
                                <i class="material-icons">&#xe8fd;</i>
                                Up to 20 Mb - MP4 format only
                            </small>
                            <br>
                            <?php if($errors->has('video')): ?>
                                <span class="help-block">
                                    <span style="color: red;" class='validate'><?php echo e($errors->first('video')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="product-multi-variant-class">

                        <?php
                            $product_variants = old('prod_variant');

                            if (!$product_variants) {
                                $product_variants = [
                                    [
                                        'variant_uof' => '',
                                        'variant_size' => '',
                                        'variant_price' => '',
                                        'variant_qty' => '',
                                        // 'variant_discounted_price' => '',
                                    ],
                                ];
                            }
                            @$k = 0;
                        ?>

                        <?php $__currentLoopData = $product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variantArr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-single-variant">
                                <?php if($k == 0): ?>
                                    <p style="font-size:11px; margin-bottom:4px;">This will show default unit & price for
                                        product list & detail page</p>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label" style="display: flex;">Product Attributes
                                        <span class="valid_field">*</span></label>
                                    <div class="col-sm-3">
                                        <select name="prod_variant[<?php echo e($key); ?>][variant_uof]"
                                            class="form-control" id="uof_<?php echo e($key); ?>">
                                            <option value="">Select Unit</option>
                                            <?php $__currentLoopData = $uofs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                                <option value="<?php echo e($item->id); ?>" <?php if($item->id == @$variantArr['variant_uof']): echo 'selected'; endif; ?>>
                                                    <?php echo e($item->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('prod_variant.' . $key . '.variant_uof')): ?>
                                            <span class="help-block">
                                                <span style="color: red;"
                                                    class='validate'><?php echo e($errors->first('prod_variant.' . $key . '.variant_uof')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-<?php echo e($key == 0 ? 6 : 4); ?>">
                                        <input type="text" name="prod_variant[<?php echo e($key); ?>][variant_size]"
                                            maxlength="5" onkeypress="return isNumberBlock(event)" class="form-control"
                                            placeholder="Size eg:200" value="<?php echo e(@$variantArr['variant_size']); ?>">
                                        <?php if($errors->has('prod_variant.' . $key . '.variant_size')): ?>
                                            <span class="help-block">
                                                <span style="color: red;"
                                                    class='validate'><?php echo e($errors->first('prod_variant.' . $key . '.variant_size')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($key > 0): ?>
                                        <div class="col-sm-2 text-right">
                                            <button type="button" onclick="remove_current_variant(this)"
                                                class="btn btn-danger">Remove</button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label" style="display: flex;">Original Price
                                        (<?php echo e(@$settings->currency_symbol); ?>) <span class="valid_field">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prod_variant[<?php echo e($key); ?>][variant_price]"
                                            maxlength="7" onkeypress="return isNumberBlock(event)" class="form-control"
                                            placeholder="Original Price" value="<?php echo e(@$variantArr['variant_price']); ?>">
                                        <?php if($errors->has('prod_variant.' . $key . '.variant_price')): ?>
                                            <span class="help-block">
                                                <span style="color: red;"
                                                    class='validate'><?php echo e($errors->first('prod_variant.' . $key . '.variant_price')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label" style="display: flex;">Qty <span
                                            class="valid_field">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prod_variant[<?php echo e($key); ?>][variant_qty]"
                                            maxlength="5" onkeypress="return isNumberBlock(event)" class="form-control"
                                            placeholder="Qty" value="<?php echo e(@$variantArr['variant_qty']); ?>">
                                        <?php if($errors->has('prod_variant.' . $key . '.variant_qty')): ?>
                                            <span class="help-block">
                                                <span style="color: red;"
                                                    class='validate'><?php echo e($errors->first('prod_variant.' . $key . '.variant_qty')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                            </div>
                            <?php $k++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="addMoreVariantsBtn btn btn-info"
                                data-target_multiplication=".product-multi-variant-class"
                                onclick="return add_more_variant();">+ Add more variant</button>
                        </div>
                    </div>

                    






                    


                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label" style="display: flex;">Short <?php echo __('backend.description'); ?>

                            [EN]
                            <span class="valid_field">*</span></label>
                        <div class="col-sm-9">
                            <!-- <input type="text" name="description" id="description" class="form-control" placeholder="Category Description" value="<?php echo e(old('description')); ?>"> -->
                            <textarea class="form-control" id="short_description" name="short_description" placeholder="Short Description"><?php echo e(old('short_description')); ?></textarea>
                            <?php if($errors->has('short_description')): ?>
                                <span class="help-block">
                                    <span style="color: red;"
                                        class='validate'><?php echo e($errors->first('short_description')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label" style="display: flex;">Short <?php echo __('backend.description'); ?>

                            [FR]<span class="valid_field">*</span>
                        </label>
                        <div class="col-sm-9">
                            <!-- <input type="text" name="description" id="description" class="form-control" placeholder="Category Description" value="<?php echo e(old('description')); ?>"> -->
                            <textarea class="form-control" id="short_description_fr" name="short_description_fr"
                                placeholder="Short Description"><?php echo e(old('short_description_fr')); ?></textarea>
                            <?php if($errors->has('short_description_fr')): ?>
                                <span class="help-block">
                                    <span style="color: red;"
                                        class='validate'><?php echo e($errors->first('short_description_fr')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-3 form-control-cms">Long Description <span class="valid_field">*</span> </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="page_content" name="page_content"><?php echo e(old('page_content')); ?></textarea>
                            <?php if($errors->has('page_content')): ?>
                                <span class="help-block">
                                    <span style="color: red;"
                                        class='validate'><?php echo e($errors->first('page_content')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 form-control-cms">Long Description [FR]<span class="valid_field">*</span>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="page_content_fr" name="page_content_fr"><?php echo e(old('page_content_fr')); ?></textarea>
                            <?php if($errors->has('page_content_fr')): ?>
                                <span class="help-block">
                                    <span style="color: red;"
                                        class='validate'><?php echo e($errors->first('page_content_fr')); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Add product as Bestseller </label>
                        <div class="col-sm-9">
                            <input type="checkbox" style = "cursor:pointer;" id="ans_yes" name="is_product_bestseller"
                                value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Is offer ? </label>
                        <div class="col-sm-9">
                            <input type="checkbox" style = "cursor:pointer;" id="offer" name="offer"
                                value="1" <?php if(old('offer') == 1 ? true : false): echo 'checked'; endif; ?>>
                        </div>
                    </div>


                </div>

                <div class="form-group row m-t-md">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t" id="submitDetail"><i
                                class="material-icons">&#xe31b;</i> <?php echo __('backend.add'); ?></button>
                        <a href="<?php echo e(route('product')); ?>" class="btn btn-default m-t">
                            <i class="material-icons">
                                &#xe5cd;</i> <?php echo __('backend.cancel'); ?>

                        </a>
                    </div>
                </div>

                </form>
                <!-- <?php echo e(Form::close()); ?> -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-scripts'); ?>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/iconpicker/fontawesome-iconpicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/summernote/dist/summernote.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        // document.querySelectorAll('.variant-size-input').forEach(input => {
        //     input.addEventListener('change', function() {
        //         this.value = Math.ceil(parseFloat(this.value));
        //     });
        // });

        function getFileUploadLimit() {
            var fileUploadLimit = 5;
            var remainUploads = 5;
            return remainUploads;
        }

        function getSubCatList(thisitem) {

            var idCountry = $('#category_id').val();
            var cat_id = $('#cate_id').val();
            console.log(cat_id);
            //alert(category_id);
            $('#sub_category_id').html('');
            $('#sub_category_id').html('<option value="">Select Subcategory</option>');
            $.ajax({
                url: "<?php echo e(route('product.getsubcatlist')); ?>",
                type: "POST",
                data: {
                    id: idCountry,
                    cat_id: cat_id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    $('#sub_category_id').html('<option value="">Select Category</option>');
                    $.each(result.sub, function(key, value) {
                        var selected = '';
                        selected = value.category_id == idCountry ? "selected" : "";
                        $("#sub_category_id").append('<option ' + selected + ' value="' + value.id +
                            '">' +
                            value.title + '</option>');
                    });
                }
            });
        }
        $(function() {
            // Multiple images preview with JavaScript                
            var previewImages = function(input, imgPreviewPlaceholder) {
                var imageUploadLimit = getFileUploadLimit();
                if (input.files) {
                    console.log(input.files);
                    var filesAmount = input.files.length;
                    $(imgPreviewPlaceholder).html("");
                    if (filesAmount == 0) {
                        $(".uploaded_images").hide();
                    } else if (filesAmount > imageUploadLimit) {
                        $('#property_images').val("");
                        var messageToShow;
                        if (imageUploadLimit > 0) {
                            messageToShow = 'You can upload only ' + imageUploadLimit + ' images.'
                        } else {
                            messageToShow = "You can not upload images now."
                        }
                        $(".uploaded_images").hide();
                        $("#property_images_input_error").html(
                            `<span style="color: red;" class='validate'>Product max image exceeded, ${messageToShow} </span>`
                        );
                    } else {
                        $("#property_images_input_error").html("");
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                $($.parseHTML('<img>')).attr('src', event.target.result).css({
                                    'width': '100px',
                                    'height': '100px',
                                    'margin': '10px',
                                }).appendTo(imgPreviewPlaceholder);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                        $(".uploaded_images").show();
                    }
                }
            };
            $('#property_images').on('change', function() {
                var selection = document.getElementById('property_images');
                for (var i = 0; i < selection.files.length; i++) {
                    var ext = selection.files[i].name.substr(-3);
                    var fileSize = selection.files[i].size;
                    const fileMb = fileSize / 1024 ** 2;
                    if (ext !== "png" && ext !== "jpg" && ext !== "jpeg") {
                        $("#property_images_input_error").html(
                            '<span style="color: red;">The files must be a file of type: jpg, jpeg, png.<span>'
                            );
                        return false;
                    }
                    if (fileMb >= 2) {
                        $("#property_images_input_error").html(
                            '<span style="color: red;">Please select files less than 2MB.<span>');
                        return false;
                    }
                }
                previewImages(this, 'div.images-preview-div');
            });
        });
        if (getFileUploadLimit() <= 0) {
            let messageToShow = "You can not upload images now.";
            $("#property_images_input_error").html(
                `<span style="color: red;" class='validate'><?php echo e(__('backend.propertyMaxImageLimitExceded')); ?> ${messageToShow} </span>`
            );
            $('#property_images').attr('disabled', true);
        }


        function isNumberKey(evt) {
            //var e = evt || window.event;
            var keyCode = (evt.which) ? evt.which : evt.keyCode;
            if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

                return false;
            return true;

        }

        function isNumberBlock(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            // alert($(this).val())
            // evt.which.val().length
            if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
                // alert()
                return false;
            return true;
        }
        // property_images.onchange = evt => {
        //     const [file] = property_images.files
        //     fileName = document.querySelector('#property_images').value;
        //     extension = fileName.split('.').pop();
        //     document.querySelector('.output').textContent = extension;
        //     if (file) {
        //         blah.src = URL.createObjectURL(file)
        //     }
        // }
    </script>

    <script>
        $(function() {
            $('.icp-auto').iconpicker({
                placement: '<?php echo e(@Helper::currentLanguage()->direction == 'rtl ' ? 'topLeft ' : 'topRight '); ?>'
            });
        });

        function sendFile(file, editor, welEditable, lang) {
            data = new FormData();
            data.append("file", file);
            data.append("_token", "<?php echo e(csrf_token()); ?>");

        }

        // update progress bar
        function progressHandlingFunction(e) {
            if (e.lengthComputable) {
                $('progress').attr({
                    value: e.loaded,
                    max: e.total
                });
                // reset progress on complete
                if (e.loaded == e.total) {
                    $('progress').attr('value', '0.0');
                }
            }
        }
    </script>
    
    <script>
        // CKEDITOR.on('instanceReady', function(ev) {
        //     document.getElementById('eMessage').innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';

        //     document.getElementById('eButtons').style.display = 'block';
        // });

        function InsertHTML() {
            var editor = CKEDITOR.instances.editor1;
            var value = document.getElementById('htmlArea').value;

            if (editor.mode == 'wysiwyg') {
                editor.insertHtml(value);
            } else
                alert('You must be in WYSIWYG mode!');
        }

        function InsertText() {
            var editor = CKEDITOR.instances.editor1;
            var value = document.getElementById('txtArea').value;

            if (editor.mode == 'wysiwyg') {
                editor.insertText(value);
            } else
                alert('You must be in WYSIWYG mode!');
        }

        function SetContents() {
            var editor = CKEDITOR.instances.editor1;
            var value = document.getElementById('htmlArea').value;

            editor.setData(value);
        }

        function GetContents() {
            var editor = CKEDITOR.instances.editor1;
            alert(editor.getData());
        }

        function ExecuteCommand(commandName) {
            var editor = CKEDITOR.instances.editor1;

            if (editor.mode == 'wysiwyg') {
                editor.execCommand(commandName);
            } else
                alert('You must be in WYSIWYG mode!');
        }

        function CheckDirty() {
            var editor = CKEDITOR.instances.editor1;
            alert(editor.checkDirty());
        }

        function ResetDirty() {
            var editor = CKEDITOR.instances.editor1;
            editor.resetDirty();
            alert('The "IsDirty" status has been reset');
        }

        function Focus() {
            CKEDITOR.instances.editor1.focus();
        }

        function onFocus() {
            document.getElementById('eMessage').innerHTML = '<b>' + this.name + ' is focused </b>';
        }

        function onBlur() {
            document.getElementById('eMessage').innerHTML = this.name + ' lost focus';
        }

        CKEDITOR.replace('page_content', {
            on: {
                // focus: onFocus,
                // blur: onBlur,
                pluginsLoaded: function(evt) {
                    var doc = CKEDITOR.document,
                        ed = evt.editor;
                    if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                    if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                }
            }
        });

        CKEDITOR.replace('page_content_fr', {
            on: {
                // focus: onFocus,
                // blur: onBlur,
                pluginsLoaded: function(evt) {
                    var doc = CKEDITOR.document,
                        ed = evt.editor;
                    if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                    if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                }
            }
        });

        const empty_product_subcategory = () => $('#subcategory_id option:not(:first-child)').remove();
        var product_category = "<?php echo e(old('category_id')); ?>";
        var product_subcategory = "<?php echo e(old('subcategory_id')); ?>";

        function getSubCategory() {
            var category_ele = $('#category_id');
            var subcategory_ele = $("#subcategory_id");
            var category_val = category_ele.val();
            if (!category_ele) {
                category_val = product_category;
            }
            empty_product_subcategory();
            if (category_val) {
                var __url = "<?php echo e(route('getsubcategories', ['id' => ':id'])); ?>".replace(':id', category_val);
                $.ajax({
                    url: __url,
                    type: 'post',
                    dataType: 'json',
                    success: function(data) {
                        var subcats = data.data;
                        if (data.code == 200) {
                            subcats.map((ele, index) => {
                                var is_selected = product_subcategory ? 'selected="selected"' : "";
                                subcategory_ele.append(
                                    `<option value="${ele.id}" ${is_selected}>${ele.title}</option>`
                                    );
                            });
                        } else {
                            alert('Something went wrong.');
                        }
                    }
                })
            }
        }

        (function() {
            getSubCategory();
            $("#category_id").on('change', function(e) {
                getSubCategory();
            });
        })();
    </script>
    <script type="text/javascript">
        CKEDITOR.config.height = '400px';
    </script>

    <script>
        var variant_count = <?php echo e(count(old('prod_variant') ?: []) ?: 1); ?>;

        function add_more_variant() {
            let get_variant_url = "<?php echo e(route('product.add_more_variant')); ?>";
            $.ajax({
                url: get_variant_url,
                type: 'post',
                data: {
                    count: variant_count
                },
                success: function(result) {
                    if (result.success == true) {
                        $(".product-multi-variant-class").append(result.html);
                        variant_count++;
                    }
                }
            });
        }

        function remove_current_variant(ele) {
            let element = $(ele);
            let singleVariantBlock = element.parents('.product-single-variant');
            if (singleVariantBlock.hasClass('newadded')) {
                singleVariantBlock.remove();
            } else {
                if (confirm('Are you sure you want to delete this?')) {
                    remove_variant(singleVariantBlock);
                }
            }
        }

        function remove_variant(singleVariant) {
            let variant_id = singleVariant.data('id');
            let product_id = singleVariant.data('product_id');

            $.ajax({
                url: '<?php echo e(route('product.variant.remove')); ?>',
                type: 'post',
                data: {
                    variant_id: variant_id,
                    product_id: product_id
                },
                success: function(result) {
                    singleVariant.remove();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/product/create.blade.php ENDPATH**/ ?>