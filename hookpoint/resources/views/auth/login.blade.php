@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<section class="login-section">
    <div class="login-card">

        <div class="login-left slide-left"></div>

        <div class="login-right slide-right">

            <h2>Login HookPoint</h2>

            {{-- SESSION ERROR / STATUS --}}
            @if (session('status'))
                <div class="error-box">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="error-box">
                    {{ session('error') }}
                </div>
            @endif

            {{-- FORM LOGIN --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email"
                       required
                       autofocus>

                @error('email')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- PASSWORD -->
                <label>Password</label>
                <input type="password"
                       name="password"
                       placeholder="Masukkan password"
                       required>

                @error('password')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <!-- Forgot Password -->
                <div style="margin-top:-20px;">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size: 12px; color:#2f7a4d;">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- REMEMBER -->
                <div style="margin-bottom: 10px;">
                    <label style="font-size: 14px;">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                </div>

                <!-- BUTTON -->
                <button type="submit">Login</button>

                <!-- LINK REGISTER -->
                <p>
                    Belum punya akun?
                    <a href="/register">Register</a>
                </p>

            </form>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    setTimeout(() => {
        const errorBox = document.querySelector('.error-box');
        if (errorBox) {
            errorBox.style.display = 'none';
        }
    }, 3000);
</script>
@endsection
