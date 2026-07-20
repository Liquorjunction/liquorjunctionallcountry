
<?php $__env->startSection('title', 'Banner'); ?>
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
                <h3><?php echo e(__('backend.view')); ?> Banner
                </h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> / <a
                        href="<?php echo e(route('banner')); ?>"><?php echo e(__('backend.banner_management')); ?></a> / View Banner
                    <!-- <a>Banner</a> -->
                </small>
            </div>

            <?php
            // dd($banner->type);
            if ($banner->type == 1) {
                $type = 'Category';
            } elseif ($banner->type == 2) {
                $type = 'Product';
            } 
            elseif ($banner->type == 0) {
                $type = 'Brand';
            }
            else {
                $type = 'Custom URL';
            }
            ?>
            <div class="box nav-active-border b-info">

                <div class="tab-content clear b-t">
                    <div class="tab-pane active" id="tab_details">
                        <?php echo e(Form::open(['route' => ['banner'], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data'])); ?>

                        <div class="box-body">
                            <table class="table table-bordered m-a-0">
                                <tr>
                                    <tbody>
                                        <th>Title [EN]</th>
                                        <td style="width: 75%"><?php echo e(isset($banner->title) ? $banner->title : ''); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th>Title [FR]</th>
                                        <td><?php echo e(isset($banner->title_fr) ? $banner->title_fr : ''); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th>Description [EN]</th>
                                        <td><?php echo e($banner->description); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th>Description [FR]</th>
                                        <td><?php echo e($banner->description_fr); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th>Type</th>
                                        <td><?php echo e($type); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th>Banner Type</th>
                                        <td>
                                            <?php
                                                if($banner->offer == 1){
                                                    echo 'Offer';
                                                }elseif($banner->highlight == 1){
                                                    echo "Highlight";
                                                }else{
                                                    echo "Main banner";
                                                }

                                            ?>
                                        </td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th>Image</th>
                                        <td>
                                            <?php if(isset($banner->photo) && $banner->photo != ''): ?>
                                                <a href="<?php echo e(asset('uploads/banners/' . $banner->photo)); ?>" target="_blank">

                                                    <img id="image"
                                                        src="<?php echo e(asset('uploads/banners/') . '/' . $banner->photo); ?>"
                                                        class="thumbnail" width="100px" height="100px" />
                                                </a>
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('uploads/contacts/noimage.png')); ?>" width="100px"
                                                    height="100px">
                                            <?php endif; ?>
                                        </td>
                                    </tbody>
                                </tr>
                                
                            </table>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                            <a href="<?php echo e(route('banner')); ?>" class="btn btn-default m-t" style="margin: 0 0 0 0px">
                                <i class="material-icons">
                                    &#xe5cd;</i> Cancel
                            </a>
                        </div>
                        <div class="col-sm-10"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('after-scripts'); ?>
        <script src="<?php echo e(asset('assets/dashboard/js/jquery.validate.min.js')); ?> "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $(".tab-content :input").prop("disabled", true);
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/banner/show.blade.php ENDPATH**/ ?>