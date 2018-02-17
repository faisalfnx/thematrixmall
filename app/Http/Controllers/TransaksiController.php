<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Produk;
use \App\Supplier;
use \App\Transaksi;
use Auth;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
    	$prod = Produk::find($id);
    	return view('transaksi.index')->with('prod',$prod);
    }

    public function post(Request $r){
    	$post = new Transaksi;
    	$post->kodetransaksi = uniqid();
    	$post->kodecostumer = Auth::user()->id;
    	$post->kodesupplier = $r->input('kodesupplier');
    	$post->kodeproduk = $r->input('kodeproduk');
    	$post->jumlahpembelian = $r->input('jumlahpembelian');
    	$post->totalharga = $r->input('totalharga') * $r->input('jumlahpembelian');
    	$post->save();
    	return redirect(url('costumer/successtransaksi')); 
    }

    public function success(){
    	return view('transaksi.sukses');
    }
}
