@extends('layout.main')

@section('content')
    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: 'Sukses',
                text: '{{ session('success') }}',
                icon: 'success',
            });
        </script>
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
                            <th>Peminjaman</th>
                            @if ($profile->role === 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($peminjamans as $peminjaman)
                            <tr>
                                <td>{{ $peminjaman->user->nama }}</td>
                                <td>{{ $peminjaman->buku->judul }}</td>
                                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                @if ($profile->role === 'admin')
                                    <td>
                                        {{-- <form action="/peminjaman/{{ $peminjaman->id }}/update" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success btn-sm">Pengembalian</button>
                                        </form> --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#actionModal" data-method="put" data-title="pengembalian"
                                            data-action="/peminjaman/{{ $peminjaman->id }}/update">
                                            Pengembalian
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('actionModal')
    @include('layout.partials.action_modal')
@endpush

@push('scripts')
    <script src="{{ asset('js/action-modal.js') }}"></script>
@endpush
