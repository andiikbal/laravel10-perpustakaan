<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    @include('layout/partials/link_css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layout/partials/sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layout/partials/topbar')

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('layout/partials/footer')
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layout/partials/logout_modal')

    @stack('actionModal')

    @include('layout/partials/link_js')

    @stack('scripts')
</body>

</html>
