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
            @if ($profile->role === 'user')
                <a href="/pengajuan/create" class="btn btn-primary btn-sm">
                    <span class="text">Tambah</span>
                </a>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Pengajuan</th>
                            @if ($profile->role === 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $pengajuan)
                            <tr>
                                <td>{{ $pengajuan->user->nama }}</td>
                                <td>{{ $pengajuan->buku->judul }}</td>
                                <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                                @if ($profile->role === 'admin')
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#actionModal" data-method="put" data-title="setujui"
                                            data-action="/pengajuan/{{ $pengajuan->id }}/update">
                                            Setujui
                                        </button>

                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#actionModal" data-method="put" data-title="batal"
                                            data-action="/pengajuan/{{ $pengajuan->id }}/batal">
                                            Batal
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
