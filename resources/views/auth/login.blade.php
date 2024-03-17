@extends('layouts.authLayouts.app')

@section('content')
<div class="container py-5 my-auto">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 offset-lg-1 mx-auto">
            <!-- Card -->
            <div class="card">
                <!-- Card Body -->
                <div class="card-body p-4 p-lg-7">
                    <h2 class="text-primary"><a href="{{ route('index')}}">Si Poni Putih</a></h2>
                    <p class="text-muted mb-4">Masuk dengan akun anda.</p>

                    <!-- Sign in Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Email -->

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Password -->

                        <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">Masuk</button>

                        <p class="text-center mt-5">
                        Belum memiliki akun?
                            <a class="font-weight-semi-bold" href="{{ route('register') }}">Daftar disini</a>
                        </p>
                    </form>
                    <!-- End Sign in Form -->
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
