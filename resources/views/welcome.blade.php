@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-5 text-center" style="max-width: 500px;">
            <h1 class="mb-4 fw-bold">Selamat Datang</h1>
            <p class="text-muted mb-4">
                ini adalah aplikasi kasir yang dibuat untuk kasir dan ya benar kasir .
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                Login
            </a>
        </div>
    </div>
</body>
</html>

@endsection