@extends('layout.main')

@section('content')
    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: "Sukses",
                text: '{{ session()->get('success') }}',
                icon: 'success',
            });
        </script>
    @endif

    {{-- Pesan Error --}}
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: "Error",
                text: '{{ session()->get('error') }}',
                icon: 'error',
            });
        </script>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data {{ $title }}</h6>
            <div>
                <a href="/penerbit/import" class="btn btn-success btn-icon-split btn-sm">
                    <span class="text">Import</span>
                </a>
                <a href="/penerbit/export" class="btn btn-info btn-icon-split btn-sm">
                    <span class="text">Export</span>
                </a>
                <a href="/penerbit/create" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="text">Tambah</span>
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Penerbit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbits as $penerbit)
                            <tr>
                                <td>{{ $penerbit->penerbit }}</td>
                                <td>
                                    <a href="/penerbit/{{ $penerbit->id }}/edit" class="btn btn-success btn-sm">edit</a>
                                    <form action="/penerbit/{{ $penerbit->id }}" method="post" class="d-inline"
                                        id="delete-form-{{ $penerbit->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="return confirmDelete('{{ $penerbit->id }}')">delete</button>
                                    </form>

                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#actionModal" data-method="delete"
                                        data-action="/penerbit/{{ $penerbit->id }}">
                                        delete
                                    </button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('actionModal')
    @include('layout/partials/action_modal')
@endpush

@push('scripts')
    <script src="{{ asset('js/action-modal.js') }}"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form sesuai dengan id yang dikirim
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
