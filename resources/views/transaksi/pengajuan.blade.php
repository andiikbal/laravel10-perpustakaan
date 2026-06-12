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

    {{-- Pesan Warning --}}
    @if (session()->has('warning'))
        <script>
            Swal.fire({
                title: 'Warning',
                text: '{{ session('warning') }}',
                icon: 'warning',
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
                                        <form action="/pengajuan/{{ $pengajuan->id }}/update" method="post"
                                            class="d-inline" id="setujui-pengajuan-form-{{ $pengajuan->id }}">
                                            @csrf
                                            @method('put')
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="return confirmSetujuiPengajuan('{{ $pengajuan->id }}')">
                                                Setujui
                                            </button>
                                        </form>

                                        <form action="/pengajuan/{{ $pengajuan->id }}/batal" method="post" class="d-inline"
                                            id="batal-pengajuan-form-{{ $pengajuan->id }}">
                                            @csrf
                                            @method('put')
                                            <button type="button" class="btn btn-warning btn-sm"
                                                onclick="return confirmBatalPengajuan('{{ $pengajuan->id }}')">
                                                Batal
                                            </button>
                                        </form>

                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#actionModal" data-method="put" data-title="setujui"
                                            data-action="/pengajuan/{{ $pengajuan->id }}/update">
                                            Setujui
                                        </button> --}}

                                        {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#actionModal" data-method="put" data-title="batal"
                                            data-action="/pengajuan/{{ $pengajuan->id }}/batal">
                                            Batal
                                        </button> --}}
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


@push('scripts')
    <script>
        // Fungsi untuk mengonfirmasi setujui pengajuan
        function confirmSetujuiPengajuan(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang telah disetujui tidak dapat diubah statusnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form sesuai dengan id yang dikirim
                    document.getElementById('setujui-pengajuan-form-' + id).submit();
                }
            })
        }


        // Fungsi untuk mengonfirmasi batal pengajuan
        function confirmBatalPengajuan(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang telah dibatalkan tidak dapat diubah statusnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Batalkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form sesuai dengan id yang dikirim
                    document.getElementById('batal-pengajuan-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
