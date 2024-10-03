<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @switch(true)
        @case(request()->routeIs('landing-home'))
            BERANDA
        @break

        @case(request()->routeIs('sanitasi'))
            SANITASI
        @break

        @case(request()->routeIs('air-bersih'))
            AIR BERSIH
        @break

        @case(request()->routeIs('import'))
            IMPORT DATA
        @break
    @endswitch
    </title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-size: 14px;
            background-color: #F5F5F5;
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }

        .sidebar {
            height: 100vh;
            width: 80px;
            /* Lebar sidebar tetap */
            position: fixed;
            /* Tetap di posisi */
            top: 0;
            left: 0;
            z-index: 1050;
            background-color: #343a40;
            /* Warna sidebar */
            padding-top: 20px;
            overflow-y: auto;
        }

        .content {
            margin-left: 300px;
            /* Tambahkan margin agar ada jarak dengan sidebar */
            padding: 20px;
            position: relative;
        }

        html,
        body {
            width: 100%;
            overflow-x: hidden;
        }

        img,
        table {
            max-width: 100%;
            height: auto;
        }


        .sidebar .nav-link {
            text-align: center;
            /* Pusatkan ikon */
            padding: 15px 0;
        }

        .mask-custom {
            position: relative;
            display: inline-block;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(8px);
            background-color: rgba(var(--bs-primary-rgb), 0.4);
            display: flex;
            justify-content: center;
            /* Mengatur teks ke tengah secara horizontal */
            align-items: center;
            /* Mengatur teks ke tengah secara vertikal */
            color: white;
            /* Warna teks */
            font-size: 24px;
            /* Ukuran teks */
            font-weight: bold;
            /* Ketebalan teks */
            text-align: center;
        }

        #map {
            display: block;
            width: 100%;
            height: auto;
        }

        .centered-text {
            z-index: 1;
            pointer-events: none;
            /* Agar teks tidak menghalangi interaksi dengan gambar */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                /* Full width in mobile view */
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
                /* Hilangkan margin di mobile view */
            }
            .w-sm-100 {
                width: 100% !important;   
            }
        }
    </style>
    @livewireStyles
</head>

<body>
    <!-- Sidebar -->
    @include('layouts.landing-page.navbar')
    <!-- Sidebar -->

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>
    <!-- Content -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>
    @livewireScripts
</body>

</html>
