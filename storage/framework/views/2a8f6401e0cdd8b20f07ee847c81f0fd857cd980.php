<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr></thead>
                <tbody>
                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $warna = 'black';
                    $stock = $barang->stock;
                    if($stock == 0){
                      $warna = 'red';
                    }
                ?>
                <tr style="color: <?php echo e($warna); ?>">
                  <td><?php echo e($index+1); ?></td>
                  <td><?php echo e($barang->nama); ?></td>
                  <td><?php echo e($barang->harga); ?></td>
                  <td><?php echo e($barang->kategori->nama); ?></td>
                  <td><?php echo e($barang->stock); ?></td>
                  <td><span class="badge bg-<?php echo e(($barang->status_id) == 1 ? 'green' : 'red'); ?>"><?php echo e($barang->statuss['nama']); ?></span></td>
                  <td>
                    <a href="<?php echo e(url('barang/edit/'.$barang->barang_id)); ?>"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="" class="hapusBarang" barang-id="<?php echo e($barang->barang_id); ?>"><i class="fa fa-fw fa-trash"></i></a>
                    <a href="<?php echo e(url('barang/admin/show/'.$barang->barang_id)); ?>"><i class="fa fa-fw fa-search"></i></a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

       <!-- /.modal -->

        <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Delete</h4>
              </div>
              <div class="modal-body">
                <p>Yakin Ingin Menghapus Barang Ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-outline confirmDelete">Ya, Hapus</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function(){
    var flash = "<?php echo e(Session::has('pesan')); ?>";
    if(flash){
      var pesan = "<?php echo e(Session::get('pesan')); ?>";
      swal('success', pesan, 'success');
    }

    // Ketika hapus barang
    $('body').on('click', '.hapusBarang', function(e){
      e.preventDefault();
      var barang_id = $(this).attr('barang-id');
      var url = "<?php echo e(url('delete/barang')); ?>"+'/'+barang_id;
      $('.confirmDelete').attr('href', url);
      
      $('#modal-danger').modal();
    });

  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>