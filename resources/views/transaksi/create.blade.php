@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah {{ $title }}</h6>
            <a href="/pengajuan" class="btn btn-primary btn-sm">
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="/pengajuan/store" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-user"
                            value="{{ old('nama', $profile->nama) }}" readonly>
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="buku">Buku</label>
                        <select name="buku" id="buku"
                            class="form-control form-control-user @error('buku') is-invalid @enderror">
                            <option value="">Pilih Buku</option>
                            @foreach ($bukus as $buku)
                                <option value="{{ $buku->id }}" {{ $buku->id == old('buku') ? 'selected' : '' }}>
                                    {{ $buku->judul }} ({{ $buku->penulis }} -
                                    {{ $buku->penerbit->penerbit }})
                                </option>
                            @endforeach
                        </select>
                        @error('buku')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
