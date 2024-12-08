@extends('layouts.authLayouts.app')

@section('content')
<div class="container py-5 my-auto">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 offset-lg-1 mx-auto">
            <!-- Card -->
            <div class="card">
                <!-- Card Body -->
                <div class="card-body p-4 p-lg-7">
                    <h2 class="text-primary"><a href="{{ route('index')}}">Si Dapa</a></h2>
                    <p class="text-muted mb-4">Isi data sesuai identitas anda.</p>

                    <!-- Create Account Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- NIK & BPJS -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="nik">NIK</label>
                                <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                                
                                @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="bpjs">Nomor BPJS</label>
                                <input id="bpjs" type="number" class="form-control @error('no_bpjs') is-invalid @enderror" name="no_bpjs" value="{{ old('no_bpjs') }}" autocomplete="no_bpjs" autofocus>
    
                                @error('no_bpjs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End NIK & BPJS -->

                        <!-- Medical Records & Name -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="record">Nomor Rekam Medis</label>
                                <input id="record" type="number" class="form-control @error('no_medical_records') is-invalid @enderror" name="no_medical_records" value="{{ old('no_medical_records') }}" autocomplete="no_medical_records" autofocus>
    
                                @error('no_medical_records')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Medical Records & Name -->

                        <!-- Birthdate & Gender -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="birthdate">Tanggal Lahir</label>
                                <input id="birthdate" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
    
                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="gender">Jenis Kelamin</label>
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                                    <option value="male">Laki laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Birthdate & Gender -->

                         <!-- Address -->
                         <div class="form-group">
                            <label for="address">Alamat</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Address -->

                         <!-- Complaint -->
                         <div class="form-group">
                            <label for="complaint">Keluhan</label>
                            <input id="complaint" type="text" class="form-control @error('complaint') is-invalid @enderror" name="complaint" value="{{ old('complaint') }}" required autocomplete="complaint" autofocus>

                            @error('complaint')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Complaint -->

                         <!-- Phone & Email -->
                         <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="phone">Nomor Telepon ( gunakan kode 62 diawal nomor )</label>
                                <input id="phone" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus placeholder="628xxxxx">
                                
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Alamat Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Phone & Email -->

                        <!-- Password -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="password">Buat Kata Sandi</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="password-confirm">Konfirmasi Kata Sandi</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">    
                            </div>
                        </div>
                        <!-- End Password -->

                        <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">Simpan</button>

                        <p class="text-center mt-5">
                            Sudah memiliki akun Si Dapa?
                            <a class="font-weight-semi-bold" href="{{ route('login') }}">Masuk Sekarang</a>
                        </p>
                    </form>
                    <!-- End Create Account Form -->
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
