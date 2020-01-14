<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('bootshop/themes/images/logo.png')); ?>" alt="Bootsshop"/></a>
		
    <?php if(Auth::guest()): ?>
    <ul id="topMenu" class="nav pull-right">
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="POST" action="<?php echo e(route('login')); ?>">
				<?php echo e(csrf_field()); ?>

			  <div class="control-group">								
				<input type="text" id="inputEmail" name="email" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" name="password" placeholder="Password">
			  </div>
			<button type="submit" class="btn btn-success">Sign in</button>
			</form>		
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>
	</div>
	</li>
    </ul>
    <?php else: ?>
    <ul id="topMenu" class="nav pull-right">

    <li class=""><a href="<?php echo e(url('invoice/list')); ?>">My Invoices</a></li>
    <li class=""><a href="<?php echo e(url('konfirmasi')); ?>">Konfirmasi Pembayaran</a></li>
	    <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>
                                                     <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
	</ul>
    <?php endif; ?>
  </div>