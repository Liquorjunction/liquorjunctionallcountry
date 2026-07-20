<?php $__env->startSection('title', __('backend.customer')); ?>
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
            <h3><?php echo e(__('backend.view')); ?> <?php echo e(__('backend.customer')); ?> </h3>
            <small>
                <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> / <a href="<?php echo e(route('customer')); ?>"><?php echo e(__('backend.customer_managment')); ?></a> / <span><?php echo e(__('backend.view')); ?> <?php echo e(__('backend.customer')); ?></span>
            </small>
        </div>
        <!-- <div class="box-tool">
            <ul class="nav">
                <li class="nav-item inline">
                    <a class="nav-link" href="<?php echo e(route('customer')); ?>">
                        <i class="material-icons md-18">×</i>
                    </a>
                </li>
            </ul>
        </div> -->

        <div class="box nav-active-border b-info">

            <div class="tab-content clear b-t">
                <div class="tab-pane active" id="tab_details">
                     <?php echo e(Form::open()); ?>

                    <div class="box-body">
                            <table class="table table-bordered m-a-0">                                
                                <tr>
                                    <tbody>
                                        <th><?php echo __('backend.customer_name'); ?></th>
                                        <td style="width: 75%;"><?php echo e(@Str::ucfirst($customerData->first_name)); ?> <?php echo e(@$customerData->last_name); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th><?php echo __('backend.customer_email'); ?></th>
                                        <td><?php echo e(@$customerData->email); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th><?php echo __('backend.customer_phone'); ?></th>
                                        <td>
                                            <?php if($customerData->phonecode): ?>
                                                +<?php echo e($customerData->phonecode); ?> <?php echo e($customerData->phone); ?>

                                            <?php else: ?>
                                                <?php echo e($customerData->phone); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th><?php echo __('backend.customer_join_date'); ?></th>
                                        <?php
                                        $date = \Helper::converttimeTozone($customerData->created_at);
                                        ?>
                                        <td><?php echo e(@$date ? Carbon\Carbon::parse($date)->format(env('DATE_FORMAT', 'Y-m-d') . ' h:i A') : "-"); ?></td>
                                    </tbody>
                                </tr>
                                <!-- <tr>
                                    <tbody>
                                        <th><?php echo __('backend.Profile'); ?></th>
                                        <td><?php if(!empty($customerData->profile)): ?> 
                                            <a href="<?php echo e(asset('uploads/customer/' . $customerData->profile)); ?>" target="_blank">
                                                    <img width="100px" width="100px" src="<?php echo e(asset('uploads/customer/'.$customerData->profile)); ?>"  />
                                             </a>
                                            <?php else: ?>
                                            <img width="100px" width="100px" src="<?php echo e(asset('uploads/contacts/profile.jpg')); ?>"/>
                                            <?php endif; ?>
                                        </td>
                                    </tbody>
                                </tr> -->
                                <!-- <tr>
                                    <tbody>
                                        <th><?php echo __('backend.zip_code'); ?></th>
                                       <td><?php echo e(@$customerData->post_code); ?></td>
                                    </tbody>
                                </tr> -->
                                <!-- <tr>
                                    <tbody>
                                        <th><?php echo __('backend.city'); ?></th>
                                        <td><?php echo e(@$customerData->city); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th><?php echo __('backend.state'); ?></th>
                                        <td><?php echo e(@$customerData->states); ?></td>
                                    </tbody>
                                </tr>
                                <tr>
                                    <tbody>
                                        <th><?php echo __('backend.country'); ?></th>
                                        <td><?php echo e(@$customerData->country); ?></td>
                                    </tbody>
                                </tr> -->
                                
                            </table>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="form-group row">
                            <div class="col-sm-2">
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default m-t" style="margin: 0 0 0 0px">
                                    <i class="material-icons">
                                        &#xe5cd;</i> <?php echo __('backend.cancel'); ?>

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
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/customer/show.blade.php ENDPATH**/ ?>