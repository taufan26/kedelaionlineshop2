<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\AdminKonfirmasi;
use App\Models\AdminPesanan;
use App\Models\AdminPesanan_barang;
use App\Models\AdminBarang;

class AdminKonfirmasi_controller extends Controller
{
    public function index()
    {
    	$title = 'List konfirmasi pembayaran';
    	$konfirmasis = AdminKonfirmasi::orderBy('konfirmasi_id', 'desc')->get();
    	
    	return view('konfirmasi.adminkonfirmasi_index', compact('title', 'konfirmasis'));
    }

    public function detail($pesanan_id)
    {
    	$hasilArray = array('barang'=>array());

    	$pesanan = AdminPesanan::where('pesanan_id', $pesanan_id)->first();
    	$hasilArray['nama_penerima'] = $pesanan->nama_penerima;
    	$hasilArray['alamat'] = $pesanan->alamat;

    	$barangs = AdminPesanan_barang::where('pesanan_id', $pesanan_id)->get();

    	foreach ($barangs as $key => $barang) {
    		$barangArray = array();
    		$barangArray['nama_barang'] = $barang->barang['nama'];
    		$barangArray['qty'] = $barang->qty;
    		$barangArray['subtotal'] = number_format($barang->subtotal, 0);

    		array_push($hasilArray['barang'], $barangArray);
    	}

    	return response()->json([
    		'hasil'=>$hasilArray
    	]);
    }

    public function terima($pesanan_id)
    {
        $pesanan = AdminPesanan::where('pesanan_id', $pesanan_id)->first();
        $pesanan->status_invoice_id = 3;
        $pesanan->save();

        Session::flash('pesan', 'Berhasil di konfirmasi');

        return redirect('admin/konfirmasi');
    }

    public function tolak($pesanan_id)
    {
        $pesanan = AdminPesanan::where('pesanan_id', $pesanan_id)->first();
        $pesanan->status_invoice_id = 4;
        $pesanan->save();

        Session::flash('pesan', 'Berhasil di konfirmasi');

        return redirect('admin/konfirmasi');
    }
}
