<?php $__env->startSection('content'); ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center" colspan="4">INVOICE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Nama</th>
			<th>Qty</th>
			<th>Subtotal</th>
		</tr>
		<?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($barang->name); ?></td>
			<td><?php echo e($barang->qty); ?></td>
			<td>Rp. <?php echo e($barang->subtotal()); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<th colspan="2">Total</th>
			<th style="background: lime;">Rp. <?php echo e($total); ?></th>
		</tr>
		<tr>
			<th colspan="1">Transfer Ke :</th>
			<td colspan="2">BRI : Atas Nama <b><i>Fulan Bin Fulan</i></b><br>No. Rekening <b><i>123456789</i></b></td>
		</tr>
	</tbody>
</table>

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