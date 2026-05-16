@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pengelolaan.css') }}">
@endsection

@section('content')
<section class="content">
    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    <h2>Daftar Lapak Pemancingan</h2>

    <form id="filter-form" onsubmit="return false;">

        <div class="search-box">
            <input type="text" name="search" id="search" placeholder="Cari lapak..." value="{{ request('search') }}">
            <button>Cari</button>{{-- agak ga guna soalnya live serach, cuma jelek klu dihapus --}}
        </div>

        <div class="filter-box">
            <div>
                <label>Filter Status</label>
                <select name="status" id="status">
                    <option value="">Semua Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>Not Available</option>
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

        <div class="content-header">
            <a href="{{ url('/admin/tambahlapak') }}" class="btn-tambah">
                + Tambah Data Lapak
            </a>
        </div>

    </form>

    <div class="lapak-grid" id="lapak-grid">

        @forelse ($lapaks as $lapak)
            <article class="card">
                <div class="card-content">

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
                </div>

                <div class="card-footer">
                    {{-- STATUS --}}
                    <p class="status {{ $lapak->status }}">
                        Status: {{ $lapak->status == 'available' ? 'Available' : 'Not Available' }}
                    </p>

                    {{-- ACTION BUTTON --}}
                    <div class="admin-btn">
                        <a href="{{ url('/admin/editlapak/' . $lapak->id) }}" class="btn-edit">Edit</a>
                    </div>
                </div>

            </article>
        @empty
            <div class="empty-message">🔍 Tidak ada data lapak</div>
        @endforelse
    </div>
</section>
@endsection

@section('scripts')
<script>
    let timeout = null;

    function fetchData() {
        let search = document.getElementById("search").value;
        let status = document.getElementById("status").value;
        let jenis = document.getElementById("jenis").value;

        fetch(`/admin/pengelolaan?search=${search}&status=${status}&jenis=${jenis}`)
            .then(res => res.text())
            .then(html => {

                let parser = new DOMParser();
                let doc = parser.parseFromString(html, 'text/html');

                let newGrid = doc.querySelector("#lapak-grid");

                document.querySelector("#lapak-grid").innerHTML =
                    newGrid.innerHTML;
            });
    }

    // SEARCH LIVE (typing)
    document.getElementById("search").addEventListener("keyup", function () {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            fetchData();
        }, 300);
    });

    // FILTER LIVE
    document.getElementById("status").addEventListener("change", fetchData);
    document.getElementById("jenis").addEventListener("change", fetchData);

    setTimeout(() => {
        const msg = document.querySelector('.success-msg');
        if (msg) {
            msg.style.opacity = '0';
            msg.style.transition = '0.5s ease';

            setTimeout(() => {
                msg.remove();
            }, 500);
        }
    }, 1600);
</script>
@endsection
