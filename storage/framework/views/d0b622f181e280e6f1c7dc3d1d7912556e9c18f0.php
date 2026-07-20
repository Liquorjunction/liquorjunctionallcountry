<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startSection('content'); ?>
    <div class="padding edit-package">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i>Change Password</h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> / Change Password
                    <!-- <a href="javascript:void(0)">Change Password</a> -->
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="<?php echo e(route("users")); ?>">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                <?php echo Form::open(['route' => ['admin-update-password'], 'method' => 'POST','name' => 'edit_password', 'id' => 'edit_password', 'autocomplete' => 'off','class'=>'form-horizontal']); ?>

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-3 col-lg-3 form-control-label">Current Password <span class="valid_field">*</span>
                    </label>
                    <div class="col-sm-9  col-lg-9 form-control-label">
                      <input type="password" name="current_password" class="form-control" value="<?php echo e(old('current_password')); ?>">
                     
                      <?php if(Session::has('errorMessageCurrentPassword')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e(Session::get('errorMessageCurrentPassword')); ?></span>
                            </span>
                      <?php endif; ?>
                        <!-- <span class="error text-danger">
                            <?php if($errors->has('current_password')): ?>
                                <strong><?php echo e($errors->first('current_password')); ?></strong>
                            <?php endif; ?>
                        </span> -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-sm-3 col-lg-3 form-control-label">New Password <span class="valid_field">*</span>
                    </label>
                    <div class="col-sm-9 col-lg-9 form-control-label">
                         <input type="password" name="password" class="form-control" id="password" value="<?php echo e(old('password')); ?>">
                         <?php if(Session::has('errorMessageNewPassword')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e(Session::get('errorMessageNewPassword')); ?></span>
                            </span>
                         <?php endif; ?>
                           <!--  <span class="error text-danger">
                                <?php if($errors->has('password')): ?>
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                <?php endif; ?>
                            </span> -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-sm-3  col-lg-3 form-control-label">Confirm New Password <span class="valid_field">*</span>
                    </label>
                    <div class="col-sm-9 col-lg-9 form-control-label">
                        <input type="password" name="password_confirmation" class="form-control" value="<?php echo e(old('password_confirmation')); ?>">
                        <?php if(Session::has('errorMessageConformPassword')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e(Session::get('errorMessageConformPassword')); ?></span>
                            </span>
                        <?php endif; ?>
                       <!--  <span class="error text-danger">
                            <?php if($errors->has('password_confirmation')): ?>
                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                            <?php endif; ?>
                        </span> -->
                    </div>
                </div>

                <div class="form-group row m-t-md">
                    <div class="offset-sm-3 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i>Update</button>
                        <a href="<?php echo e(route('adminHome')); ?>"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> <?php echo __('backend.cancel'); ?></a>
                    </div>
                </div>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/users/change_password.blade.php ENDPATH**/ ?>