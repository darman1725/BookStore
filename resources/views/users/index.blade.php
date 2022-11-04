@extends('layouts.main')

@section('title', 'Data Buku')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="text-align: center">Detail Data Pengguna</h1>
    <br>
    <table class="table" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <th scope="row">{{$key+ 1}}</th>
                <td>{{ $item->username }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection
