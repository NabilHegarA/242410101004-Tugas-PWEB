@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-tambah-lapak.css') }}">
@endsection

@section('content')
<h2>Detail Lapak</h2>

<p><b>Nama:</b> {{ $lapak->nama_lapak }}</p>
<p><b>Jenis:</b> {{ $lapak->jenis }}</p>
<p><b>Harga:</b> Rp {{ $lapak->harga }}</p>
<p><b>Status:</b> {{ $lapak->status }}</p>
<p><b>Deskripsi:</b> {{ $lapak->deskripsi }}</p>

@if($lapak->gambar)
    <p><b>Gambar:</b></p>
    <img src="{{ asset('storage/'.$lapak->gambar) }}" width="200">
@endif

<br><br>

<a href="{{ route('lapak.index') }}">Kembali</a>
@endsection
