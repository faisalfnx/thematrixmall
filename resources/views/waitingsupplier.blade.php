@extends('layouts.app')
<title>Waiting Comfirmation</title>
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Informasi Akun Anda</div>
				<div class="card-body">
					<center>
					<label style="color: green;"><b>Akun anda sedang diproses oleh admin , silahkan tunggu beberapa saat , dan pencet refresh di  halaman ini ... dan terima kasih sudah memberi kepercayaan kepada kami</b></label>
					<br>
					<a href="{{url('supplier')}}">
					<button class="btn btn-primary">Refresh</button>
					</a>
					</center>         	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection