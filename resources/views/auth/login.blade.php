<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center d-flex min-vh-100">
            <div class="col-12 col-md-9 col-lg-6 col-xl-5">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-4 p-lg-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>

                                    {{-- Pesan Error --}}
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger mb-3" role="alert">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif

                                    {{-- Pesan Sukses --}}
                                    @if (session()->has('success'))
                                        <div class="alert alert-success mb-3" role="alert">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="/login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="email" id="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="Enter Email Address..."
                                                autofocus>
                                            @error('email')
                                                <div class="invalid-feedback mx-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Password">
                                            @error('password')
                                                <div class="invalid-feedback mx-3">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
