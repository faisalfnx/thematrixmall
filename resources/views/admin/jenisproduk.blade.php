@extends('layouts.admin')
<title>Jenis Produk</title>
@section('content')
<div class="container">
	<a href="{{url('admin/add/jenisproduk')}}" class="float-right btn btn-primary" style="text-align: center;font-size: 12px;">Tambah Data</a>
	<h1>Jenis Produk</h1>
	<table class="table">
  <thead>
    <tr style="text-align: center;font-size: 12px;">
      <th scope="col">Jenis Toko</th>
      <th scope="col">Jenis Produk</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($jenisproduk as $q)
    <?php 
      $jenistoko = \App\JenisToko::where('id',$q->jenistoko)->value('namajenis');
     ?>
    <tr style="text-align: center;font-size: 12px;">
      <td>{{$jenistoko}}</td>
      <td>{{$q->type}}</td>
      <td>
      	<a href="{{url('admin/edit/jenisproduk/'.$q->id)}}"  
      		class="btn btn-warning" style="text-align: center;font-size: 12px;color: white;">Edit</a>
      	<a href="{{url('admin/delete/jenisproduk/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" class="btn btn-danger" style="text-align: center;font-size: 12px;">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection