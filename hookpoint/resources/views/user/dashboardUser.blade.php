@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboardUser.css') }}">
@endsection

@section('content')
<section class="hero">
    <div class="overlay">
        <h1>Selamat Datang di</h1>
        <h2>Reservasi Lapak HookPoint - Club Pemancingan</h2>
        <p>Rasakan Pengalaman Memancing Eksklusif</p>
        <span>Buka 09.00 - 17.00 WIB</span>
    </div>
</section>

<!-- BOOKING CTA -->
<section class="booking content">
    <h3>Mulai Booking</h3>
    <p>Yuk pesan lapak sekarang dan nikmati pengalaman memancing terbaik 🎣</p>
    <a href="/lapakUser" class="btn-booking">Lihat Lapak</a>
</section>

<!-- STATISTIK -->
<section class="stats">
    <div class="card">
        <h4>Total Booking</h4>
        <h1>5</h1>
    </div>

    <div class="card">
        <h4>Menunggu</h4>
        <h1>2</h1>
    </div>

    <div class="card">
        <h4>Dikonfirmasi</h4>
        <h1>2</h1>
    </div>

    <div class="card">
        <h4>Selesai</h4>
        <h1>1</h1>
    </div>
</section>
@endsection

