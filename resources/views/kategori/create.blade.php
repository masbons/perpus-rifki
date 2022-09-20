@extends('kategori.layout')

@section('content')

    <h1 class="h2">Create Kategori</h1>


 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm">Kembali</a>
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
    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori:</strong>
                <input type="text" name="nama" class="form-control" placeholder="">
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>
</div>
@endsection
