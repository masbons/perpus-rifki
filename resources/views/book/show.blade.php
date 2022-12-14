@extends('book.layout')

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Data Buku</h2>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 180px">Nama</th>
                <td>{{ $book->nama }}</td>
            </tr>
            <tr>
                <th style="width: 180px">Tahun Terbit</th>
                <td>{{ $book->tahun_terbit }}</td>
            </tr>
            <tr>
                <th style="width: 180px">Penulis</th>
                <td>{{ $book->writer->nama }}</td>
            </tr>
            <tr>
                <th style="width: 180px">Penerbit</th>
                <td>{{ $book->penerbit->nama }}</td>
            </tr>
            <tr>
                <th style="width: 180px">Kategori</th>
                <td>{{ $book->kategori->nama }}</td>
            </tr>
            <tr>

                <tr>
                    <th style="width: 180px">Sinopsis</th>
                    <td>{{ $book->sinopsis }}</td>
                </tr>
                <tr>
                    <th style="width: 180px">Sampul</th>
                    <td><img src="/image/{{ $book->image }}" width="300px"></td>
                </tr>
            </table>
        </div>
    </div>
    @endsection

