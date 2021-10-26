<!DOCTYPE html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }} | Register</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('admin._layouts.css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="d-flex flex-column justify-content-center align-items-center mx-auto">
            <img src="{{ asset('assets/logo.png') }}" alt="Rime Syari Logo" class="w-25 mb-2" style="filter: invert(75%)">
            <h1 class="text-gray-dark">Rime Syari</h1>
        </div>
        <div class="card shadow-sm mt-2">
            <div class="card-body">
                <p class="text-center">Registrasi user baru</p>
                <form method="post" action="{{ route('register') }}" class="m-0 p-0">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nama lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        @error('name')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
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
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block text-center mb-3">
                        <i class="fas fa-user-check"></i> Register
                    </button>

                    <a href="{{ route('login') }}" class="text-center"><p class="pb-0 mb-0">Sudah punya akun?</p></a>
                </form>

            </div>
        </div>
    </div>
    @include('admin._layouts.js')
</body>

</html>
