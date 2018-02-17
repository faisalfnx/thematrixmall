<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Supplier;
use Auth;
use \App\User;
use \App\Costumer;
use \App\Transaksi;
use \App\Produk;

class CostumerController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	return view('costumer.index');
    }

     public function showsupplier($id){
        $sup = Supplier::find($id);
        return view('showsupplier')->with('sup',$sup);
    }

    public function editprofile($id){
    	$profile = User::find($id);
    	return view('costumer.profile')->with('profile',$profile);
    }

    public function updateprofile(Request $r){
    	User::where('id',$r->input('id'))->update([
    		'name' => $r->input('name'),
    		'password' => bcrypt($r->input('password'))
    	]);

    	Costumer::where('codeuser',$r->input('id'))->update([
    		'alamat' => $r->input('alamat')
    	]);
    	return redirect(url('costumer'));
    }

    public function transaksi(){
    	$trans = \App\Transaksi::where('kodecostumer',Auth::user()->id)->get();
    	return view('costumer.transaksi')->with('trans',$trans);
    }

    public function batalkantransaksi($id){
    	$a = Transaksi::find($id);
    	$a->delete();
    	return redirect(url('costumer/transaksi'));
    }

    public function searchproduk(Request $r)
    {
      $query = $r->input('query');
      $produk = \App\JenisProduk::where('type','like','%'.$query.'%')->paginate(5);
      return view('index')->with('jenisproduk', $produk);
  }
}
