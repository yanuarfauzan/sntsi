
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In | Sanitasi Semarang</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <div class="bg-image" style="background-image: url('{{ Storage::url('semarang.jpg') }}');
            height: 100vh">
        <div class="container py-2 h-100">
            <div class="d-flex flex-column align-items-end">
                <a href="{{ route('landing-home') }}" class="btn btn-primary mb-3" type="button">
                    login
                </a>

                {{-- <!-- Collapsed content -->
                <div class="card collapse position-absolute" style="top: 50px;" id="collapseExample">
                    <div class="card-body">
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="redirectTo" id="" value="/home">
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form1Example1" name="email" class="form-control" />
                                <label class="form-label" for="form1Example1">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="form1Example2" name="password" class="form-control" />
                                <label class="form-label" for="form1Example2">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block" >Log me
                                in</button>
                        </form>
                    </div>
                </div> --}}


            </div>
            <div class="p-5 text-center d-flex flex-column justify-content-center text-white" style="height: 85%;">
                <span><img src="{{ Storage::url('logo_semarang.png') }}" alt="" style="width: 100px;"></span>
                <h1 class="p-0" style="font-size: 70px;">PEMUKIMAN</h1>
                <h1 class="p-0" style="font-size: 70px;">SANITASI & AIR BERSIH</h1>
                <h1 class="p-0 fw-light">KOTA SEMARANG</h1>
                <div class="d-flex justify-content-center gap-4 mt-4">
                    <span><i class="fas fa-house fa-4x mx-5" style="color: #0D7C66;"></i></span>
                    <span><i class="fas fa-recycle fa-4x mx-5" style="color: #0D7C66;"></i></span>
                    <span><i class="fas fa-faucet fa-4x mx-5" style="color: #0D7C66;"></i></span>
                </div>
            </div>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>
</body>

</html>