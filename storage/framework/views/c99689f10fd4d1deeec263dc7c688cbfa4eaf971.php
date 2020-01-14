<?php $__env->startSection('content'); ?>

<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">Registration</li>
    </ul>
    <h3> Anda Harus Login Terlebih Dahulu</h3>  
    <div class="well">
    <!--
    <div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
     </div>
    <div class="alert fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
     </div>
     <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
     </div> -->
    <form class="form-horizontal" action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>


        <div class="control-group">
            <label class="control-label" for="inputFname">Email Address <sup>*</sup></label>
            <div class="controls">
              <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
              <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="aditionalInfo">Password</label>
            <div class="controls">
              <input id="password" type="password" class="form-control" name="password" required>
              <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    
    <div class="control-group">
            <div class="controls">
                <input type="hidden" name="email_create" value="1">
                <input type="hidden" name="is_new_customer" value="1">
                <input class="btn btn-large btn-success" type="submit" value="Login">
            </div>
        </div>      
    </form>
</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>