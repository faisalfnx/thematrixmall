@extends('layouts.app')
<?php 
$approved = \App\User::where('id',Auth::user()->id)->value('approved');
?> 
<title>Akses Denied</title>
@if($approved == 1)
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Informasi Akun Anda</div>
				<div class="card-body">
					<center>
					<label style="color: red;"><b>Bayar Tagihan Untuk Menggunakan Fitur Supplier</b>
					</label><br> 
					<label>No Rek Admin : 10000002222</label><br>
					<label>Biaya Yang Harus Dibayar : Rp . 200.000</label><br>
					<form action="{{url('verifedsupplier')}}" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label style="color: green;"><b>Upload Bukti Pembayaran</b></label>
							<br>
                            <div class="col-md-6">
                                <input id="bukti" type="file" class="form-control" name="bukti"
                                 required autofocus>
                            </div>
                            <br>	
                            @csrf
                            <button class="btn btn-success">Upload</button>
                        </div>
					</form>
					</center>         	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@elseif($approved == 2)
Tidak memiliki akses di admin dan costumer , anda hanya memiliki akses di supplier

@elseif($approved == 4)
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Informasi Akun Anda</div>
				<div class="card-body">
					<center>
					<label style="color: green;"><b>Sedang menunggu konfirmasi oleh admin ...</b></label>
					<br>
					<a href="{{url('supplier')}}">
					<button class="btn btn-primary">Refresh page</button>
					</a>
					</center>         	
				</div>
			</div>
		</div>
	</div>
</div> 
@endsection
@endif
