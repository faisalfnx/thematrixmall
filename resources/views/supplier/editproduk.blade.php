@extends('layouts.supplier')
<title>Add Produk</title>
@section('content')
<div class="container">
<h1>Form Add Produk</h1>
<hr>
<form method="POST" action="{{url('supplier/produk/update')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Jenis Produk</label>
    <select class="form-control" name="jenisproduk" disabled>
    	<option selected disabled>{{$produk->jenisproduk}}</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Produk</label>
    <input type="text" class="form-control" name="namaproduk" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Nama Produk" required value="{{$produk->namaproduk}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Harga Produk</label>
    <input type="number" class="form-control" name="hargaproduk" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Harga" required value="{{$produk->hargaproduk}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Stok Produk</label>
    <input type="number" class="form-control" name="stok" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Stok" required value="{{$produk->stok}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Status Produk</label>
    <select class="form-control" name="status">
    	<option>Pilih Satu</option>
    	<option value="TRUE">AKTIF</option>
    	<option value="FALSE">NON-AKTIF</option>
    </select>
  </div>
  <input type="hidden" name="id" value="{{$produk->id}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection