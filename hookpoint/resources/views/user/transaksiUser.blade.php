@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/transaksiUser.css') }}">
@endsection

@section('content')
<div class="content">
    <h2>Transaksi</h2>

    <!-- TAB -->
    <div class="tabs">
        <button class="tab active" onclick="openTab('menunggu')">Menunggu</button>
        <button class="tab" onclick="openTab('dikonfirmasi')">Dikonfirmasi</button>
        <button class="tab" onclick="openTab('selesai')">Selesai</button>
    </div>

    <div class="search-box">
        <input type="text" name="search" placeholder="Cari lapak..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </div>

    <div class="filter-box">
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

    <!-- MENUNGGU -->
    <div class="tab-content active" id="menunggu">

        <div class="card">
            <div class="card-top">🔍</div>

            <h3>Lapak A1</h3>
            <p><b>Jenis:</b> Lele</p>
            <p><b>Harga:</b> 80000</p>
            <p><b>Tanggal:</b> 20 Mei 2026</p>
            <span class="status menunggu">Menunggu</span>
        </div>

        <div class="card">
            <div class="card-top">🔍</div>

            <h3>Lapak B1</h3>
            <p><b>Jenis:</b> Gurame</p>
            <p><b>Harga:</b> 80000</p>
            <p><b>Tanggal:</b> 21 Mei 2026</p>
            <span class="status menunggu">Menunggu</span>
        </div>

    </div>

    <!-- DIKONFIRMASI -->
    <div class="tab-content" id="dikonfirmasi">

        <div class="card">
            <div class="card-top">🔍</div>

            <h3>Lapak C1</h3>
            <p><b>Jenis:</b> Nila</p>
            <p><b>Harga:</b> 80000</p>
            <p><b>Tanggal:</b> 18 Mei 2026</p>
            <span class="status dikonfirmasi">Dikonfirmasi</span>
        </div>

    </div>

    <!-- SELESAI -->
    <div class="tab-content" id="selesai">

        <div class="card">
            <div class="card-top">🔍</div>

            <h3>Lapak D1</h3>
            <p><b>Jenis:</b> Patin</p>
            <p><b>Harga:</b> 80000</p>
            <p><b>Tanggal:</b> 10 Mei 2026</p>
            <span class="status selesai">Selesai</span>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function openTab(tabName){
    let contents = document.querySelectorAll(".tab-content");
    let tabs = document.querySelectorAll(".tab");

    contents.forEach(c => c.classList.remove("active"));
    tabs.forEach(t => t.classList.remove("active"));

    document.getElementById(tabName).classList.add("active");
    event.target.classList.add("active");
}
</script>
@endsection
