@extends('peminjam.admin.admin')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku Perpustakaan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>


@include('peminjam/admin/header')
@include('peminjam/admin/sidebar')
@include('peminjam/admin/footer')

<div class="container">
    @yield('content')


    
</div>

</body>
</html>
@endsection