
<?php $__env->startSection('title', 'product'); ?>
<?php $__env->startSection('content'); ?>

<link href="<?php echo e(asset('assets/dashboard/css/select2.min.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css" />
<style type="text/css">
    .select2-container {
        width: 100% !important;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #ffffff;
        opacity: 1;
    }

    .table tbody>tr>td,
    .table thead>tr>th {

        border-left: 1px solid #dfdfdf !important;
        word-wrap: break-word;

    }

    .table tbody>tr>td {
        word-wrap: break-word;
    }

    .table_design {
        padding: 0 !important;
    }

    .table_design th {
        width: 200px !important;
    }
</style>

<div class="padding list-school">
    <div class="box">
        <div class="box-header dker">
            <h3><?php echo e(__('backend.view')); ?> Product
            </h3>
            <small>
                <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                <a href="<?php echo e(route('product')); ?>"><?php echo e(__('backend.product_management')); ?></a> / View Product
            </small>
        </div>
        
        <div class="box nav-active-border b-info">

            <div class="tab-content clear b-t">
                <div class="tab-pane active" id="tab_details">
                    <?php echo e(Form::open(['route'=>['product'],'method'=>'POST', 'files' => true,'enctype' => 'multipart/form-data' ])); ?>

                    <div class="box-body">


                        <table class="table table-bordered m-a-0" style="table-layout: fixed;">

                            <tr>
                                <tbody>
                                    <th><?php echo __('backend.product_name'); ?> [EN]</th>
                                    <td> <?php echo e(@$productData->product_name?:"-"); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th><?php echo __('backend.product_name'); ?> [FR]</th>
                                    <td><?php echo e(@$productData->product_name_fr?:"-"); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Brand</th>
                                    <td><?php echo e(@$productData->get_brand_details->title?:"-"); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th><?php echo __('backend.product_category'); ?></th>
                                    <td><?php echo e(@$productData->get_category->title?:"-"); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th><?php echo __('backend.product_subcategory'); ?></th>
                                    <td><?php echo e(@$productData->get_subcategory->title?:"-"); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <th>Product Variants</th>
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        
                                    </tr>
                                    <?php $__currentLoopData = @$productData->get_product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td style="word-wrap:break-word;">
                                            <?php echo e(@$variant->variant_size); ?> <?php echo e(@$variant->get_uof_data->title); ?>

                                        </td>
                                        <td> <?php echo e(@$variant->variant_price); ?> <?php echo e(@$settings->currency_symbol); ?></td>
                                        <td><?php echo e(@$variant->variant_qty); ?></td>
                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </tr>
                            <tr>
                        </table>
                        <div class="form-group row">
                            <table class="table table-bordered m-a-0" style="table-layout: fixed;">
                                <tbody>
                                    <tr>
                                        <th>
                                            <label for="photo_file" class="col-sm-3 form-control-label"><?php echo __('backend.product_image'); ?></label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-sm-9">
                                                <?php if($productData->get_product_images[0]->image): ?>
                                                <div class="row">
                                                    <div class="col-sm-12 images">
                                                        <div id="user_photo" class="col-sm-12 box p-a-xs">
                                                            <?php foreach ($productData->get_product_images as $singleImage) { ?>

                                                                <a href="<?php echo e(asset('uploads/product/' . $singleImage->image)); ?>" target="_blank">
                                                                    <img src="<?php echo e(asset('uploads/product/' . $singleImage->image)); ?>" alt="Product Image" height="100" width="100" style="padding-top:3px;">
                                                                </a>&nbsp;
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php else: ?>
                                                <div>-</div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <table>
                        </div>
                        <table class="table table-bordered m-a-0" style="table-layout: fixed;">
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Video</th>
                                    <td>


                                        <?php if(@$productData->video): ?>
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo e(asset('uploads/product/') . '/' . $productData->video); ?>" type="video/mp4" style="height: 200px; width: inherit;">
                                        </video>
                                        <?php else: ?>
                                        <div>
                                            <img src="<?php echo e(asset('assets/dashboard/images/default_video.png')); ?>" alt="Product Image" height="100" width="100">
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tbody>
                            </tr>

                            <tr>
                                <tbody>
                                    <th>Is Product Bestseller?</th>
                                    <td><?php echo e((@$productData->is_product_bestseller==1)?"Yes":"No"); ?></td>
                                </tbody>
                            </tr>

                            <tr>
                                <tbody>
                                    <th>Is Offer?</th>
                                    <td><?php echo e((@$productData->offer==1)?"Yes":"No"); ?></td>
                                </tbody>
                            </tr>

                            <tr>
                                <tbody>
                                    <th>Short Description [EN]</th>
                                    <td colspan="4"><?php echo e(@$productData->short_description?:"-"); ?></td>
                                </tbody>
                            </tr>


                            <tr>
                                <tbody>
                                    <th>Short Description [FR]</th>
                                    <td colspan="4"><?php echo e(@$productData->short_description_fr?:"-"); ?></td>
                                </tbody>
                            </tr>

                            <tr>
                                <tbody>
                                    <th>Long Description [EN]</th>
                                    <td colspan="4"><?php echo @$productData->description?:"-"; ?></td>
                                </tbody>
                            </tr>

                            <tr>
                                <tbody>
                                    <th>Long Description [FR]</th>
                                    <td colspan="4"><?php echo @$productData->page_content_fr?:"-"; ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Created Date</th>
                                    <td colspan="4"><?php echo @$productData->created_at ? Carbon\Carbon::parse($productData->created_at)->format(env('DATE_FORMAT', 'Y-m-d')) : "-"; ?> </td>
                                </tbody>
                            </tr>


                        </table>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <a href="<?php echo e(route('product')); ?>" class="btn btn-default m-t" style="margin: 0 0 0 0px">
                            <i class="material-icons">
                                &#xe5cd;</i> Cancel
                        </a>
                    </div>
                    <div class="col-sm-10">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush("after-scripts"); ?>

    <script src="<?php echo e(asset('assets/dashboard/js/jquery.validate.min.js')); ?> "></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3ksZwnrjrnMtiZXZJ7cx9YEckAlt3vh4&libraries=places&callback=initialize"
async defer></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3ksZwnrjrnMtiZXZJ7cx9YEckAlt3vh4&libraries=places&callback=initialize" async defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".tab-content :input").prop("disabled", true);
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/product/show.blade.php ENDPATH**/ ?>