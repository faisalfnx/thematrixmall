@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Daftar Supplier</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('daftarsupplier/post') }}" 
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama Supplier</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="namatoko" class="col-md-4 col-form-label text-md-right">Nama Toko</label>

                        <div class="col-md-6">
                            <input id="namatoko" type="text" class="form-control{{ $errors->has('namatoko') ? ' is-invalid' : '' }}" name="namatoko" value="{{ old('namatoko') }}" required autofocus>

                            @if ($errors->has('namatoko'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('namatoko') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                        <div class="col-md-6">
                            <textarea id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus></textarea>

                            @if ($errors->has('alamat'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">                        
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div> 
                    </div>

                    @if ($emailsudahada==null)
                    @else
                    <div class="form-group row">                        
                        <label for="email" class="col-md-12 col-form-label alert alert-warning">
                            <center>{{ $emailsudahada }}</center>
                        </label>                        
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="jenistoko" class="col-md-4 col-form-label text-md-right">Jenis Toko</label>

                        <div class="col-md-6">
                            <select class="form-control" name="jenistoko" required>
                                <option selected>Pilih Satu</option>
                                @foreach($jenistoko as $q)
                                <option value="{{$q->id}}">{{$q->namajenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slogantoko" class="col-md-4 col-form-label text-md-right">Slogan Toko</label>

                        <div class="col-md-6">
                            <input id="slogantoko" type="text" class="form-control{{ $errors->has('slogantoko') ? ' is-invalid' : '' }}" name="slogantoko" value="{{ old('slogantoko') }}" required autofocus>

                            @if ($errors->has('slogantoko'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('slogantoko') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sampultoko" class="col-md-4 col-form-label text-md-right">Foto Header</label>

                        <div class="col-md-6">
                            <input id="sampultoko" type="file" class="form-control{{ $errors->has('sampultoko') ? ' is-invalid' : '' }}" name="sampultoko" value="{{ old('sampultoko') }}" required autofocus>

                            @if ($errors->has('sampultoko'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('sampultoko') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
