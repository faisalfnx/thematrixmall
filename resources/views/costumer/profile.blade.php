@extends('layouts.index')
<title>Edit profile</title>
@section('content')
<div class="container">
<h1>Form Edit Profile</h1>
<hr>
<?php
$email = \App\Costumer::where('codeuser',Auth::user()->id)->value('email');
$alamat = \App\Costumer::where('codeuser',Auth::user()->id)->value('alamat');
?>
<form method="POST" action="{{url('costumer/profile/post')}}" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Costumer</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Nama Produk" required value="{{Auth::user()->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Alamat</label>
    <textarea type="text" class="form-control" name="alamat" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required>{{$alamat}}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required value="{{$email}}" readonly>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Perbaharui Password ( Selalu isi saat meng update )</label>
    <input type="password" class="form-control" name="password" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Password" required>
  </div>

  <input type="hidden" name="id" value="{{Auth::user()->id}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection