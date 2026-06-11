@extends('layout.main')

@section('content')
    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success mb-2" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data {{ $title }}</h6>
            <a href="/pengguna/create" class="btn btn-primary btn-sm">
                <span class="text">Tambah</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>
                                    <a href="/pengguna/{{ $user->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#actionModal" data-method="delete"
                                        data-action="/pengguna/{{ $user->id }}">Delete</button>
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
    @include('layout.partials.action_modal')
@endpush

@push('scripts')
    <script src="{{ asset('js/action-modal.js') }}"></script>
@endpush
