<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> HoyoPlay Kasir </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: #f5f7fb;
        }

        .navbar {
            background: white !important;
            border-bottom: 1px solid #e5e7eb;
        }

        .menu-container {
            background: white;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .menu-btn {
            margin-right: 8px;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    HoyoPlay Kasir
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold" href="#"
                                    role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="menu-container">
                    <a href="{{ route('home') }}" wire:navigate
                        class="btn menu-btn {{ request()->routeIs('home') ? 'btn-primary' : 'btn-outline-primary' }}">Beranda</a>
                    <a href="{{ route('user') }}" wire:navigate
                        class="btn menu-btn {{ request()->routeIs('user') ? 'btn-primary' : 'btn-outline-primary' }}">Pengguna</a>
                    <a href="{{ route('produk') }}" wire:navigate
                        class="btn menu-btn {{ request()->routeIs('produk') ? 'btn-primary' : 'btn-outline-primary' }}">Produk</a>
                    <a href="{{ route('transaksi') }}" wire:navigate
                        class="btn menu-btn {{ request()->routeIs('transaksi') ? 'btn-primary' : 'btn-outline-primary' }}">Transaksi</a>
                    <a href="{{ route('laporan') }}" wire:navigate
                        class="btn menu-btn {{ request()->routeIs('laporan') ? 'btn-primary' : 'btn-outline-primary' }}">Laporan</a>
                </div>

                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
