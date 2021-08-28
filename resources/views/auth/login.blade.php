<!DOCTYPE html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }} | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf_token" content="{{ csrf_token() }}">

    @include('layouts.css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="d-flex flex-column justify-content-center align-items-center mx-auto">
            <img src="{{ asset('assets/logo.png') }}" alt="Rime Syari Logo" class="w-25 mb-2" style="filter: invert(75%)">
            <h1 class="text-gray-dark">Rime Syari</h1>
        </div>
        <div class="card shadow-sm mt-2">
            <div class="card-body">
                <p class="text-center">Silahkan login untuk melanjutkan</p>
                <form method="post" action="{{ url('/login') }}" class="m-0 p-0">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Ingat saya</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary" style="width: 35%">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </button>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                </p>
            </div>
        </div>
    </div>
    @include('layouts.js')
</body>

</html>