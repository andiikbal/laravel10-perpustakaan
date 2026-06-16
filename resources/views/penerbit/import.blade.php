@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Penerbit {{ $title }}</h6>
            <div>
                <a href="/penerbit" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="text">Kembali</span>
                </a>
            </div>
        </div>

        <div class="card-body">
            <form action="/penerbit/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <a href="/penerbit/download-template" class="btn btn-success btn-block">Download Template</a>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('file') is-invalid @enderror"
                                id="file" name="file"
                                accept=".xlsx, .xls, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            <label class="custom-file-label" for="file">Pilih File</label>
                            @error('file')
                                <div class="invalid-feedback mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="form-group col-12 col-md-6 col-lg-4 mb-0">
                        <button type="submit" class="btn btn-primary btn-block">Upload File</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelector('#file').addEventListener('change', function(e) {
            // Ambil nama file dari input
            let fileName = e.target.files[0].name;
            // Cari label yang terkait dengan input ini
            let nextSibling = e.target.nextElementSibling;
            // Ubah isi teks label menjadi nama file
            nextSibling.innerText = fileName;
        });
    </script>
@endpush
