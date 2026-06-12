@extends('layout.main')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    {{-- Pesan Warning --}}
    @if (session()->has('warning'))
        <script>
            Swal.fire({
                title: "Warning",
                text: '{{ session()->get('warning') }}',
                icon: 'warning',
            });
        </script>
    @endif
@endsection
