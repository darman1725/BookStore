@extends('layouts.lp')

@section('title', 'Contact Us')

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>Contact Us</h3>
            </div>

            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">Nama</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Kode pos</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center">
                            <td>Toko Buku Online - Kampus Polinema</td>
                            <td>(0341) 404424</td>
                            <td>65141</td>
                            <td>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur Nama Nama
                            </td>
                        </tr>
                </table>

                <p>
                    Dapatkan rincian domisili Toko Buku Offline Politeknik Negeri Malang, alamat lengkap dengan berbagai
                    data detil seperti kodepos nomor telepon dan informasi dijelaskan sebagai berikut.
                    Alamat Resmi Toko Buku Offline Politeknik Negeri Malang berlokasi di kelurahan Tulusrejo, kecamatan
                    Lowokwaru, kabupaten/kota Kota Malang , Provinsi Jawa Timur.</p>
                    
            </div>

            <div class="col-12 mb-4">
                <iframe src="https://www.google.com/maps/d/embed?mid=1MtzkdcMs_pChMkasMWzH0f_wKq0&hl=en" class="w-100"
                    height="480"></iframe>
            </div>
        </div>
    </div>
</section>

@endsection