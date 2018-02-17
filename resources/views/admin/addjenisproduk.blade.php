@extends('layouts.admin')
<title>Add Jenis Produk</title>
@section('content')
<div class="container">
	<h1>Form Jenis Produk</h1>
	<hr>
	<form method="POST" action="{{url('admin/post/jenisproduk')}}">

		<div class="form-group">
			<label for="exampleInputEmail1">Jenis Toko</label>
			<select class="form-control" name="jenistoko">
				<option>Pilih Satu</option>
				@foreach($jenistoko as $q)
				<option value="{{$q->id}}">{{$q->namajenis}}</option>
				@endforeach
			</select>
		</div>


		<div class="form-group">
			<label for="exampleInputEmail1">Jenis Produk</label>
			<input type="text" class="form-control" name="type" id="exampleInputEmail1" 
			aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" required>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection