@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-lapak.css') }}">
@endsection

@section('content')
<div class="content profile-page">
    @if(request('batal'))
        <div class="batal-msg">
            Lapak batal diperbarui
        </div>
    @endif

    <form id="formEdit" method="POST" action="{{ url('/admin/editlapak/' . $lapak->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="profile-card">
            <h2>Edit Lapak</h2>

            <div class="form-grid">

                <!-- KIRI -->
                <div class="form-column">

                    <div class="field">
                        <label>Nama Lapak</label>
                        <input type="text" name="nama" id="nama" value="{{ $lapak->nama }}">
                        <div id="error-nama" class="error-msg"></div>
                    </div>

                    <div class="field">
                        <label>Harga</label>
                        <input type="number" name="harga" id="harga" value="{{ $lapak->harga }}">
                        <div id="error-harga" class="error-msg"></div>
                    </div>

                    <div class="field">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi">{{ $lapak->deskripsi }}</textarea>
                        <div id="error-deskripsi" class="error-msg"></div>
                    </div>

                    <div class="field">
                        <label>Status</label>
                        <select name="status" id="status">
                            <option value="available"{{ $lapak->status == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="unavailable"{{ $lapak->status == 'unavailable' ? 'selected' : '' }}>Not Available</option>
                        </select>
                        <div id="error-status" class="error-msg"></div>
                    </div>

                </div>

                <!-- KANAN -->
                <div class="form-column">

                    <div class="field">
                        <label>Jenis Kolam</label>
                        <select name="jenis" id="jenis">
                            <option value="Lele" {{ $lapak->jenis == 'Lele' ? 'selected' : '' }}>Lele</option>
                            <option value="Nila" {{ $lapak->jenis == 'Nila' ? 'selected' : '' }}>Nila</option>
                            <option value="Gurame" {{ $lapak->jenis == 'Gurame' ? 'selected' : '' }}>Gurame</option>
                            <option value="Patin" {{ $lapak->jenis == 'Patin' ? 'selected' : '' }}>Patin</option>
                        </select>
                        <div id="error-jenis" class="error-msg"></div>
                    </div>

                    <div class="field">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="gambar">
                        <div class="preview-wrapper">
                            <img src="{{ asset('uploads/' . $lapak->gambar) }}">
                        </div>
                        <div id="error-gambar" class="error-msg"></div>
                    </div>

                </div>

            </div>

            <div class="edit-btn edit-mode">
                <button type="button" onclick="kembali()" class="btn-kembali">Kembali</button>
                <button type="button" onclick="editForm()">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@include('components.confirm-edit')
@endsection

@section('scripts')
<script>
function kembali() {
    window.location.href = "/admin/pengelolaan";
}

function editForm() {
    let valid = true;

    const fields = ["nama", "jenis", "harga", "deskripsi", "status", "gambar"];

    fields.forEach(id => {
        const input = document.getElementById(id);
        const error = document.getElementById("error-" + id);

        if (!input.value.trim()) {
            error.innerText = "Wajib diisi";
            error.style.display = "block";
            valid = false;
        } else {
            error.style.display = "none";
        }
    });

    if (!valid) return;

    openConfirmModal();
}

function openConfirmModal() {
    document.getElementById("confirmModal").style.display = "flex";
}

function closeConfirmModal() {
    document.getElementById("confirmModal").style.display = "none";
}

function batalSimpan() {
    window.location.href = "/admin/editlapak/{{ $lapak->id }}?batal=true";
}

function confirmSave() {
    closeConfirmModal();
    document.getElementById("formEdit").submit();
}

setTimeout(() => {
    const msg = document.querySelector('.batal-msg');

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
