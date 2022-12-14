@extends('book.layout')

@section('content')

<div class="row" style="margin-top: 1rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('books.create') }}" class="btn btn-primary btm-sm">Create Buku</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/pdf-book') }}" class="btn btn-danger">Export PDF</a>
            <table class="table table-striped mt-5">
                <thead>
                  <tr>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="id" width="100%" cellspacing="0">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>
                                <th width="280px">Sinopsis</th>
                                <th>Sampul</th>
                                <th width="300px">Action</th>
                            </tr>
                            @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->tahun_terbit }}</td>
                                <td>{{  @$value->writer->nama }}</td>
                                <td>{{  @$value->penerbit->nama }}</td>
                                <td>{{ @$value->kategori->nama }}</td>
                                <td>{{ $value->sinopsis }}</td>
                                <td><img src="/image/{{ $value->image }}" width="100px"></td>
                                <td>
                                    <form action="{{ route('books.destroy',$value->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('books.show',$value->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('books.edit',$value->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            {!! $data->links() !!}
            @endsection
