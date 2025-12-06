@extends('layouts.app')

@section('content')

<style>
    .welcome-title {
        animation: fadeDown 1s ease-in-out;
    }

    .welcome-sub {
        animation: fadeUp 1.2s ease-in-out;
    }

    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">

    <div class="card shadow-lg border-0 p-5 text-center" 
         style="max-width: 520px; border-radius: 22px; background: linear-gradient(135deg, #ffffff, #eef4ff);">

        <h1 class="fw-bold mb-3 welcome-title" style="font-size: 2.3rem;">
            👋 Selamat Datang!
        </h1>

        <p class="text-secondary mb-4 fs-5 welcome-sub">
            Aplikasi kasir HoyoPlay Kaisr untuk mempermudah transaksi kamu.  
            Cepat, simpel, dan nyaman digunakan setiap hari.
        </p>

        <a href="{{ route('login') }}" 
           class="btn btn-primary btn-lg px-5 py-2 fs-5 shadow-sm">
            Mulai Sekarang
        </a>

        <div class="mt-4 text-primary fw-semibold welcome-sub" style="font-size: 1.1rem;">
            🚀 Siap membantu operasional kasirmu! dan buat gacha anda menjadi lancar
        </div>

    </div>

</div>

@endsection
