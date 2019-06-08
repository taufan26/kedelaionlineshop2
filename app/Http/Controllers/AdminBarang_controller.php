<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\AdminBarang;
use App\Models\Kategori;
use App\Models\Photo;
use App\Models\Base64;

class AdminBarang_controller extends Controller
{
    public function index()
    {
    	$title = 'Master AdminBarang';
    	$barangs = AdminBarang::orderBy('nama', 'asc')->get();

    	return view('barang.barang_index', compact('title', 'barangs'));
    }

    public function habis()
    {
        $title = 'Master AdminBarang Yang Sudah Habis';
        $barangs = AdminBarang::orderBy('nama', 'asc')->where('stock', '=', 0)->get();

        return view('barang.barang_index', compact('title', 'barangs'));
    }

    public function show($barang_id)
    {
    	$title = 'Detail AdminBarang';
    	$barang = AdminBarang::where('barang_id', $barang_id)->first();

    	return view('barang.barang_show', compact('title', 'barang'));
    }

    public function create()
    {
    	$title = 'Tambah AdminBarang';
    	$kategoris = Kategori::orderBy('nama', 'asc')->get();

    	return view('barang.barang_create', compact('title', 'kategoris'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
            'photo' => 'required',
            'stock' => 'required',
            'status' => 'required',
        ]);

        $barang = new AdminBarang;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->keterangan = $request->keterangan;
        $barang->kategori_id = $request->kategori_id;
        $barang->stock = $request->stock;
        $barang->status_id = $request->status;
        $barang->save();

        if($files=$request->file('photo')){
            $name=$files->getClientOriginalName();
            $files->move('image',$name);

            // base64 encode
            $base64 = base64_encode(asset('image/'.$name));
            $base = new Base64;
            $base->barang_id = $barang->barang_id;
            $base->nama = $base64;
            $base->save();

            $photo = new Photo;
            $photo->barang_id = $barang->barang_id;
            $photo->nama = $name;
            $photo->save();
        }

        Session::flash('pesan', 'Data berhasil di tambah');

        return redirect('barang');
    }

    public function edit($barang_id)
    {
    	$title = 'Edit AdminBarang';
    	$barang = AdminBarang::where('barang_id', $barang_id)->first();
    	$kategoris = Kategori::orderBy('nama', 'asc')->get();

    	return view('barang.barang_edit', compact('title', 'barang', 'kategoris'));
    }

    public function update(Request $request, $barang_id)
    {
    	$this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
            'stock' => 'required',
            'status' => 'required',
        ]);

    	$barang = AdminBarang::where('barang_id', $barang_id)->first();
    	$barang->nama = $request->nama;
    	$barang->keterangan = $request->keterangan;
    	$barang->harga = $request->harga;
    	$barang->kategori_id = $request->kategori_id;
    	$barang->stock = $request->stock;
        $barang->status_id = $request->status;
    	$barang->save();

    	if($files=$request->file('photo')){
            $name=$files->getClientOriginalName();
            $files->move('image',$name);
            
            $photo = new Photo;
            $photo->barang_id = $barang->barang_id;
            $photo->nama = $name;
            $photo->save();
        }

    	Session::flash('pesan', 'Data berhasil di Update');

    	return redirect('barang');
    }

    public function delete($barang_id)
    {
    	AdminBarang::where('barang_id', $barang_id)->delete();
        Photo::where('barang_id', $barang_id)->delete();

    	Session::flash('pesan', 'Data berhasil di Hapus');

    	return redirect('barang');

    }
}
