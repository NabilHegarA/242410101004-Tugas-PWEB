@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
        <section class="hero">
            <h1 class="fade-up">Reservasi Lapak HookPoint - Club Pemancingan</h1>
            <h2 class="fade-up">Rasakan Pengalaman Memancing Eksklusif</h2>
            <h3 class="fade-up">Buka 09.00 - 16.00 WIB</h3>
        </section>

        <section class="container">
            <h2 class="fade-up">Lapak Populer</h2>

            <div class="slider-wrapper">
                <button class="nav-btn left" onclick="scrollLeft()">❮</button>

                <div class="lapak-slider" id="slider">
                    @foreach ($lapaks as $lapak)
                        <article class="card">
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
                    @endforeach
                </div>

                <button class="nav-btn right" onclick="scrollRight()">❯</button>
            </div>

            <div class="table">
                <h2 class="fade-up">Data Kolam</h2>
                <table class="fade-up data-table">

                    <thead>
                    <tr>
                    <th>Kolam</th>
                    <th>Jenis Ikan</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                    <td>Kolam A</td>
                    <td>Lele</td>
                    <td>5</td>
                    <td>Tersedia</td>
                    </tr>

                    <tr>
                    <td>Kolam B</td>
                    <td>Nila</td>
                    <td>5</td>
                    <td>Tersedia</td>
                    </tr>

                    <tr>
                    <td>Kolam C</td>
                    <td>Gurame</td>
                    <td>5</td>
                    <td>Tersedia</td>
                    </tr>

                    <tr>
                    <td>Kolam D</td>
                    <td>Patin</td>
                    <td>5</td>
                    <td>Tersedia</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const slider = document.getElementById('slider');
        if (!slider) return;

        const scrollStep = 320;
        const delay = 2000;
        let interval;

        window.scrollLeft = function () {
            clearInterval(interval);
            slider.scrollBy({ left: -scrollStep, behavior: 'smooth' });
        }

        window.scrollRight = function () {
            clearInterval(interval);
            slider.scrollBy({ left: scrollStep, behavior: 'smooth' });
        }

        function autoScroll() {
            if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth) {
                slider.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                slider.scrollBy({ left: scrollStep, behavior: 'smooth' });
            }
        }

        function startAuto() {
            interval = setInterval(autoScroll, delay);
        }

        function stopAuto() {
            clearInterval(interval);
        }

        startAuto();

        slider.addEventListener('mouseenter', stopAuto);
        slider.addEventListener('mouseleave', startAuto);
    });
</script>
@endsection

