@extends('layouts.supplier')
<title>Edit profile</title>
@section('content')
<div class="container">
<h1>Form Edit Profile</h1>
<hr>
<?php
$namatoko = \App\Supplier::where('codeuser',Auth::user()->id)->value('namatoko');
$alamat = \App\Supplier::where('codeuser',Auth::user()->id)->value('alamat');
$slogantoko = \App\Supplier::where('codeuser',Auth::user()->id)->value('slogantoko');
?>
<form method="POST" action="{{url('supplier/profile/post')}}" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Supplier</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Nama Produk" required value="{{$profile->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Toko</label>
    <input type="text" class="form-control" name="namatoko" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required value="{{$namatoko}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required value="{{$alamat}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Slogan Toko</label>
    <textarea type="text" class="form-control" name="slogantoko" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required>
    {{$slogantoko}}
  </textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Perbaharui Password ( Selalu isi saat meng update )</label>
    <input type="password" class="form-control" name="password" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required value="*******">
  </div>

  <input type="hidden" name="id" value="{{Auth::user()->id}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection