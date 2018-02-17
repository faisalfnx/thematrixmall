@extends('layouts.index')
<title>{{$sup->namatoko}}</title>
@section('content')
<center>
	<div class="col-md-5">
		<div class="card">
			<div class="card-body">
				<h4 style="text-align: left;">Welcome to , {{$sup->namatoko}} Store</h4>
				<hr>
				<label class="float-left">Kami siap melayani anda , {{Auth::user()->name}}</label><br>
				<label class="float-left">Slogan kami : {{$sup->slogantoko}}</label>
				<label class="float-left">Alamat Kami : {{$sup->alamat}}</label>
			</div>
		</div>
	</div>
</center>
<br>
<hr>
<center>
	<h3>Inilah Produk - Produk Kami</h3>
</center>
<hr>
<?php
	$jenisproduk = \App\JenisProduk::where('jenistoko',$sup->jenistoko)->get();
?>
<br>

<div class="container">
	<div class="row justify-content-md-center" >
		<?php
		$produk = \App\Produk::where('kodesupplier',$sup->codeuser)->paginate(5);
		?>
		@foreach($produk as $q)
		@if($q->status == 'TRUE' && $q->stok != 0)
		<div class="col-md-2 form-group">
			<div class="card">
				<div class="card-body">
					<hr>
					<center>
						<h5>{{$q->namaproduk}}</h5>
						<hr>
						<label style="font-size: 11px;">Jenis Produk : {{$q->jenisproduk}}
						</label><br>
						<label style="font-size: 11px;">Rp. {{$q->hargaproduk}} / Pcs</label><br>
						<label style="font-size: 11px;">Stok : {{$q->stok}} Pcs</label>
						<hr>
						<a href="{{url('costumer/transaksi/'.$q->id)}}" class="btn btn-success">Beli</a>
					</center>
				</div>
			</div>
		</div>
		@elseif($produk == null && $produk->status == 'FALSE' && $produk->stok == 0)
		Supplier Belom ada Produk
		@endif
		@endforeach		
	</div>
	<div class="row justify-content-md-center">
		{{$produk->links()}}
	</div>
</div>

@endsection