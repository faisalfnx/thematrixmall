<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Transaksi;
use \App\Produk;
use \App\User;
use Auth;
use \App\Supplier;
use Illuminate\Support\Facades\Input;
use \App\JenisProduk;
use PDF;

class SupplierController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$trans = Transaksi::all(); 
		return view('supplier.index')->with('trans',$trans);
	}

	public function indexproduk(){
		$produk = Produk::where('kodesupplier',Auth::user()->id)->get();
		return view('supplier.produk')->with('produk',$produk);
	}

	public function approved($id){
		$sup = Transaksi::find($id);
		$sup->status = 'TRUE';
		$sup->save();
		$idstok = Transaksi::where('id',$id)->value('jumlahpembelian');
		$idproduk = Transaksi::where('id',$id)->value('kodeproduk');
		$getstok = Produk::where('kodeproduk',$idproduk)->value('stok');
		Produk::where('kodeproduk',$idproduk)->update([
			'stok' => $getstok - $idstok
		]);
		return redirect(url('supplier'));
	}

	public function deletetransaksi($id){
		$a = Transaksi::find($id);
		$a->delete();
		return redirect(url('supplier'));
	}

	public function deletetransaksiberhasil($id){
		$a = Transaksi::find($id);
		$a->delete();
		return redirect(url('supplier/transberhasil'));
	}

	public function indextransberhasil(){
		$trans = Transaksi::all();
		return view('supplier.transberhasil')->with('trans',$trans);
	}

	public function addproduk(){
		$jenistoko = Auth::user()->id;
		$jenistoko2 = Supplier::where('codeuser',$jenistoko)->value('jenistoko');
		$jenisproduk = JenisProduk::where('jenistoko',$jenistoko2)->get();
		return view('supplier.addproduk')->with('jenisproduk',$jenisproduk);
	}

	public function postproduk(Request $r){
		$produk = new Produk;
		$produk->kodeproduk = uniqid();
		$produk->kodesupplier = Auth::user()->id;
		$produk->jenisproduk = $r->input('jenisproduk');
		$produk->namaproduk = $r->input('namaproduk');
		$produk->hargaproduk = $r->input('hargaproduk');
		$produk->stok = $r->input('stok');
		$produk->status = $r->input('status');
		$produk->save();
		return redirect(url('supplier/produk'));
	}

	public function editproduk($id){
		$produk = Produk::find($id);
		return view('supplier.editproduk')->with('produk',$produk);
	}

	public function updateproduk(Request $r){
		$produk = Produk::find($r->input('id'));
		$produk->namaproduk = $r->input('namaproduk');
		$produk->hargaproduk = $r->input('hargaproduk');
		$produk->stok = $r->input('stok');
		$produk->status = $r->input('status');
		$produk->save();
		return redirect(url('supplier/produk'));
	}

	public function deleteproduk($id){
		$produk = Produk::find($id);
		$produk->delete();
		return redirect(url('supplier/produk'));
	}

	public function editprofile($id){
		$profile = User::find($id);
		return view('supplier.profile')->with('profile',$profile);
	}

	public function profilepost(Request $r){
		User::where('id',Auth::user()->id)->update([
			'name' => $r->input('name'),
			'password' => bcrypt($r->input('password'))
		]);

		\App\Supplier::where('codeuser',Auth::user()->id)->update([
			'namatoko' => $r->input('namatoko'),
			'alamat' => $r->input('alamat'),
			'slogantoko' => $r->input('slogantoko')
		]);

		return redirect(url('supplier'));
	}

	public function rekapdataproduk()
	{
		$data['prod'] = \App\Produk::where('kodesupplier',Auth::user()->id)->get();
		$pdf = PDF::loadview('supplier.rekapdataproduk', $data);
		return $pdf->stream();
	}

	public function tundatransaksi($id){
		$sup = Transaksi::find($id);
		$sup->status = 'FALSE';
		$sup->save();
		$idstok = Transaksi::where('id',$id)->value('jumlahpembelian');
		$idproduk = Transaksi::where('id',$id)->value('kodeproduk');
		$getstok = Produk::where('kodeproduk',$idproduk)->value('stok');
		Produk::where('kodeproduk',$idproduk)->update([
			'stok' => $getstok + $idstok
		]);
		return redirect(url('supplier'));
	}


}
