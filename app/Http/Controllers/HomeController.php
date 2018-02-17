<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\JenisToko;
use \App\User;
use \App\Supplier;
use \App\Costumer;
use Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{


    public function daftarsupplier(){
        $jenistoko = JenisToko::all();
        $data['emailsudahada'] = null;
        return view('daftarsupplier')->with($data)->with('jenistoko',$jenistoko);
    }

    public function daftarcostumer(){
        return view('daftarcostumer');
    }

    public function daftarsupplierpost(Request $r){


        $sup = new Supplier;
        $codeuser = User::orderBy('created_at','desc')->value('id');
        $sup->codeuser = $codeuser + 1;
        $sup->namatoko = $r->input('namatoko');
        $sup->alamat = $r->input('alamat');
        if (Supplier::where('email',$r->input('email'))->exists())
            {
                $jenistoko = \App\JenisToko::all();
                $data['emailsudahada'] = "Email Sudah Terdaftar";
                return view('daftarsupplier')->with($data)->with('jenistoko',$jenistoko);
            }
            else
            {
             $user = new User;
             $user->name = $r->input('name');
             $user->username = uniqid();
             $user->password = bcrypt($r->input('password'));
             $user->role = 2;
             $user->approved = 1;
             $user->save();
             $sup->email = $r->input('email');
         }
         $sup->jenistoko = $r->input('jenistoko');
         $sup->slogantoko = $r->input('slogantoko');
         if(Input::hasFile('sampultoko')){
            $sampultoko = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('sampultoko')->getClientOriginalExtension();
            Input::file('sampultoko')->move(public_path('images'),$sampultoko);
            $sup->sampultoko = $sampultoko;
        }
        $sup->save();
        return redirect(url('successsupplier'));

    }

    public function successsupplier(){
        return view('successupplier');
    }

    public function waitingsupplier(){
        return view('waitingsupplier');
    }

    public function verifedsupplier(){
        $a = new \App\BuktiPembayaran;
        $a->id_user = Auth::user()->id;
        if(Input::hasFile('bukti')){
            $bukti = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('bukti')->getClientOriginalExtension();
            Input::file('bukti')->move(public_path('images'),$bukti);
            $a->bukti = $bukti;
        }
        $a->save();
        User::where('id',Auth::user()->id)->update([
            'approved' => 4
        ]);
        return redirect(url('waitingsupplier'));
    }

    public function daftarcostumerpost(Request $r){


        $cos = new Costumer;
        $codeuser = User::orderBy('created_at','desc')->value('id');
        $cos->codeuser = $codeuser + 1;
        $cos->alamat = $r->input('alamat');
        if (Costumer::where('email',$r->input('email'))->exists())
            {
                $data['emailsudahada'] = "Email Sudah Terdaftar";
                return view('daftarcostumer')->with($data);
            }
            else
            {
             $user = new User;
             $user->name = $r->input('name');
             $user->username = uniqid();
             $user->password = bcrypt($r->input('password'));
             $user->role = 3;
             $user->approved = 0;
             $user->save();
             $cos->email = $r->input('email');
         }
         $cos->save();
         return redirect(url('successcostumer'));

     }

     public function successcostumer(){
        return view('successcostumer');
    }

    public function search(Request $r)
    {
      $query = $r->input('query');
      $query2 = \App\JenisToko::where('namajenis','like','%'.$query.'%')->value('id');
      $showjenistoko = Supplier::where('jenistoko',$query2)->paginate(9);
      return view('index')->with('sup', $showjenistoko);
  }
}
