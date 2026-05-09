@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<section class="login-section">
    <div class="login-card">
        <div class="login-left slide-left"></div>

        @if(session('error'))
            <div class="error-box">
                {{ session('error') }}
            </div>
        @endif

        <div class="login-right slide-right">
            <h2>Login HookPoint</h2>

            <form method="POST" action="/login">
                @csrf

                <label>Username<span class="required">*</span></label>
                <input type="text" name="username" placeholder="Masukkan Username">
                @error('username')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <label>Password<span class="required">*</span></label>
                <input type="password" name="password" placeholder="Masukkan Password">
                @error('password')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <button type="submit">Login</button>
                <p>Belum punya akun?<a href="/register">Register</a></p>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    setTimeout(() => {
        const toast = document.querySelector('.error-box');
        if (toast) {
            toast.style.display = 'none';
        }
    }, 3000);
</script>
@endpush
