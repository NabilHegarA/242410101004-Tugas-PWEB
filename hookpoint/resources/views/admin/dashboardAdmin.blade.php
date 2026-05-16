@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
@endsection

@section('content')
<section class="content">

    <div class="dashboard-header">
        <h2>Dashboard</h2>
        <p>Ringkasan sistem HookPoint</p>
    </div>

    <div class="content-header">
        <a href="{{ url('/admin/tambahlapak') }}" class="btn-tambah">
            + Tambah Data Lapak
        </a>
    </div>

    <div class="cards">

        <div class="card">
            <h3>Total Pendapatan</h3>
            <h1>Rp 5.000.000</h1>
        </div>

        <div class="card">
            <h3>Total Transaksi</h3>
            <h1>120</h1>
        </div>

        <div class="card">
            <h3>Lapak Aktif</h3>
            <h1>8</h1>
        </div>

        <div class="card weather-card">
            <h3>Cuaca Jember</h3>

            <div id="weather-loading">Loading cuaca...</div>

            <div id="weather-box" style="display:none;">
                <div class="weather-top">
                    <span id="icon">⛅</span>
                    <h2 id="temp">--</h2>
                </div>

                <p id="desc">--</p>
                <small>Jember, Indonesia</small>
            </div>
        </div>

    </div>
</section>
@endsection


@section('scripts')
<script>
async function loadWeather() {
    try {
        const res = await fetch("https://wttr.in/Jember?format=j1");

        const text = await res.text();
        const data = JSON.parse(text);

        const current = data.current_condition[0];

        const temp = current.temp_C;
        const desc = current.weatherDesc[0].value.toLowerCase();

        document.getElementById("temp").innerText = temp + "°C";
        document.getElementById("desc").innerText = current.weatherDesc[0].value;

        // ICON otomatis
        let icon = "⛅";

        if (desc.includes("sun") || desc.includes("clear")) {
            icon = "☀️";
        } else if (desc.includes("rain")) {
            icon = "🌧️";
        } else if (desc.includes("cloud")) {
            icon = "☁️";
        } else if (desc.includes("storm")) {
            icon = "⛈️";
        }

        document.getElementById("icon").innerText = icon;

        document.getElementById("weather-loading").style.display = "none";
        document.getElementById("weather-box").style.display = "block";

    } catch (err) {
        console.log(err);
        document.getElementById("weather-loading").innerText =
            "Gagal memuat cuaca";
    }
}

loadWeather();
</script>
@endsection
