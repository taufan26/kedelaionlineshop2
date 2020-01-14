<?php $__env->startSection('content'); ?>

<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?php echo e(url('kategori/store')); ?>" method="POST">
      <?php echo e(csrf_field()); ?>

      <div class="box-body">
        
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Kategori</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo e(old('nama')); ?>">
        </div>

      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <span class="submitLoading" style="display: none;"><img src="<?php echo e(asset('loading.gif')); ?>"></span>
      </div>
    </form>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("button[type='submit']").click(function(){
			$('.submitLoading').show();
		});
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>