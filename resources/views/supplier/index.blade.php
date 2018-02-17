@extends('layouts.supplier')
<title>Produk</title>
@section('content')
<div class="container">
	<h1>Transaksi Tertunda</h1>
  <hr>
	<table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Kode Transaksi</th>
      <th scope="col">Nama Costumer</th>
      <th scope="col">Email Costumer</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Pembelian</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Tanggal Pemesanan</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($trans as $q)
  	<?php
  		$costumer = \App\User::where('id',$q->kodecostumer)->value('name');
  		$emailcostumer = \App\Costumer::where('codeuser',$q->kodecostumer)->value('email');
  		$produk = \App\Produk::where('kodeproduk',$q->kodeproduk)->value('namaproduk');
  	?>
  	@if($q->status == 'FALSE')
    <tr style="text-align: center;font-size: 12px;">
      <td>{{$q->kodetransaksi}}</td>
      <td>{{$costumer}}</td>
      <td>{{$emailcostumer}}</td>
      <td>{{$produk}}</td>
      <td>{{$q->jumlahpembelian}}</td>
      <td>Rp. {{$q->totalharga}}</td>
      <td>{{$q->created_at}}</td>
      <td>
      	<a href="{{url('supplier/approved/transaksi/'.$q->id)}}" style="color: white;text-align: center;font-size: 12px;" 
      		class="btn btn-success">Approved</a>
      	<a href="{{url('supplier/delete/transaksi/'.$q->id)}}" style="text-align: center;font-size: 12px;" onclick="return confirm('anda yakin untuk menghapusnya ?')" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
</div>
@endsection