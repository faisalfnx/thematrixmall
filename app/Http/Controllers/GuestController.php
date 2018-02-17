<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Supplier;

class GuestController extends Controller
{
	public function index(){
		$sup = Supplier::paginate(9);
		return view('index')->with('sup',$sup);	
	}


}
