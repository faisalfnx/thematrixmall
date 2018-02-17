@extends('layouts.admin')
<title>Add Jenis Toko</title>
@section('content')
<div class="container">
<h1>Form Jenis Toko</h1>
<hr>
<form method="POST" action="{{url('admin/post/jenistoko')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Jenis</label>
    <input type="text" class="form-control" name="namajenis" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Nama Jenis" required>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection