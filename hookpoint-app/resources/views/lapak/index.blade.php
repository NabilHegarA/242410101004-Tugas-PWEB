@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/lapakadmin.css') }}">
@endsection

@section('content')

<section class="container">
    <h1>Daftar Lapak Pemancingan</h1>

    <!-- SEARCH (opsional nanti bisa connect ke controller) -->
    <form method="GET" action="{{ route('lapak.index') }}">

        <div class="search-box">
            <input type="text" name="search" placeholder="Cari lapak..." value="{{ request('search') }}">
            <button type="submit">Cari</button>
        </div>

    </form>

    <div class="content-header">
        <a href="{{ route('lapak.create') }}" class="btn-tambah">
            + Tambah Data Lapak
        </a>
    </div>

    <!-- GRID -->
    <div class="lapak-grid">

        @forelse ($lapaks as $lapak)
        <article class="card">

            <!-- GAMBAR -->
            @if($lapak->gambar)
                <img src="{{ asset('storage/'.$lapak->gambar) }}" alt="{{ $lapak->jenis }}">
            @else
                <img src="{{ asset('images/default.png') }}">
            @endif

            <!-- DATA -->
            <h3>{{ $lapak->nama_lapak }}</h3>

            <p><strong>Jenis:</strong> {{ $lapak->jenis }}</p>

            <p><strong>Harga:</strong> Rp {{ number_format($lapak->harga, 0, ',', '.') }} / hari</p>

            <p>{{ $lapak->deskripsi }}</p>

            <p class="status {{ $lapak->status }}">
                Status: {{ ucfirst($lapak->status) }}
            </p>

            <!-- ACTION BUTTONS -->
            <div class="btn-group">

                <!-- SHOW / DETAIL (INI YANG KAMU MAU) -->
                <a href="{{ route('lapak.show', $lapak->id) }}" class="btn">
                    Detail
                </a>

                <!-- EDIT -->
                <a href="{{ route('lapak.edit', $lapak->id) }}" class="btn">
                    Edit
                </a>

                <!-- DELETE -->
                <form action="{{ route('lapak.destroy', $lapak->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus lapak ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn-delete">
                        Hapus
                    </button>
                </form>

            </div>

        </article>

        @empty
            <p>Tidak ada data lapak</p>
        @endforelse

    </div>

    <!-- PAGINATION -->
    <div>
        {{ $lapaks->links() }}
    </div>

</section>
@endsection
