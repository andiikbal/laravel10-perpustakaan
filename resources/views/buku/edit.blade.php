@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{ $title }}</h6>
            <a href="/buku" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="/buku/{{ $buku->id }}/update" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control form-control-user @error('judul') is-invalid @enderror"
                            id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" autofocus>
                        @error('judul')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control form-control-user @error('penulis') is-invalid @enderror"
                            id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}">
                        @error('penulis')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="penerbit">Penerbit</label>
                        <select name="penerbit" id="penerbit"
                            class="form-control form-control-user @error('penerbit') is-invalid @enderror">
                            <option value="">Pilih Penerbit</option>
                            @foreach ($penerbits as $penerbit)
                                <option value="{{ $penerbit->id }}"
                                    {{ $penerbit->id == old('penerbit', $buku->penerbit_id) ? 'selected' : '' }}>
                                    {{ $penerbit->penerbit }}
                                </option>
                            @endforeach
                        </select>
                        @error('penerbit')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control form-control-user @error('tahun') is-invalid @enderror"
                            id="tahun" name="tahun" value="{{ old('tahun', $buku->tahun) }}">
                        @error('tahun')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
