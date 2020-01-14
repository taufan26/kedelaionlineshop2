<div class="user-panel">
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Master Barang</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('barang')); ?>"><i class="fa fa-circle-o"></i> Daftar Semua Barang</a>
                </li>
                <li><a href="<?php echo e(url('barang/habis')); ?>"><i class="fa fa-circle-o"></i> Daftar Barang Yang Habis</a>
                </li>
                <li><a href="<?php echo e(url('barang/create')); ?>"><i class="fa fa-circle-o"></i> Tambah Barang</a>
                </li>
                </li>
              </ul>
            </li>

            <li>
              <a href="<?php echo e(url('kategori')); ?>">
                <i class="fa fa-amazon"></i> <span>Master Kategori Barang</span>
              </a>
            </li>

            <li>
              <a href="<?php echo e(url('admin/konfirmasi')); ?>">
                <i class="fa fa-opera"></i> <span>Konfirmasi Pembayaran</span>
              </a>
            </li>

            <li>
              <a href="<?php echo e(url('pesanan')); ?>">
                <i class="fa fa-adjust"></i> <span>List Semua Pesanan</span>
              </a>
            </li>

            <li>
              <a href="<?php echo e(url('keluar')); ?>">
                <i class="fa fa-adjust"></i> <span>Logout</span>
              </a>
            </li>
            
          </ul>