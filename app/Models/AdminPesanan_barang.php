<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPesanan_barang extends Model
{
    protected $table = 'pesanan_barang';
    public $primaryKey = 'pesanan_barang_id';
    public $timestamps = false;

    public function barang()
    {
    	return $this->belongsTo('App\Models\AdminBarang', 'barang_id', 'barang_id');
    }

    public function pesanan()
    {
    	return $this->belongsTo('App\Models\AdminPesanan', 'pesanan_id', 'pesanan_id');
    }
}
