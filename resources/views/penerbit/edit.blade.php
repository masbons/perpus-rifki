@extends('penerbit.layout')

@section('content')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 borde-bottom">
    <h1 class="h2">Edit Penerbit</h1>
</div>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a href="{{ route('penerbits.index') }}" class="btn btn-primary btn-sm">Kembali</a>
</div>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="card-body">
<form action="{{ route('penerbits.update',$penerbit->id) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penerbit:</strong>
                <input type="text" name="nama" class="form-control" value="{{ old('nama',$penerbit->nama) }}" autofocus>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat',$penerbit->alamat) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telepon:</strong>
                <input type="text" name="telepon" class="form-control" value="{{ old('telepon',$penerbit->telepon) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="text" name="email" class="form-control" value="{{ old('email',$penerbit->email) }}">
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>
@endsection