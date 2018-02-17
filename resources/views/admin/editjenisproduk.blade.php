@extends('layouts.admin')
<title>Edit Jenis Produk</title>
@section('content')
<div class="container">
	<h1>Edit Jenis Produk</h1>
	<hr>
	<form method="POST" action="{{url('admin/update/jenisproduk')}}">

		<div class="form-group">
			<label for="exampleInputEmail1">Jenis Toko</label>
			<select class="form-control" name="jenistoko">
				<option>Isi Ulang</option>
				@foreach($jenistoko as $q)
				<option value="{{$q->id}}">{{$q->namajenis}}</option>
				@endforeach
			</select>
		</div>


		<div class="form-group">
			<label for="exampleInputEmail1">Jenis Produk</label>
			<input type="text" class="form-control" name="type" id="exampleInputEmail1" 
			aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" required value="{{$jenisproduk->type}}">
		</div>
		<input type="hidden" name="id" value="{{$jenisproduk->id}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection