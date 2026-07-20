<?php $__env->startSection('title','Edit Profile'); ?>
<?php $__env->startSection('content'); ?>
    <div class="padding edit-package edit-user">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> Edit Profile </h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> / Edit Profile
                    <!-- <a href="javascript:void(0)">Edit Profile</a> -->
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
                <?php echo e(Form::open(['route'=>['usersUpdate',$Users->id],'method'=>'POST', 'files' => true])); ?>


                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label"><?php echo __('backend.fullName'); ?> <span class="valid_field">*</span>
                    </label>
                    <div class="col-sm-10">
                        <?php echo Form::text('name',$Users->name, array('placeholder' => '','class' => 'form-control','id'=>'name')); ?>

                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('name')); ?></span>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-sm-2 form-control-label"><?php echo __('backend.loginEmail'); ?> 
                           
                    </label>
                    <div class="col-sm-10">
                        <?php echo Form::email('email',$Users->email, array('placeholder' => '','class' => 'form-control','id'=>'email','readonly'=>'readonly')); ?>

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('email')); ?></span>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($Users->user_type!=1): ?>
                <div class="form-group row">
                    <label for="phone_number"
                           class="col-sm-2 form-control-label"><?php echo __('backend.phone'); ?> <span class="valid_field">*</span>
                    </label>
                    <div class="col-sm-10">
                        <?php echo Form::text('phone_number',$Users->phone, array('placeholder' => '','class' => 'form-control','id'=>'phone_number')); ?>

                        <?php if($errors->has('phone_number')): ?>
                            <span class="help-block">
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('phone_number')); ?></span>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                

                <div class="form-group row">
                    <label for="photo_file"
                           class="col-sm-2 form-control-label">Profile Photo<span class="valid_field">*</span></label>
                    <div class="col-sm-10">
                        <?php if($Users->photo!=""): ?>
                            <div class="row">
                                <div class="col-sm-12 images">
                                    <div id="user_photo" class="col-sm-4 box p-a-xs">
                                        <?php 
                                        if ($Users->user_type==1) { ?>
                                            <a target="_blank"
                                           href="<?php echo e(asset('uploads/users/'.$Users->photo)); ?>"><img
                                                src="<?php echo e(asset('uploads/users/'.$Users->photo)); ?>"
                                                class="img-responsive" style="width:100px !important ; height:100px !important;">
                                        </a>
                                        <?php }else{ ?>
                                            <a target="_blank"
                                           href="<?php echo e(asset('uploads/customer/'.$Users->photo)); ?>"><img
                                                src="<?php echo e(asset('uploads/customer/'.$Users->photo)); ?>"
                                                class="img-responsive" style="width:100px !important; height:100px !important;">
                                        </a>
                                       <?php }
                                        ?>
                                        <br>
                                        <div class="delete">
                                            <a onclick="document.getElementById('user_photo').style.display='none';document.getElementById('photo_delete').value='1';document.getElementById('undo').style.display='block';"
                                            class="btn btn-sm btn-default"><?php echo __('backend.delete'); ?></a>
                                            
                                        </div>
                                    </div>
                                    <div id="undo" class="col-sm-4 p-a-xs" style="display: none">
                                        <a onclick="document.getElementById('user_photo').style.display='block';document.getElementById('photo_delete').value='0';document.getElementById('undo').style.display='none';">
                                            <i class="material-icons">&#xe166;</i> <?php echo __('backend.undoDelete'); ?>

                                        </a>
                                    </div>

                                    <?php echo Form::hidden('photo_delete','0', array('id'=>'photo_delete')); ?>

                                </div>
                            </div>
                        <?php endif; ?>
            
                        
                        
                        <input type="file" name="profile_picture" class="form-control" accept="image/png, image/jpg, image/jpeg">
                        <?php if($errors->has('profile_picture')): ?>                            
                            <span class="help-block mt-2 mb-2">
                                
                                <span  style="color: red;" class='validate'><?php echo e($errors->first('profile_picture')); ?></span>  
                            </span>
                            <br>
                        <?php endif; ?>                    
                        <small>
                            <i class="material-icons">&#xe8fd;</i>
                            <?php echo __('backend.imagesTypes'); ?>

                        </small>
                    </div>
                </div>

                <div class="form-group row m-t-md">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> <?php echo __('backend.update'); ?></button>
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

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/users/edit.blade.php ENDPATH**/ ?>