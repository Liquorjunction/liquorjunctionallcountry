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
    .table tbody>tr>td {word-wrap:break-word;}

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
            <h3><?php echo e(__('backend.view')); ?> Inquiry
                </h3>
            <small>
                <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> / 
                <a href="<?php echo e(route('inquiry')); ?>">Inquiry</a>
            </small>
        </div>
        
        <div class="box nav-active-border b-info">
            <div class="tab-content clear b-t">
                <div class="tab-pane active" id="tab_details">
                     <?php echo e(Form::open(['route'=>['inquiry'],'method'=>'POST', 'files' => true,'enctype' => 'multipart/form-data' ])); ?>

                    <div class="box-body">
                        <table class="table table-bordered m-a-0">
                            <tr>
                                <tbody>
                                    <th>Name </th>
                                    <td style="width: 75%"><?php echo e(isset($inquiry->name)?$inquiry->name:''); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Phone number </th>
                                    <?php
                                        $phone_code = \Helper::country($inquiry->phone_code);
                                    ?>
                                    <td>+<?php echo e($phone_code->phonecode?:''); ?> <?php echo e(isset($inquiry->phone)?$inquiry->phone:''); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Email </th>
                                    <td><?php echo e(isset($inquiry->email)?$inquiry->email:''); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Message Title </th>
                                    <td><?php echo e(isset($inquiry->message)?$inquiry->message:''); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Message Description</th>
                                    <td><?php echo e(isset($inquiry->message_description)?$inquiry->message_description:''); ?></td>
                                </tbody>
                            </tr>
                            <tr>
                                <tbody>
                                    <th>Reason</th>
                                    <td><?php echo e(isset($inquiry->inquiryReason->title)?$inquiry->inquiryReason->title:''); ?></td>
                                </tbody>
                            </tr>
                        </table>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="form-group row">
                <div class="col-sm-2">
                    <a href="<?php echo e(route('inquiry')); ?>" class="btn btn-default m-t" style="margin: 0 0 0 0px"><i class="material-icons"> &#xe5cd;</i> Cancel
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3ksZwnrjrnMtiZXZJ7cx9YEckAlt3vh4&libraries=places&callback=initialize" async defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".tab-content :input").prop("disabled", true);
    </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/inquiry/show.blade.php ENDPATH**/ ?>