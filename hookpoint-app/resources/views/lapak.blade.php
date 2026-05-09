@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/lapak.css') }}">
@endsection

@section('content')
<section class="container">
    <h1 class="fade-up">Daftar Lapak Pemancingan</h1>
        <form method="GET" action="/lapak">

            <div class="search-box fade-up">
                <input type="text" name="search" placeholder="Cari lapak..." value="{{ request('search') }}">
                <button type="submit">Cari</button>
            </div>

            <div class="filter-box fade-up">
                <div>
                    <label>Filter Status</label>
                    <select name="status" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>Not Available</option>
                    </select>
                </div>

                <div>
                    <label>Filter Jenis</label>
                    <select name="jenis" onchange="this.form.submit()">
                        <option value="">Semua Jenis</option>
                        <option value="Lele" {{ request('jenis') == 'Lele' ? 'selected' : '' }}>Lele</option>
                        <option value="Nila" {{ request('jenis') == 'Nila' ? 'selected' : '' }}>Nila</option>
                        <option value="Gurame" {{ request('jenis') == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                        <option value="Patin" {{ request('jenis') == 'Patin' ? 'selected' : '' }}>Patin</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="lapak-grid">
            @forelse ($lapaks as $lapak)
                <article class="card fade-card">
                    <img src="{{ asset('images/' . $lapak['gambar']) }}" alt="{{ $lapak['jenis'] }}">

                    <h3>{{ $lapak['nama'] }}</h3>

                    <p><strong>Jenis:</strong> Kolam {{ $lapak['jenis'] }}</p>

                    <p><strong>Harga:</strong> Rp {{ number_format($lapak['harga'], 0, ',', '.') }} / hari</p>

                    <p>{{ $lapak['deskripsi'] }}</p>

                    <p class="status {{ $lapak['status'] }}">
                        Status: {{ $lapak['status'] == 'available' ? 'Available' : 'Not Available' }}
                    </p>

                    <a href="/login" class="btn {{ $lapak['status'] == 'unavailable' ? 'disabled' : '' }}">
                        Booking Sekarang
                    </a>
                </article>

            @empty
                <div class="empty-message">Pencarian tidak tersedia</div>

            @endforelse
        </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const cards = document.querySelectorAll('.fade-card');

        function showCardsOnScroll() {
            const triggerBottom = window.innerHeight * 0.9;

            cards.forEach((card, index) => {
                const cardTop = card.getBoundingClientRect().top;

                if (cardTop < triggerBottom) {
                    setTimeout(() => {
                        card.classList.add('show');
                    }, index * 100);
                }
            });
        }

        window.addEventListener('scroll', showCardsOnScroll);
        window.addEventListener('load', showCardsOnScroll);

    });
</script>
@endpush
