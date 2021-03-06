<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong></strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="<?php echo e(url('shopping-cart')); ?>"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?php echo e(count(Cart::content())); ?> ] Barang di Keranjang </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>
</div>
<!-- Header End====================================================================== -->

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
<!-- Sidebar end=============================================== -->
		<?php
			$barangs = \DB::table('barang')->inRandomOrder()->limit(12)->get();
			$barangsActive = \DB::table('barang')->where('status_id', 1)->inRandomOrder()->limit(4)->get();
		?>
		<div class="span9">		
			<div class="well well-small">
			<h4>Produk baru <small class="pull-right"></small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
			  	<?php $__currentLoopData = $barangsActive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
				  <?php
			  		$gambar = \DB::table('base64')->where('barang_id', $barang->barang_id)->value('nama');
			  		$photo = base64_decode($gambar);
			  	?>
					<a href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>"><img src="<?php echo e($photo); ?>" alt=""></a>
					<div class="caption">
					  <h5><?php echo e($barang->nama); ?></h5>
					  <h4><a class="btn" href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>">Lihat</a> <span class="pull-right">Rp. <?php echo e(number_format($barang->harga, 0)); ?></span></h4>
					</div>
				  </div>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </ul>
			  </div>

			  <?php $__currentLoopData = $barangs->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barangsChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <div class="item">
			  <ul class="thumbnails">
			  	<?php $__currentLoopData = $barangsChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
				  <?php
			  		$gambar = \DB::table('base64')->where('barang_id', $barang->barang_id)->value('nama');
			  		$photo = base64_decode($gambar);
			  	?>
					<a href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>"><img src="<?php echo e($photo); ?>" alt=""></a>
					<div class="caption">
					  <h5><?php echo e($barang->nama); ?></h5>
					  <h4><a class="btn" href="<?php echo e(url('barang/show/'.$barang->barang_id)); ?>">Lihat</a> <span class="pull-right"><?php echo e(number_format($barang->harga, 0)); ?></span></h4>
					</div>
				  </div>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </ul>
			  </div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>

		<!-- Latest Products ===================================================== -->

			  <?php echo $__env->yieldContent('content'); ?>	

		<!-- End Latest Products ================================================== -->
		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>  
				<a href="register.html">REGISTRATION</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">TERMS AND CONDITIONS</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.html">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Kelompok 4</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<?php echo $__env->make('layouts.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('scripts'); ?>
	
	<!-- Themes switcher section ============================================================================================= -->

<span id="themesBtn"></span>
</body>
</html>