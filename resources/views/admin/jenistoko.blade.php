@extends('layouts.admin')
<title>Jenis Toko</title>
@section('content')
<div class="container">
	<a href="{{url('admin/add/jenistoko')}}" class="float-right btn btn-primary" style="text-align: center;font-size: 12px;">Tambah Data</a>
	<h1>Jenis Toko</h1>
	<table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Nama Jenis</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($jenistoko as $q)
    <tr style="text-align: center;font-size: 12px;">
      <td>{{$q->namajenis}}</td>
      <td>
      	<a href="{{url('admin/edit/jenistoko/'.$q->id)}}"  
      		class="btn btn-warning" style="text-align: center;font-size: 12px;color: white;">Edit</a>
      	<a href="{{url('admin/delete/jenistoko/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" class="btn btn-danger" style="text-align: center;font-size: 12px;">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection