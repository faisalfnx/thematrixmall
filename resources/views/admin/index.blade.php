@extends('layouts.admin')
<title>Dashboard Admin</title>
@section('content')
<div class="container">
<div class="row">
	<h1>List Supplier <br><br> <a href="{{url('admin/rekapdatasupplier')}}" class="btn btn-primary">Rekap Data</a></h1>
  
 <table class="table">
  <thread>
  <tr style="text-align: center; font-size: 12px;">
  	<th>Nama Supplier</th>
    <th>Code</th>
  	<th>Akses</th>
  	<th>Nama Toko</th>
  	<th>Alamat</th>
  	<th>Email</th>
  	<th>Jenis Toko</th>
  	<th>Slogan</th>
  	<th>Foto Header</th>
  	<th colspan="3">Action</th>
  	</tr>
  </thread>
  <tbody>
  	@foreach($sup as $supplier)

  <?php
	$namatoko = \App\Supplier::where('codeuser',$supplier->id)->value('namatoko');
	$alamat = \App\Supplier::where('codeuser',$supplier->id)->value('alamat');
	$email = \App\Supplier::where('codeuser',$supplier->id)->value('email');
	$jenistoko = \App\Supplier::where('codeuser',$supplier->id)->value('jenistoko');
	$slogantoko = \App\Supplier::where('codeuser',$supplier->id)->value('slogantoko');
	$sampultoko = \App\Supplier::where('codeuser',$supplier->id)->value('sampultoko');
	$buktipembayaran = \App\BuktiPembayaran::where('id_user',$supplier->id)->value('bukti');

	?>
  <tr style="text-align: center;font-size: 12px;">
  	<td>{{$supplier->name}}</td>
    <td>{{$supplier->username}}</td>
  	<td>@if($supplier->role == 2) Supplier @else Not @endif </td>
  	<td>{{$namatoko}}</td>
  	<td>{{$alamat}}</td>
  	<td>{{$email}}</td>
  	<td>{{$jenistoko}}</td>
  	<td>{{$slogantoko}}</td>
  	<td><img src="{{url('images/'.$sampultoko)}}" style="width: 20px;height: 20px;"></td>
    <td>
    @if($supplier->approved != 2)
    <a style="font-size: 10px;" href="{{url('images/'.$buktipembayaran)}}" class="btn btn-info">Bukti</a>
    <a style="font-size: 10px;" href="{{url('admin/approved/supplier/'.$supplier->id)}}" 
      class="btn btn-danger">Approved</a>
    
    @else
    <button class="btn btn-success" disabled style="font-size: 10px;">Verified</button>
    @endif
    <a href="{{url('admin/delete/supplier/'.$supplier->id)}}" class="btn btn-warning" style="color: white;font-size: 10px;" onclick="return confirm('anda yakin untuk menghapusnya ?')">Delete</a>
    </td>
  	</tr>
  	@endforeach
  </tbody>
  </table>
</div>
</div>
</div>
@endsection

