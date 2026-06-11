@extends('layout.main')

@section('content')
    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success d-flex align-items-center mb-2" role="alert">
            <div class="d-flex align-items-center">
                <a href="#" class="btn btn-success btn-circle btn-sm mr-2">
                    <i class="fas fa-check"></i>
                </a>
                {{ session()->get('success') }}
            </div>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data {{ $title }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengembalians as $pengembalian)
                            <tr>
                                <td>{{ $pengembalian->user->nama }}</td>
                                <td>{{ $pengembalian->buku->judul }}</td>
                                <td>{{ $pengembalian->tanggal_pengembalian }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
