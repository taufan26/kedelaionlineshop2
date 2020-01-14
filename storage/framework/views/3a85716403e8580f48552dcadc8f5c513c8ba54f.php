<?php $__env->startSection('content'); ?>

<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="<?php echo e(url('barang/update/'.$barang->barang_id)); ?>" enctype="multipart/form-data">
    	<?php echo e(csrf_field()); ?>

      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo e($barang->nama); ?>">
          <?php if($errors->has('nama')): ?>
                        <span class="help-block">
                            <strong style="color: red;"><?php echo e($errors->first('nama')); ?></strong>
                        </span>
                    <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Keterangan</label>
          <textarea name="keterangan" class="form-control" id="editor1" rows="10"><?php echo e($barang->keterangan); ?></textarea>
          <?php if($errors->has('keterangan')): ?>
                        <span class="help-block">
                            <strong style="color: red;"><?php echo e($errors->first('keterangan')); ?></strong>
                        </span>
                    <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Kategori</label>
          <select class="form-control select2" name="kategori_id">
          	<?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          	<option value="<?php echo e($kategori->kategori_id); ?>" <?php echo e(($barang->kategori_id == $kategori->kategori_id) ? 'selected' : ''); ?>><?php echo e($kategori->nama); ?></option>
          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <?php if($errors->has('kategori_id')): ?>
                        <span class="help-block">
                            <strong style="color: red;"><?php echo e($errors->first('kategori_id')); ?></strong>
                        </span>
                    <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Harga Barang</label>
          <input type="text" name="harga" class="form-control" value="<?php echo e($barang->harga); ?>">
          <?php if($errors->has('harga')): ?>
                        <span class="help-block">
                            <strong style="color: red;"><?php echo e($errors->first('harga')); ?></strong>
                        </span>
                    <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Stock</label>
          <input type="number" name="stock" value="<?php echo e($barang->stock); ?>" class="form-control">
          <?php if($errors->has('stock')): ?>
                        <span class="help-block">
                            <strong style="color: red;"><?php echo e($errors->first('stock')); ?></strong>
                        </span>
                    <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <select name="status" class="form-control select2">
            <option value="1">Tampilkan</option>
            <option value="2">Sembunyikan</option>
          </select>
          <?php if($errors->has('status_ID')): ?>
                        <span class="help-block">
                            <strong style="color: red;"><?php echo e($errors->first('status_ID')); ?></strong>
                        </span>
                    <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" name="photo" id="exampleInputFile">

          <p class="help-block">Example block-level help text here.</p>
          <?php if($errors->has('photo')): ?>
                <span class="help-block">
                    <strong style="color: red;"><?php echo e($errors->first('photo')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
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