@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah {{ $title }}</h6>
            <a href="/pengguna" class="btn btn-primary btn-sm">
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="/pengguna/store" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ old('nama') }}" autofocus>
                        @error('nama')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control form-control-user @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                            cols="30" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control form-control-user @error('no_hp') is-invalid @enderror"
                            id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
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
