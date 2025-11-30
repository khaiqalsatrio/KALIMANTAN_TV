<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap"
        rel="stylesheet">

    @include('admin.layout.styles')
    @include('admin.layout.scripts')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <section class="section">
                <div class="container container-login">
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary border-box">
                                <div class="card-header card-header-auth">
                                    <h4 class="text-center">Admin Panel Login</h4>
                                </div>
                                <div class="card-body card-body-auth">
                                    @if(session()->get('success'))
                                    <div class="text-success"> {{ session()->get('success') }} </div>
                                    @endif
                                    <form method="POST" action="{{ route('admin_login_submit') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email"
                                                placeholder="Email Address"
                                                value="{{ old('email') }}"
                                                autofocus>
                                            @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password"
                                                placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(session('login_error'))
                                        <div class="text-danger mb-3">{{ session('login_error') }}</div>
                                        @endif
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Login
                                        </button>
                                        <div class="mt-3">
                                            <a href="{{ route('admin_forget_password') }}">Forget Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('admin.layout.scripts_footer')

</body>

</html>