@extends('peminjam.layout')

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
        <a href="{{ route('peminjams.create') }}" class="btn btn-primary btm-sm">Create Buku</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="id" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>Buku</th>
            <th>Id anggota</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>denda</th>
            <th>Status</th>
            <th width="300px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->id_buku }}</td>
            <td>{{ $value->id_anggota }}</td>
            <td>{{ $value->tanggal_pinjam }}</td>
            <td>{{ $value->tanggal_kembali }}</td>
            <td>{{ $value->denda }}</td>
            <td>{{ $value->status }}</td>
            <td>

            <form action="{{ route('peminjams.destroy',$value->id) }}" method="POST">
     
            <a class="btn btn-info" href="{{ route('peminjams.show',$value->id) }}">Show</a>
      
            <a class="btn btn-primary" href="{{ route('peminjams.edit',$value->id) }}">Edit</a>
     
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
