<?php
$code = \App\User::orderBy('created_at','desc')->value('username');
$nama = \App\User::orderBy('created_at','desc')->value('name');
$email = \App\Costumer::orderBy('created_at','desc')->value('email');
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
					<label>Nama Supplier : {{$nama}}</label><br>
					<label>Email Supplier : {{$email}}</label><br>
					<label>Code Username : {{$code}} ( harap diingat , akan digunakan saat login )
					</label><br>
					<label>Password : ******* ( password yang tadi anda isi )</label> <br>
					<br>
					<center>
					<a href="{{url('supplier')}}"><button class="btn btn-success pull-right">Login dan Belanja</button></a>  
					</center>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection