@extends('layouts.costumer')
<title>Transaksi</title>
@section('content')
<div class="container">
	<h1>Transaksi</h1>
	<hr>
	<?php
	$supplier = \App\Supplier::where('codeuser',$prod->kodesupplier)->value('namatoko');
	$user = \App\User::where('id',$prod->kodesupplier)->value('id');
	?>
	<form method="POST" action="{{url('costumer/transaksi/post/')}}">
		<div class="form-group">
			<label for="exampleInputEmail1">Nama Produk</label>
			<input type="text" class="form-control" name="kodeproduk" id="exampleInputEmail1" 
			aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" value="{{$prod->namaproduk}}" readonly required>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Nama Toko</label>
			<input type="text" class="form-control" name="namasupplier" id="exampleInputEmail1" 
			aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" value="{{$supplier}}" readonly required>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Harga</label>
			<input type="number" class="form-control" name="totalharga" id="exampleInputEmail1" 
			aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" value="{{$prod->hargaproduk}}" readonly  required>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Jumlah Pembelian</label>
			<input type="number" class="form-control" name="jumlahpembelian" id="exampleInputEmail1" 
			aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" value="1"  required>
		</div>



		<input type="hidden" value="{{$user}}" name="kodesupplier">
		<input type="hidden" value="{{$prod->kodeproduk}}" name="kodeproduk">

		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-primary">Beli Sekarang</button>
	</form>
</div>

@endsection