<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapak;

class LapakController extends Controller
{
    // ================= LANDING =================
    public function landing(Request $request)
    {
        $lapaks = $this->filterLapak($request);

        return view('landing.lapak', compact('lapaks'));
    }


    // ================= ADMIN =================
    public function admin(Request $request)
    {
        $lapaks = $this->filterLapak($request);

        return view('admin.pengelolaan', compact('lapaks'));
    }


    // ================= USER =================
    public function user(Request $request)
    {
        $lapaks = $this->filterLapak($request);

        return view('user.lapakUser', compact('lapaks'));
    }


    // ================= FILTER =================
    private function filterLapak(Request $request)
    {
        $query = Lapak::query();

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis', 'like', '%' . $request->search . '%');
            });
        }

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // FILTER JENIS
        if ($request->jenis) {
            $query->where('jenis', $request->jenis);
        }

        return $query->get();
    }

    public function liveSearch(Request $request)
    {
        $keyword = $request->keyword;

        $lapaks = Lapak::where('nama', 'like', "%$keyword%")
            ->orWhere('jenis', 'like', "%$keyword%")
            ->orWhere('status', 'like', "%$keyword%")
            ->limit(10)
            ->get();

        return response()->json($lapaks);
    }

    // ================= CREATE =================
    public function create()
    {
        return view('admin.tambahlapak');
    }


    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = time() . '.' . $request->gambar->extension();

        $request->gambar->move(
            public_path('uploads'),
            $gambar
        );

        Lapak::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'gambar' => $gambar,
        ]);

        return redirect('/admin/pengelolaan')
            ->with('success', 'Lapak berhasil ditambahkan');
    }


    // ================= EDIT =================
    public function edit($id)
    {
        $lapak = Lapak::findOrFail($id);

        return view('admin.editlapak', compact('lapak'));
    }


    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $lapak = Lapak::findOrFail($id);

        $lapak->nama = $request->nama;
        $lapak->jenis = $request->jenis;
        $lapak->harga = $request->harga;
        $lapak->deskripsi = $request->deskripsi;
        $lapak->status = $request->status;

        if ($request->hasFile('gambar')) {

            $gambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('uploads'),
                $gambar
            );

            $lapak->gambar = $gambar;
        }

        $lapak->save();

        return redirect('/admin/pengelolaan')
            ->with('success', 'Lapak berhasil diperbarui');
    }
}
