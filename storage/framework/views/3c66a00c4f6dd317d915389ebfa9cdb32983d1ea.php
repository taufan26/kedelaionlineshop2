<?php $__env->startSection('content'); ?>


<div class="greyBg">
    <div class="container">
		<div class="wrapper">
      <div class="row">
				<div class="col-sm-12">
				 <div class="breadcrumbs">
			       <ul>
			          <li><a href="<?php echo e(url('/')); ?>">Home </a></li>
                 <li><span class="dot">/</span>
			          <a href="<?php echo e(url('/home')); ?>"> <?php echo e(Auth::user()->name); ?></a></li>
			        </ul>
            </div>
         </div>
		    </div>

        <div class="row top25">
            <div class="panel itemBox">
                <div class="panel-header"><h2 align="center">Akun Saya</h2><hr></div>



                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(isset($link)): ?>
                    <div class="myContent">

                      <ul class="nav nav-tabs">
                        <?php if($link=="profile"): ?>
                        <li class="active"><a href="#profile" data-toggle="tab">profile</a></li>
                        <li><a href="#myorders" data-toggle="tab">My orders</a></li>
                        <li><a href="#changepassword" data-toggle="tab">change Password</a></li>

                        <?php elseif($link=="myorders"): ?>
                        <li ><a href="#profile" data-toggle="tab">profile</a></li>
                        <li class="active"><a href="#myorders" data-toggle="tab">My orders</a></li>
                        <li><a href="#changepassword" data-toggle="tab">change Password</a></li>

                        <?php elseif($link=="changepassword"): ?>
                        <li ><a href="#profile" data-toggle="tab">profile</a></li>
                        <li><a href="#myorders" data-toggle="tab">My orders</a></li>
                        <li class="active"><a href="#changepassword" data-toggle="tab">change Password</a></li>
                        <?php else: ?>
                        something else
                        <?php endif; ?>
                      </ul>

                      <div class="tab-content col-md-6">
                        <div id="profile" class="tab-pane fade in active">
                        your <?php echo e($link); ?> data
                        </div>
                        <div id="myorders" class="tab-pane fade in" >
                          myorders tab
                        </div>
                        <div id="changepassword" class="tab-pane fade in">
                          changepassword tab
                        </div>
                      </div>

                    </div>
                    <?php else: ?>
                  <div class="myContent">

                    <ul class="nav nav-tabs">

                      <li class="active"><a href="#profile" data-toggle="tab">profile</a></li>

                    </ul>

                    <div class="tab-content">
                      <div id="profile" class="tab-pane fade in active">
                      <h3>Edit Akun</h3>
                      <form action="<?php echo e(url('/myaccounts')); ?>" method="post">

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                       
                        <input type="text" name="name" class="form-control"
                         value="<?php echo e(AUth::user()->name); ?>" placeholder="Full Name"/>
                        <br>

                      
                         <input type="text" name="email" class="form-control"
                         value="<?php echo e(AUth::user()->email); ?>"
                         readonly style="background-color:#efefef" placeholder="email"/>
                         <br>
                          
                          <input type="text" name="password"  class="form-control"
                          placeholder="Password"/>
                          <br>
                          <div>Biarkan Kosong Kalau tidak di Ganti</div>
                          <br>

                           <input type="text"  class="form-control" placeholder="Confirm Password" name="password_confirmation">
                          <br>
                          
                          
                         <input type="submit"  value="Update Profile">
                      </form>
                      </div>


                    </div>
                  </div>
                  <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>