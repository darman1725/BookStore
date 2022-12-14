@extends('layouts.main')

@section('title', 'Data Jenis Buku')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 text-gray-800">Pendataan Kategori Buku</h1>
    </div>

    <div class="row">
        @if (Session::has('success'))
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="col-md-4">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('tipe.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Jenis Kategori</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan kategori buku..." value="{{ old('name')}}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Jenis Buku</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Jenis Kategori</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data->isEmpty())
                                <tr class="text-center">
                                    <td colspan="6">Data masih kosong.</td>
                                </tr>
                                @else
                                @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}</th>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{ route('tipe.edit', $item->id)}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="{{route('tipe.destroy', $item->id)}}" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if (!$data->isEmpty())
                        {{$data->links('vendor.pagination.bootstrap-4')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
