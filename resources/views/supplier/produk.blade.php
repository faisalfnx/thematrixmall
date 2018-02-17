@extends('layouts.supplier')
<title>Produk</title>
@section('content')
<div class="container">
	<a href="{{url('supplier/produk/add/')}}" class="float-right btn btn-primary" style="text-align: center;font-size: 12px;">Tambah Produk</a>
    <a href="{{url('supplier/produk/rekapdata/')}}" class="float-right btn btn-success" style="text-align: center;font-size: 12px;">Rekap Data</a>
	<h1>Produk</h1>
  <hr>
	<table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Kode Produk</th>
      <th scope="col">Jenis Produk</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga Produk</th>
      <th scope="col">Stok Produk</th>
      <th scope="col">Status Produk</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($produk as $q)
    <?php
    $jenisproduk = \App\JenisProduk::where('id',$q->jenisproduk)->value('type');
    ?>
    <tr style="text-align: center;font-size: 12px;">
      <td>{{$q->kodeproduk}}</td>
      <td>{{$jenisproduk}}</td>
      <td>{{$q->namaproduk}}</td>
      <td>{{$q->hargaproduk}}</td>
      <td>{{$q->stok}}</td>
      <td>{{$q->status}}</td>
      <td>
      	<a href="{{url('supplier/produk/edit/'.$q->id)}}" style="color: white;text-align: center;font-size: 12px;" 
      		class="btn btn-warning">Edit</a>
      	<a href="{{url('supplier/produk/delete/'.$q->id)}}" style="text-align: center;font-size: 12px;" onclick="return confirm('anda yakin untuk menghapusnya ?')" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection