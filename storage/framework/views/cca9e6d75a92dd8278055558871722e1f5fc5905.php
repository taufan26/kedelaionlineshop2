<?php $__env->startSection('content'); ?>

<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->

    <div class="col-md-12 text-center">
    	<h1><?php echo e($barang->nama); ?></h1>
    </div>

    <div class="row text-center">
    	<div class="col-md-12">
    		<img style="width: 200px;" src="<?php echo e(asset('image/'.$barang->gambar->nama)); ?>">
    	</div>
    </div>

    <div class="row text-center">
    	<div class="col-md-12">
    		<?php echo $barang->keterangan; ?>

    	</div>
    </div>

    <div class="row text-center">
    	<div class="col-md-4 col-md-offset-4">
    		<table class="table">
                <tr>
                    <th>Harga</th>
                    <td>:</td>
                    <td>Rp. <?php echo e(number_format($barang->harga, 2)); ?></td>
                </tr>
                <!-- <tr>
                    <th>Discount</th>
                    <td>:</td>
                    <td><?php echo e($barang->discount); ?>%</td>
                </tr>
                <tr>
                    <th>Harga Akhir</th>
                    <td>:</td>
                    <?php
                        if($barang->discount != 0)
                        {
                            $discount = ($barang->harga * $barang->discount) / 100;
                            $harga = $barang->harga - $discount;
                        }
                        else
                        {
                            $harga = $barang->harga;
                        }
                    ?>
                    <td>Rp. <?php echo e(number_format($harga, 2)); ?></td>
                </tr> -->
            </table>
    	</div>
    </div>

  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>