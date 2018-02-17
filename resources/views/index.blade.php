@extends('layouts.index')

@section('content')

<center>
	<h1>Welcome to The Matrix Mall</h1>
</center>
<br>
<div class="container">
	<div class="row">
		@foreach($sup as $q)
		<?php
			$akses = \App\User::where('id',$q->codeuser)->value('approved');
		?>
		@if($akses == 2)
		<?php
		$jenistoko = \App\JenisToko::where('id',$q->jenistoko)->value('namajenis');
		?>
		<div class="col-md-4 form-group">
			<div class="card">
				<img class="card-img-top" src="{{url('images/'.$q->sampultoko)}}" alt="Card image cap" style="height:  250px;">
				<div class="card-body">
					<hr>
					<center>
						<h3>{{$q->namatoko}}</h3>
						<hr>
						<label style="font-size: 11px;">{{$q->alamat}} <br> {{$q->email}} <br> Jenis Toko : {{$jenistoko}}
						</label>
						<hr>
						<a href="{{url('showsupplier/'.$q->id)}}" class="btn btn-success">Lihat Supplier & Toko</a>
					</center>
				</div>
			</div>
		</div>
		@endif
		@endforeach

		<div class="row justify-content-md-center">
		{{$sup->links()}}
	</div>
</div>
</div>
@endsection