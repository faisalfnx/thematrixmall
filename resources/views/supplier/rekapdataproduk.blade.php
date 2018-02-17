<center>
	<h1>Rekap Data Produk</h1>
</center>

@foreach($prod as $q)
<?php
	$name = \App\User::where('id',$q->codeuser)->value('name');
	$username = \App\User::where('id',$q->codeuser)->value('username');
	$jenistoko = \App\JenisToko::where('id',$q->jenistoko)->value('namajenis');
	$jenisproduk = \App\JenisProduk::where('id',$q->jenisproduk)->value('type');
?>
<hr>
Kode Produk : {{$q->kodeproduk}}
Kode Supplier : {{$q->kodesupplier}} | {{$name}} <br>
Jenis Produk : {{$jenisproduk}} <br>
Nama Produk : {{$q->namaproduk}} <br>
Stok : {{$q->stok}} <br>
<hr>
@endforeach