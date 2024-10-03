<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/app-dark.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">

    @stack('styles')
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->roleName }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('assets/compiled/jpg/1.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li><a class="dropdown-item" href="{{ url('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            Logout</a>

                                        <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                @yield('content')
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ today()->format('Y') }} &copy; Visualisasi Data Persebaran Rumah Kota Semarang</p>
                    </div>
                    <div class="float-end">
                        <p>dibuat dengan <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span> di
                            Yogyakarta
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script>
        @if (Session::has('success'))
            var message = "{{ Session::get('success') }}"
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast()
        @endif

        @if (Session::has('error'))
            var message = "{{ Session::get('error') }}"
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(25deg,#d64c7f,#ee4758 50%)",
            }).showToast()
        @endif
    </script>
    @stack('scripts')
</body>

</html>
