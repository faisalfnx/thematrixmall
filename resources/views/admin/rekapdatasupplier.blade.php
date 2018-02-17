<center>
	<h1>Rekap Data Supplier</h1>
</center>

@foreach($sup as $q)
<?php
	$name = \App\User::where('id',$q->codeuser)->value('name');
	$username = \App\User::where('id',$q->codeuser)->value('username');
	$jenistoko = \App\JenisToko::where('id',$q->jenistoko)->value('namajenis');
?>
<hr>
Nama Supplier : {{$name}} <br>
Code Username : {{$username}} <br>
Akses : Supplier <br>
Nama Toko : {{$q->namatoko}} <br>
Alamat : {{$q->alamat}} <br>
Email : {{$q->email}} <br>
Jenis Toko : {{$jenistoko}} <br>
Slogan : {{$q->slogantoko}}
<hr>
@endforeach