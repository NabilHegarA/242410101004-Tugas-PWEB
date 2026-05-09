@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-tambah-lapak.css') }}">
@endsection

@section('content')
<div class="sidebar" id="sidebar">

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

    <!-- CONTENT -->
    <div class="content">

        <div class="profile-card">
            <h2>Tambah Lapak</h2>

            <form action="{{ route('lapak.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Nama Lapak</label>
                <input type="text" name="nama_lapak">

                <label>Jenis</label>
                <input type="text" name="jenis">

                <label>Harga</label>
                <input type="number" name="harga">

                <label>Deskripsi</label>
                <textarea name="deskripsi"></textarea>

                <label>Status</label>
                <select name="status">
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>

                <div class="field">
                    <label>Foto Lapak</label>
                    <input type="file" name="foto" accept="image/*">
                </div>

                <label>Gambar</label>
                <input type="file" name="gambar">

                <button type="submit">Simpan</button>

            </form>
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

<!-- MODAL KONFIRMASI -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi</h3>
        <p>Apakah anda yakin ingin menambahkan lapak ini?</p>

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

/* ================= LOGOUT ================= */
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
    const logoutModal = document.getElementById("logoutModal");
    const confirmModal = document.getElementById("confirmModal");

    if (e.target === logoutModal) logoutModal.style.display = "none";
    if (e.target === confirmModal) confirmModal.style.display = "none";
}

/* ================= VALIDASI ================= */
function setError(id, message) {
    const input = document.getElementById(id);
    const error = document.getElementById(id + "-error");

    input.classList.add("error");
    error.innerText = message;
}

function clearError(id) {
    const input = document.getElementById(id);
    const error = document.getElementById(id + "-error");

    input.classList.remove("error");
    error.innerText = "";
}

/* ================= MODAL ================= */
function openConfirmModal() {
    document.getElementById("confirmModal").style.display = "flex";
}

function closeConfirmModal() {
    document.getElementById("confirmModal").style.display = "none";
}

/* ================= SIMPAN ================= */
function confirmSave() {
    let valid = true;

    const nama = document.getElementById("nama").value.trim();
    const jenis = document.getElementById("jenis").value.trim();
    const harga = document.getElementById("harga").value.trim();
    const deskripsi = document.getElementById("deskripsi").value.trim();
    const status = document.getElementById("status").value.trim();

    // reset error
    ["nama","jenis","harga","deskripsi", "status"].forEach(id => clearError(id));

    // validasi
    if (!nama) {
        setError("nama", "Nama lapak wajib diisi");
        valid = false;
    }

    if (!jenis) {
        setError("jenis", "Jenis kolam wajib diisi");
        valid = false;
    }

    if (!harga) {
        setError("harga", "Harga wajib diisi");
        valid = false;
    } else if (isNaN(harga)) {
        setError("harga", "Harga harus berupa angka");
        valid = false;
    }

    if (!deskripsi) {
        setError("deskripsi", "Deskripsi wajib diisi");
        valid = false;
    }

    if (!status) {
        setError("status", "Status wajib diisi");
        valid = false;
    }

    if (!valid) return;

    // tutup modal konfirmasi
    closeConfirmModal();

    // tampilkan notifikasi sukses
    const msg = document.getElementById("successMsg");
    msg.style.display = "block";

    setTimeout(() => {
        msg.style.display = "none";
        window.location.href = "lapakadmin.html";
    }, 2000);
}
</script>
@endpush
