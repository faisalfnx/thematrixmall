@extends('layouts.index')
<title>Transaksi</title>
@section('content')
<div class="container">
	<h1>List Transaksi</h1>
  <hr>
  <h3>Transaksi Tertunda</h3>
  <label>( Anda Bisa Membatalkan jika Supplier belum meng-approved Pesanan anda )</label>
	<table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Kode Transaksi</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Pembelian</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Action</th>
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
      <td>{{$produk}}</td>
      <td>{{$q->jumlahpembelian}}</td>
      <td>Rp. {{$q->totalharga}}</td>
      <td>
      	<a href="{{url('costumer/batalkan/transaksi/'.$q->id)}}" style="color: white;text-align: center;font-size: 12px;" 
      		class="btn btn-danger" onclick="return confirm('anda yakin untuk membatalkannya ?')">Batalkan</a>
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

<h3>Transaksi Berhasil</h3>
  <table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Kode Transaksi</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Pembelian</th>
      <th scope="col">Total Harga</th>
    </tr>
  </thead>
  <tbody>
    @foreach($trans as $q)
    <?php
      $costumer = \App\User::where('id',$q->kodecostumer)->value('name');
      $emailcostumer = \App\Costumer::where('codeuser',$q->kodecostumer)->value('email');
      $produk = \App\Produk::where('kodeproduk',$q->kodeproduk)->value('namaproduk');
    ?>
    @if($q->status == 'TRUE')
    <tr style="text-align: center;font-size: 12px;">
      <td>{{$q->kodetransaksi}}</td>
      <td>{{$produk}}</td>
      <td>{{$q->jumlahpembelian}}</td>
      <td>Rp. {{$q->totalharga}}</td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

</div>
@endsection