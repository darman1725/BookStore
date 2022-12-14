@extends('layouts.lp')

@section('title', 'Data Buku')

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>DATA BUKU</h3>
                @if (isset($key))
                <h5>Keywords pencarian : {{$key}}</h5>
                @endif
            </div>
            @if ($repo->isEmpty())
            <div class="col-12">
                <div class="alert alert-danger">
                    Data buku tidak ditemukan.
                </div>
            </div>
            @else
            @foreach ($repo as $item)
            <div class="col-md-6">
                <a href="{{route('lp.detailrepo', $item->id)}}" style="text-decoration: none;">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-4 p-3">
                                <img src="{{asset('img/polinema.png')}}" class="w-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-dark">
                                    <p class="card-text mb-0"><small class="text-muted">{{$item->tipe->name}}</small></p>
                                    <h5 class="card-title">{{$item->judul}}</h5>
                                    <p class="card-text">{{ strlen($item->abstrak) > 40 ? substr($item->abstrak, 0, 40) . '...' : $item->abstrak }}</p>
                                    <p class="card-text"><small class="text-muted">Author : {{$item->user->name}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 my-3 text-center">
                {{$repo->links('vendor.pagination.bootstrap-4')}}
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
