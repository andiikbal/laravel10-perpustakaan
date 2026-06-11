@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Photo {{ $title }}</h6>
        </div>

        <div class="card-body">
            <form action="/my-profile/{{ $profile->id }}/upload" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <img class="img-thumbnail" src="{{ asset('storage/users/' . $profile->photo) }}" alt="Photo Profile">
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror"
                                id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Pilih Foto</label>
                            @error('photo')
                                <div class="invalid-feedback mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="form-group col-12 col-md-6 col-lg-4 mb-0">
                        <button type="submit" class="btn btn-primary btn-block">Upload Foto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{ $title }}</h6>
        </div>

        <div class="card-body">
            <form action="/my-profile/{{ $profile->id }}/update" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ old('nama', $profile->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email', $profile->email) }}">
                        @error('email')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control form-control-use @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                            cols="30" rows="3">{{ old('alamat', $profile->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control form-control-user @error('no_hp') is-invalid @enderror"
                            id="no_hp" name="no_hp" value="{{ old('no_hp', $profile->no_hp) }}">
                        @error('no_hp')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelector('#photo').addEventListener('change', function(e) {
            // Ambil nama file dari input
            let fileName = e.target.files[0].name;
            // Cari label yang terkait dengan input ini
            let nextSibling = e.target.nextElementSibling;
            // Ubah isi teks label menjadi nama file
            nextSibling.innerText = fileName;
        });
    </script>
@endpush
