@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-tambah-lapak.css') }}">
@endsection

@section('content')
<div class="sidebar" id="sidebar">

    <!-- HEADER -->
    <div class="sidebar-header">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        <span class="menu-title">Menu</span>
    </div>

    <a href="dashboardadmin.html"><div class="icon">🏠</div><span>Dashboard</span></a>
    <a href="profil.html"><div class="icon">👤</div><span>Profil</span></a>
    <a href="lapakadmin.html" class="active"><div class="icon">🎣</div><span>Lapak</span></a>
    <a href="transaksiadmin.html"><div class="icon">📄</div><span>Transaksi</span></a>

    <div class="sidebar-bottom">
        <hr>
        <a href="#" onclick="openModal()">
            <span class="icon">🚪</span>
            <span>Logout</span>
        </a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="left">
            <img src="logo.png" alt="Logo">
            <span class="brand">HookPoint</span>
        </div>

        <div class="right">
            Admin
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div id="successMsg" class="success-msg">
            Perubahan berhasil disimpan!
        </div>

        <div class="profile-card">
            <h2>Edit Lapak</h2>

            <div class="field">
                <label for="nama">Nama Lapak</label>
                <input type="text" id="nama" value="Lapak A1">
            </div>

            <div class="field">
                <label for="jenis">Jenis Kolam</label>
                <input type="text" id="jenis" value="Kolam Lele">
            </div>

            <div class="field">
                <label for="harga">Harga</label>
                <input type="text" id="harga" value="80000">
            </div>

            <div class="field">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" value="Kolam santai">
            </div>

            <div class="field">
                <label for="status">Status</label>
                <select id="status">
                    <option>Available</option>
                    <option>Not Available</option>
                </select>
            </div>

            <div class="field">
                <label>Foto Lapak</label>
                <input type="file" name="foto" accept="image/*">
            </div>

            <div class="edit-btn edit-mode">
                <button onclick="kembali()" class="btn-kembali">Kembali</button>
                <button onclick="openConfirmModal()">Simpan Perubahan</button>
            </div>
        </div>

    </div>
</div>

<!-- OVERLAY + MODAL LOGOUT -->
<div id="logoutModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi Logout</h3>
        <p>Apakah anda yakin ingin keluar?</p>

        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <button class="btn-logout" onclick="confirmLogout()">Logout</button>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi</h3>
        <p>Apakah anda yakin ingin menyimpan perubahan?</p>

        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeConfirmModal()">Tidak</button>
            <button class="btn-logout" onclick="confirmSave()">Ya</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("close");
}

function kembali(){
    window.location.href = "lapakadmin.html";
}

function openModal() {
    document.getElementById("logoutModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("logoutModal").style.display = "none";
}

function confirmLogout() {
    window.location.href = "index.html";
}

window.onclick = function(e) {
    const modal = document.getElementById("logoutModal", "confirmModal");
    if (e.target === modal) {
        modal.style.display = "none";
    }
}

function openConfirmModal() {
    document.getElementById("confirmModal").style.display = "flex";
}

function closeConfirmModal() {
    document.getElementById("confirmModal").style.display = "none";
}

function confirmSave() {
    closeConfirmModal();

    // ambil nilai input
    const nama = document.getElementById("nama").value;
    const jenis = document.getElementById("jenis").value;
    const harga = document.getElementById("harga").value;
    const deskripsi = document.getElementById("deskripsi").value;
    const status = document.getElementById("status").value;

    // SIMULASI UPDATE (sementara)
    console.log("Data tersimpan:", nama, jenis, harga, deskripsi, status);

    // tampilkan notif sukses
    const msg = document.getElementById("successMsg");
    msg.style.display = "block";

    setTimeout(() => {
        msg.style.display = "none";
        window.location.href = "lapakadmin.html";
    }, 2000);
}
</script>
@endpush
