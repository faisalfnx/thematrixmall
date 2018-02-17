@extends('layouts.admin')
<title>Admin</title>
@section('content')
<div class="container">
	<a href="{{url('admin/add/')}}" class="float-right btn btn-primary" style="text-align: center;font-size: 12px;">Tambah Data</a>
	<h1>Admin</h1>
	<table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($admin as $q)
    <tr style="text-align: center;font-size: 12px;">
      <td>{{$q->name}}</td>
      <td>{{$q->username}}</td>
      <td>
      	<a href="{{url('admin/edit/'.$q->id)}}" style="color: white;text-align: center;font-size: 12px;" 
      		class="btn btn-warning">Edit</a>
      	<a href="{{url('admin/delete/'.$q->id)}}" style="text-align: center;font-size: 12px;" onclick="return confirm('anda yakin untuk menghapusnya ?')" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection