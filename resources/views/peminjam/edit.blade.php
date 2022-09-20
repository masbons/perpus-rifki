@extends('peminjam.layout')

@section('content')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 borde-bottom">
    <h1 class="h2">Edit buku</h1>
</div>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a href="{{ route('peminjams.index') }}" class="btn btn-primary btn-sm">Kembali</a>
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
<form action="{{ route('peminjams.update',$peminjam->id) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nama:</strong>
                <input type="text" name="nama" class="form-control" value="{{ old('nama',$peminjam->nama) }}" autofocus>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id buku:</strong>
                <input type="text" name="id_buku" class="form-control" value="{{ old('id_buku',$peminjam->id_buku) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id anggota:</strong>
                <input type="text" name="id_anggota" class="form-control" value="{{ old('id_anggota',$peminjam->id_anggota) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tanggal pinjam:</strong>
                <input type="text" name="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam',$peminjam->tanggal_pinjam) }}">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tanggal kembali:</strong>
                <input type="text" name="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali',$peminjam->tanggal_kembali) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>denda:</strong>
                <input type="text" name="denda" class="form-control" value="{{ old('denda',$peminjam->denda) }}">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status:</strong>
                <input type="text" name="status" class="form-control" value="{{ old('status',$peminjam->status) }}">
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>
@endsection
