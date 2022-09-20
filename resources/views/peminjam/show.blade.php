@extends('peminjam.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> SHOW</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('peminjams.index') }}"> Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>nama:</strong>
            {{ $peminjam->nama }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tahun Terbit:</strong>
            {{ $peminjam->id_buku }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Anggota:</strong>
            {{ $peminjam->id_anggota }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Penerbit:</strong>
            {{ $peminjam->tanggal_Pinjam }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kategori:</strong>
            {{ $peminjam->tanggal_Kembali }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Denda:</strong>
            {{ $peminjam->denda }}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {{ $peminjam->status }}
        </div>
    </div>
    @endsection