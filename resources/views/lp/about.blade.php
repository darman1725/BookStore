@extends('layouts.lp')

@section('title', 'About Us')

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>About Us</h3>
            </div>
            <div class="col-md-6">
                <img src="{{asset('img/kampus.jpg')}}" width="540" height="400" alt="">
            </div>
            <div class="col-md-6">
                <p>
                    Toko buku daring adalah situs web yang didesain dan dibangun khusus untuk menjual produk-produk berupa buku dan sejenisnya. 
                    Toko buku daring dapat dikunjungi oleh siapapun dari seluruh dunia untuk mencari dan membeli buku-buku yang diinginkan tanpa harus keluar rumah.
                    <br><br>
                    Dapatkan rincian domisili Toko Buku Offline Politeknik Negeri Malang, alamat lengkap dengan berbagai data detil seperti kodepos nomor telepon 
                    dan informasi dijelaskan sebagai berikut. Alamat Resmi Toko Buku Offline Politeknik Negeri Malang berlokasi di kelurahan Tulusrejo, kecamatan 
                    Lowokwaru, kabupaten/kota Kota Malang , Provinsi Jawa Timur.
                    <br><br>
                    Tersedia berbagai macam buku, antara lain :
                    <br> 1. Buku Baca
                    <br> 2. Buku Tulis
                    <br> 3. Buku Hitung
                    <br> 4. Buku IPA
                    <br> 5. Buku IPS
                    <tr> Buku Pembelajaran Kampus dan lainnya
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
