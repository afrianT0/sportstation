<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- CSS --}}
    @include('layouts.css')
</head>

<body>

    <div class="hold-transition login-page">

        <div class="login-box">

            <div class="card">
                <div class="card-body login-card-body rounded">

                    <div class="login-logo">
                        <a href="#"><b>Login</b></a>
                    </div>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="username" id="username" name="username"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    {{-- Script --}}

    @include('layouts.script')

    <script>
        @if (session()->has('loginError'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error('{{ session('loginError') }}');
        @elseif (session()->has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success('{{ session('success') }}');
        @endif
    </script>

</body>

</html>
