<?php
$code = \App\User::orderBy('created_at','desc')->value('username');
$nama = \App\User::orderBy('created_at','desc')->value('name');
$email = \App\Supplier::orderBy('created_at','desc')->value('email');
?>
@extends('layouts.index')
<title>Informasi Akun</title>
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Informasi Akun Anda</div>
				<div class="card-body">
					<hr>
					<center>
						<label style="color: red;"><b>Bayar Tagihan Untuk Menggunakan Fitur Supplier</b>
						</label>
					</center>
					<hr>
					<label>Nama Supplier : {{$nama}}</label><br>
					<label>Email Supplier : {{$email}}</label><br>
					<label>Code Username : {{$code}} ( harap diingat , akan digunakan saat login )
					</label><br>
					<label>Password : ******* ( password yang tadi anda isi )</label> <br>
					<br>
					<center>
					<a href="{{url('supplier')}}"><button class="btn btn-success pull-right">Login & Bayar Tagihan Anda</button></a>  
					</center>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection