<?php $__env->startSection('content'); ?>

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small><?php echo e(count(Cart::content())); ?> Item(s) </small>]<a href="<?php echo e(url('shopping-cart/destroy')); ?>" class="btn btn-large pull-right"> Kosongkan Keranjang </a></h3>	
	<hr class="soft"/>
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th>Price</th>
                  <th>SubTotal</th>
				</tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($barang->name); ?></td>
				  <td>
					<div class="input-append"><input disabled="" class="span1" style="max-width:34px" placeholder="<?php echo e($barang->qty); ?>" id="appendedInputButtons" size="16" type="text"><button rowId="<?php echo e($barang->rowId); ?>" class="btn kurangi-qty" type="button"><i class="icon-minus"></i></button>
						<a href="<?php echo e($barang->rowId); ?>" class="btn add-qty"><i class="icon-plus"></i></a>				
					</div>
				  </td>
                  <td>Rp. <?php echo e(number_format($barang->price, 0)); ?></td>
                  <td>Rp. <?php echo e(number_format($barang->subtotal, 0)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                	<th class="text-center" colspan="3">Total</th>
                	<td class="label label-important"><?php echo e(Cart::subtotal()); ?></td>
                </tr>
				</tbody>
            </table>
			</table>

	<a href="<?php echo e(url('/')); ?>" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<?php if(count(Cart::content()) != 0): ?>
	<a href="<?php echo e(url('shopping-cart/checkout')); ?>" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></a>
	<?php endif; ?>
	
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.add-qty').click(function(e){
			e.preventDefault();
			var rowId = $(this).attr('href');
			window.location.href = "<?php echo e(url('shopping-cart/update')); ?>"+'/'+rowId;
		});

		$('.kurangi-qty').click(function(e){
			e.preventDefault();
			var rowId = $(this).attr('rowId');
			window.location.href = "<?php echo e(url('shopping-cart/kurangi')); ?>"+'/'+rowId;
		});
	});
</script>

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