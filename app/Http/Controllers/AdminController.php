<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Supplier;
use \App\Costumer;
use \App\User;
use \App\JenisToko;
use \App\JenisProduk;
use PDF;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$sup = User::where('role',2)->paginate(10);
    	return view('admin.index')->with('sup',$sup);
    }

    public function approved($id){
    	$sup = User::find($id);
        $sup->approved = 2;
        $sup->save();
        return redirect(url('admin'));
    }

    public function deletesupplier($id){
    	$sup = User::find($id);
    	$sup->delete();
    	return redirect(url('admin'));
    }

    public function addjenisproduk(){
        $jenistoko = JenisToko::all();
        return view('admin.addjenisproduk')->with('jenistoko',$jenistoko);
    }

    public function postjenisproduk(Request $r){
        $jenisproduk = new JenisProduk;
        $jenisproduk->jenistoko = $r->input('jenistoko');
        $jenisproduk->type = $r->input('type');
        $jenisproduk->save();
        return redirect(url('admin/jenisproduk'));
    }

    public function jenistoko(){
    	$jenistoko = JenisToko::all();
    	return view('admin.jenistoko')->with('jenistoko',$jenistoko);
    }

    public function jenisproduk(){
        $jenisproduk = JenisProduk::all();
        return view('admin.jenisproduk')->with('jenisproduk',$jenisproduk);
    }

    public function addjenistoko(){
    	return view('admin.addjenistoko');
    }

    public function postjenistoko(Request $r){
    	JenisToko::create([
    		'namajenis' => $r->input('namajenis')
    	]);
    	return redirect(url('admin/jenistoko'));
    }

    public function editjenistoko($id){
    	$jenistoko = JenisToko::find($id);
    	return view('admin.editjenistoko')->with('jenistoko',$jenistoko);
    }

    public function editjenisproduk($id){
        $jenisproduk = JenisProduk::find($id);
        $jenistoko = JenisToko::all();
        return view('admin.editjenisproduk')->with('jenisproduk',$jenisproduk)->with('jenistoko',$jenistoko);
    }

    public function updatejenisproduk(Request $r){
        JenisProduk::where('id',$r->input('id'))->update([
            'jenistoko' => $r->input('jenistoko'),
            'type' => $r->input('type')
        ]);
        return redirect(url('admin/jenisproduk'));
    }

    public function updatejenistoko(Request $r){
    	JenisToko::where('id',$r->input('id'))->update([
    		'namajenis' => $r->input('namajenis')
    	]);
    	return redirect(url('admin/jenistoko'));
    }

    public function deletejenistoko($id){
    	$jenistoko = JenisToko::find($id);
    	$jenistoko->delete();
    	return redirect(url('admin/jenistoko'));
    }

    public function deletejenisproduk($id){
        $jenisproduk = JenisProduk::find($id);
        $jenisproduk->delete();
        return redirect(url('admin/jenisproduk'));
    }

    public function admin(){
    	$admin = User::where('role',1)->get();
    	return view('admin.admin')->with('admin',$admin);
    }

    public function addadmin(){
    	return view('admin.addadmin');
    }

    public function postadmin(Request $r){
    	User::create([
    		'name' => $r->input('name'),
    		'username' => uniqid(),
    		'password' => bcrypt($r->input('password')),
    		'role' => 1,
    		'approved' => 0
    	]);
    	return redirect(url('admin/admin'));
    }

    public function editadmin($id){
    	$admin = User::find($id);
    	return view('admin.editadmin')->with('admin',$admin);
    }

    public function updateadmin(Request $r){
    	User::where('id',$r->input('id'))->update([
    		'name' => $r->input('name'),
    		'username' => uniqid(),
    		'password' => bcrypt($r->input('password')),
    	]);
    	return redirect(url('admin/admin'));
    }

    public function deleteadmin($id){
    	$admin = User::find($id);
    	$admin->delete();
      return redirect(url('admin/admin'));
  }

  public function rekapdatasupplier()
    {
        $data['sup'] = \App\Supplier::all();
        $pdf = PDF::loadview('admin.rekapdatasupplier', $data);
        return $pdf->stream();
    }


}
