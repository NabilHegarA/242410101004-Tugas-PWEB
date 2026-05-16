@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/lapakUser.css') }}">
@endsection

@section('content')
    <div class="content">
        <h1 class="fade-up">Daftar Lapak Pemancingan</h1>
        <form id="filter-form" onsubmit="return false;">
            <div class="search-box">
                <input type="text" name="search" id="search" placeholder="Cari lapak..." value="{{ request('search') }}">
                <button>Cari</button>
            </div>

            <div class="filter-box">
                <div>
                    <label>Filter Status</label>
                    <select name="status" id="status">
                        <option value="">Semua Status</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="not available" {{ request('status') == 'unavailable' ? 'selected' : '' }}>Not Available</option>
                    </select>
                </div>

                <div>
                    <label>Filter Jenis</label>
                    <select name="jenis" id="jenis">
                        <option value="">Semua Jenis</option>
                        <option value="Lele" {{ request('jenis') == 'Lele' ? 'selected' : '' }}>Lele</option>
                        <option value="Nila" {{ request('jenis') == 'Nila' ? 'selected' : '' }}>Nila</option>
                        <option value="Gurame" {{ request('jenis') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                        <option value="Patin" {{ request('jenis') == 'Patin' ? 'selected' : '' }}>Patin</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- GRID -->
        <div class="lapak-grid" id="lapak-grid">

            @forelse ($lapaks as $lapak)
                <article class="card">

                    {{-- GAMBAR --}}
                    <img src="{{ asset('uploads/' . $lapak->gambar) }}" alt="{{ $lapak->jenis }}">

                    {{-- NAMA --}}
                    <h3>{{ $lapak->nama }}</h3>

                    {{-- JENIS --}}
                    <p><strong>Jenis:</strong> Kolam {{ $lapak->jenis }}</p>

                    {{-- HARGA --}}
                    <p><strong>Harga:</strong> Rp {{ number_format($lapak->harga, 0, ',', '.') }} / hari</p>

                    {{-- DESKRIPSI --}}
                    <p>{{ $lapak->deskripsi }}</p>

                    {{-- STATUS --}}
                    <p class="status {{ $lapak->status }}">
                        Status: {{ $lapak->status == 'available' ? 'Available' : 'Not Available' }}
                    </p>

                    {{-- ACTION BUTTON --}}
                    <div class="user-btn">
                        <a href="/user/lapakUser" class="btn-booking">Booking Sekarang</a>
                    </div>

                </article>
            @empty
                <div class="empty-message">🔍 Tidak ada data lapak</div>
            @endforelse
        </div>
    </div>
@endsection
