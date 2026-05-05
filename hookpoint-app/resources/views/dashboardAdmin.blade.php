@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
@endsection

@section('content')
<section class="content">

    <div class="content-header">
        <a href="/tambahlapak" class="btn-tambah">
            + Tambah Data Lapak
        </a>
    </div>

    <div class="cards">

        <x-stat-card
            judul="Total Pendapatan"
            nilai="Rp 5.000.000"
            ikon="💰"
            warna="#d1e7dd"
        />

        <x-stat-card
            judul="Total Transaksi"
            nilai="120"
            ikon="📊"
            warna="#cff4fc"
        />

        <x-stat-card
            judul="Lapak Aktif"
            nilai="8"
            ikon="🎣"
            warna="#fff3cd"
        />

    </div>
</section>
@endsection
