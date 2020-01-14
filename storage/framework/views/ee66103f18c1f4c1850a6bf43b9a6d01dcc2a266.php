<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="span9">
		
		<form class="form-horizontal" action="<?php echo e(url('konfirmasi/store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


	        <div class="control-group">
	            <label class="control-label" for="inputFname">Masukkan Kode Pesanan <sup>*</sup></label>
	            <div class="controls">
	              <input id="email" type="number" class="form-control" name="pesanan_id" value="<?php echo e(old('pesanan_id')); ?>" required autofocus>
	              <?php if($errors->has('pesanan_id')): ?>
	                    <span class="help-block">
	                        <strong><?php echo e($errors->first('pesanan_id')); ?></strong>
	                    </span>
	                <?php endif; ?>
	            </div>
	        </div>

	        <div class="control-group">
	            <label class="control-label" for="aditionalInfo">Masukkan Bukti Transfer</label>
	            <div class="controls">
	              <input id="password" type="file" class="form-control" name="photo" required>
	              <?php if($errors->has('photo')): ?>
	                    <span class="help-block">
	                        <strong><?php echo e($errors->first('photo')); ?></strong>
	                    </span>
	                <?php endif; ?>
	            </div>
	        </div>
	    
	    <div class="control-group">
	            <div class="controls">
	                <input type="hidden" name="email_create" value="1">
	                <input type="hidden" name="is_new_customer" value="1">
	                <input class="btn btn-large btn-success" type="submit" value="Submit">
	            </div>
	        </div>      
	    </form>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
	$(document).ready(function(){
		var flash = "<?php echo e(Session::has('pesan')); ?>";
		if(flash){
			var pesan = "<?php echo e(Session::get('pesan')); ?>";
			alert(pesan);
		}
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>