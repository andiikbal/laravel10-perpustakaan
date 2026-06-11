@extends('layout.main')

@section('content')
    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        {{-- <div class="alert alert-success mb-2" role="alert">
            {{ session()->get('success') }}
        </div> --}}

        <script>
            Swal.fire({
                title: "Sukses",
                text: '{{ session()->get('success') }}',
                icon: 'success',
            });
        </script>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center mb-3">
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <img class="img-thumbnail" src="{{ asset('storage/users/' . $profile->photo) }}" alt="Photo Profile">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama"
                        value="{{ $profile->nama }}" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control form-control-user" id="email" name="email"
                        value="{{ $profile->email }}" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control form-control-use" name="alamat" id="alamat" cols="30" rows="3" readonly>{{ $profile->alamat }}</textarea>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="no_hp">No. HP</label>
                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp"
                        value="{{ $profile->no_hp }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="/my-profile/edit" class="btn btn-success">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
