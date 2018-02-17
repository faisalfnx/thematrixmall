@extends('layouts.admin')
<title>Edit Admin</title>
@section('content')
<div class="container">
<h1>Form Admin</h1>
<hr>
<form method="POST" action="{{url('admin/update')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Nama" value="{{$admin->name}}" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputEmail1" 
    aria-describedby="emailHelp" placeholder="Masukan Password" value="*******" required>
  </div>

  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="id" value="{{$admin->id}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection