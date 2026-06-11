@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{ $title }}</h6>
            <a href="/penerbit" class="btn btn-primary btn-sm">
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="/penerbit/{{ $penerbit->id }}/update" method="post">
                @csrf
                @method('put')
                <div class="row justify-content-center">
                    <div class="form-group col-12 col-md-6">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control form-control-user @error('penerbit') is-invalid @enderror"
                            id="penerbit" name="penerbit" value="{{ old('penerbit', $penerbit->penerbit) }}" autofocus>
                        @error('penerbit')
                            <div class="invalid-feedback mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
