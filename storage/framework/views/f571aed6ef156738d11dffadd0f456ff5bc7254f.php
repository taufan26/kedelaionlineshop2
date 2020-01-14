<div class="well well-small"><a id="myCart" href="/shopping-cart"><img src="<?php echo e(asset('bootshop/themes/images/ico-cart.png')); ?>" alt="cart"><?php echo e(count(Cart::content())); ?> Barang di keranjang  <span class="badge badge-warning pull-right">Rp. <?php echo e(Cart::subtotal()); ?></span></a></div>
<ul id="sideManu" class="nav nav-tabs nav-stacked">
	<?php
		$kategoris = \DB::table('kategori')->orderBy('nama', 'asc')->get();
	?>
<?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$jumlah = \DB::table('barang')->where('kategori_id', $kategori->kategori_id)->where('status_id', 1)->get();
	?>
	<li><a href="<?php echo e(url('barang/kategori/'.$kategori->kategori_id)); ?>"><?php echo e($kategori->nama); ?> [<?php echo e(count($jumlah)); ?>]</a></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<br/>
<?php $barangs = \DB::table('barang')->inRandomOrder()->limit(2)->get(); ?>
<?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="thumbnail">
  	<?php
  		$gambar = \DB::table('base64')->where('barang_id', $barang->barang_id)->value('nama');
  		$photo = base64_decode($gambar);
  	?>
	<img style="height: 200px;" src="<?php echo e($photo); ?>" alt="Bootshop panasonoc New camera"/>
	<div class="caption">
	  <h5><?php echo e($barang->nama); ?></h5>
		<h4 style="text-align:center"><a class="btn" href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="<?php echo e(url('add-to-cart/'.$barang->barang_id)); ?>">Add to <i class="icon-shopping-cart"></i></a>
			<div>
				<a class="btn btn-primary" href="#">Rp. <?php echo e(number_format($barang->harga, 0)); ?></a>
			</div>
		</h4>
	</div>
  </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>