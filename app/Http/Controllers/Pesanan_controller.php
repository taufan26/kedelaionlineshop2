<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\AdminPesanan;
use App\Models\AdminKonfirmasi;

class Pesanan_controller extends Controller
{
    public function index()
    {
    	$title = 'List semua pesanan';
    	$konfirmasis = AdminKonfirmasi::orderBy('konfirmasi_id', 'desc')->get();

    	return view('pesanan.pesanan_index', compact('title', 'konfirmasis'));
    }
}
