@extends('layouts.main')

@section('title', 'Data Buku')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 text-gray-800">Data Buku</h1>
        <a href="{{route('repository.index')}}" class="btn btn-sm btn-outline-scondary shadow-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
    </div>

    <div class="row">
        @if (Session::has('error'))
        <div class="col-12 mb-2">
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        </div>
        @endif

        <div class="col-md-6">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('repository.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul buku..." value="{{ $data->judul }}">
                            @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tipe_id">Jenis Buku</label>
                            <select name="tipe_id" id="tipe_id" class="form-control @error('tipe_id') is-invalid @enderror">
                                <option selected disabled hidden>-- Pilih Jenis Buku --</option>
                                @foreach ($tipes as $item)
                                <option value="{{$item->id}}" {{$item->id == $data->tipe_id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('tipe_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="abstrak">Abstrak</label>
                            <textarea name="abstrak" id="abstrak" cols="30" rows="10" class="form-control @error('abstrak') is-invalid @enderror" placeholder="Masukkan abstrak buku..." value="{{ old('abstrak')}}">{{$data->abstrak}}</textarea>
                            @error('abstrak')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File Buku</label>
                            <small class="form-text text-muted mb-1">*Upload file dengan format PDF dan ukuran file maksimal 5 MB</small>
                            <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf">
                            <small class="form-text text-muted mb-1">*Abaikan upload file jika tidak ingin mengupdate file</small>
                            @error('file')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Preview Buku</h6>
                </div>
                <div class="card-body">
                    <object data="{{asset('dokumen/' . $data->file)}}" type="application/pdf" class="w-100" height="600" id="viewerPdf">
                        <iframe src="https://docs.google.com/viewer?url={{asset('dokumen/' . $data->file)}}&embedded=true"></iframe>
                    </object>
                    <div class="alert alert-danger" role="alert" id="alert-view" style="display: none;"></div>
                    <div id="loading" style="display: none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Proses preview buku..
                    </div>
                    <div style="height:600px;overflow-y:scroll;display: none;" id="pdfViewer" class="w-100"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

    $("#file").on("change", function(e) {
        $('#viewerPdf').hide()
        $('#pdfViewer').show()
        $('#alert-view').hide();

        var file = e.target.files[0]
        if (file.type == "application/pdf") {
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                // Using DocumentInitParameters object to load binary data.
                var loadingTask = pdfjsLib.getDocument({
                    data: pdfData
                });
                $('#loading').show()
                loadingTask.promise.then(function(pdf) {
                    // var pageNumber = 1;
                    $('#loading').hide()
                    for (var i = 1; i <= pdf.numPages; i++) {
                        renderPage(i, pdf);
                    }
                }, function(reason) {
                    // PDF loading error
                    $('#loading').hide()
                    $('#alert-view').show();
                    $('#alert-view').html('Preview buku gagal. Silahkan ulangi input buku.');
                });
            };
            fileReader.readAsArrayBuffer(file);
        }
    });

    function renderPage(pageNumber, pdf) {
        pdf.getPage(pageNumber).then(function(page) {
            var canvasId = 'pdf-viewer-' + pageNumber;
            $('#pdfViewer').append($('<canvas />', {
                'id': canvasId
                , 'class': 'w-100'
            , }));
            var canvas = document.getElementById(canvasId);

            var scale = 1.5;
            var viewport = page.getViewport({
                scale: scale
            });

            // // Prepare canvas using PDF page dimensions
            // var canvas = $("#pdfViewer")[0];
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // // Render PDF page into canvas context
            var renderContext = {
                canvasContext: context
                , viewport: viewport
            };
            var renderTask = page.render(renderContext);
            renderTask.promise.then(function() {
                // console.log('Page rendered');
            });
        });

    }

</script>

@endsection
