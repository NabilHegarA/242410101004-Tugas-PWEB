@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<section class="register-section">
    <div class="register-card">

        <div class="register-left slide-left"></div>

        <div class="register-right slide-right">

            <h2>Register HookPoint</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <label>Nama Lengkap<span class="required">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                @error('name')  
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- Email -->
                <label>Email<span class="required">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                @error('email')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- No Telepon -->
                <label>No Telepon<span class="required">*</span></label>
                <input type="text" name="no_telepon" placeholder="Masukkan no telepon" value="{{ old('no_telepon') }}">
                @error('no_telepon')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- Password -->
                <label>Password<span class="required">*</span></label>
                <input type="password" name="password" placeholder="Masukkan password" required>
                @error('password')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- Confirm Password -->
                <label>Konfirmasi Password<span class="required">*</span></label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
                @error('password_confirmation')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- Button -->
                <button type="submit">Register</button>

                <!-- Login link -->
                <p>
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </p>

            </form>

        </div>

    </div>
</section>

@endsection
