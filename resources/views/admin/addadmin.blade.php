@extends('layouts.admin')
<title>Add Admin</title>
@section('content')
<div class="container">
<h1>Form Admin</h1>
<hr>
<form method="POST" action="{{url('admin/post')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Nama" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Password" required>
  </div>

  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection