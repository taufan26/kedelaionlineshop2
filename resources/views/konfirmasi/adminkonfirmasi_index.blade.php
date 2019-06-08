@extends('layouts.adminmaster')

@section('content')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="example1">
                <span style="color: red;"><small>*Click nama untuk detail</small></span>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Total Bayar</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    <th>Action</th>
                  </tr></thead>
                <tbody>
                @foreach($konfirmasis as $index=>$konfirmasi)
                <?php
                  $status = $konfirmasi->pesanan->status_invoice_id;
                  if($status == 3){
                    continue;
                  }
                  if($status == 4){
                    continue;
                  }
                ?>
                <tr>
                  <td>{{ $index+1 }}</td>
                  <?php
                    $user = \DB::table('users')->where('users_id', $konfirmasi->users_id)->value('name');
                  ?>
                  <td class="konfirmasi" pesanan-id="{{ $konfirmasi->pesanan_id }}" style="cursor: pointer; color: blue;">{{ $user }}</td>
                  <td>Rp. {{ number_format($konfirmasi->pesanan->total_bayar, 0) }}</td>
                  <td>{{ $konfirmasi->pesanan->tanggal }}</td>
                  <?php
                      $status = $konfirmasi->pesanan->status->status_invoice_id;
                      $warna = 'green';
                      if($status == 1){
                        $warna = 'yellow';
                      }
                      if($status == 2){
                        $warna = 'blue';
                      }
                      if($status == 3){
                        $warna = 'green';
                      }
                      if($status == 4){
                        $warna = 'red';
                      }
                  ?>
                  <td style="color: {{ $warna }}">{{ $konfirmasi->pesanan->status->nama }}</td>
                  <?php
                      $photo = $konfirmasi->photo;
                      $lampiran = base64_decode($photo);
                  ?>
                  <td><a href="{{ $lampiran }}" download>Download Lampiran</a></td>
                  <td><a style="color: blue;" href="{{ url('konfirmasi/terima/'.$konfirmasi->pesanan_id) }}">Terima</a> | <a style="color: red;" href="{{ url('konfirmasi/tolak/'.$konfirmasi->pesanan_id) }}">Tolak</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

       <!-- /.modal -->

        <div class="modal modal-default fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Konfirmasi Pembayaran</h4>
              </div>
              <div class="modal-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Nama Penerima
                      </th>
                      <td>
                        :
                      </td>
                      <td id="nama-penerima">
                        
                      </td>
                    </tr>
                    <tr>
                      <th>
                        Alamat
                      </th>
                      <td>
                        :
                      </td>
                      <td id="alamat">
                        
                      </td>
                    </tr>
                  </thead>
                </table>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Nama Barang
                      </th>
                      <th>
                        Qty
                      </th>
                      <th>
                        Subtotal
                      </th>
                    </tr>
                  </thead>
                  <tbody id="barangs">
                    
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

@endsection

@section('scripts')

<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function(){
    var flash = "{{ Session::has('pesan') }}";
    if(flash){
      var pesan = "{{ Session::get('pesan') }}";
      swal('success', pesan, 'success');
    }

    // Ketika detial konfirmasi
    $('body').on('click', '.konfirmasi', function(){
      var pesanan_id = $(this).attr('pesanan-id');
      var url = "{{ url('konfirmasi/detail') }}"+'/'+pesanan_id;
      $('#nama-penerima').empty();
      $('#alamat').empty();
      $('#barangs').empty();

      $.ajax({
        type : 'get',
        dataType : 'json',
        url : "{{ url('konfirmasi/detail') }}"+'/'+pesanan_id,
        success : function(data){
          // console.log(data);
          $('#nama-penerima').append(data.hasil.nama_penerima);
          $('#alamat').append(data.hasil.alamat);

          $.each(data.hasil.barang, function(i, v){
            console.log(v);

            var barang = '<tr>';

            barang += '<td>';
            barang += v.nama_barang;
            barang += '</td>';

            barang += '<td>';
            barang += v.qty;
            barang += '</td>';

            barang += '<td>';
            barang += 'Rp. '+v.subtotal;
            barang += '</td>';

            barang += '</tr>';

            $('#barangs').append(barang);
          });

          $('#modal-info').modal();
        }
      });
    });

    // Ketika hapus barang
    $('body').on('click', '.hapusBarang', function(e){
      e.preventDefault();
      var barang_id = $(this).attr('barang-id');
      var url = "{{ url('delete/barang') }}"+'/'+barang_id;
      $('.confirmDelete').attr('href', url);
        
      $('#modal-danger').modal();
    });

  });
</script>

@endsection