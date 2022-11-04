@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-12">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h3 class="font-weight-bold">Halo, {{Auth::user()->name}}. Selamat datang di Sistem Informasi Toko Buku Polinema.</h3>
                    <h5>Silahkan lengkapi data profil kamu sebelum menggunggah berkas.</h5>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
