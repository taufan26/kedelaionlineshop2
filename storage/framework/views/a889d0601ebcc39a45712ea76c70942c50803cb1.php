<?php $__env->startSection('content'); ?>

<ul class="thumbnails">
<?php $__currentLoopData = $barangs->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barangChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
	<?php $__currentLoopData = $barangChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li class="span3">
	  <div class="thumbnail">
	  	<?php
	  		$gambar = \DB::table('base64')->where('barang_id', $barang->barang_id)->value('nama');
	  		$photo = base64_decode($gambar);
	  	?>
		<a  href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>"><img style="height: 200px;" src="<?php echo e($photo); ?>" alt=""/></a>
		<div class="caption">
		  <h5><?php echo e($barang->nama); ?></h5>
		 
		  <h4 style="text-align:center"><a class="btn" href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="<?php echo e(url('add-to-cart/'.$barang->barang_id)); ?>">Add to <i class="icon-shopping-cart"></i></a>
		  	<div>
		  		<a class="btn btn-primary" href="#">Rp. <?php echo e(number_format($barang->harga, 0)); ?></a>
		  	</div>
		  </h4>
		</div>
	  </div>
	</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	
	<script>
		$(document).ready(function(){
			var flash = "<?php echo e(Session::has('pesan')); ?>";
			if(flash){
				var pesan = "<?php echo e(Session::get('pesan')); ?>";
				swal('success', pesan, 'success');
			}
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>