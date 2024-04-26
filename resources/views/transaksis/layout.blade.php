<!DOCTYPE html>
<html>

<head>
    <title> Warung Sembako </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap
    /4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> --}}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> --}}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Warung Sembako</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <li class="nav-item active">
                    <a class="nav-link" href="penggunas">Pengguna <span class="login"></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="distributors">Distributor <span class="login"></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="mereks">Merek</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="barangs">Barang</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="transaksis">Transaksi</a>
                </li>
            </ul>
        </div>
        <div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                    <p>Welcome <b> {{ Auth::user()->name }}</b></p>
                    {{-- <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a> --}}
                    <a class="btn btn-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i></a>
                @endauth
                @guest
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-info" href="{{ route('register') }}">Register</a>
                @endguest
        </ul>
    </div>
        </div>
</nav>

@yield('content')

</div>
</body>

</html>
