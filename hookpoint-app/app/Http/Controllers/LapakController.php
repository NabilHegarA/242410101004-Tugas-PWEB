<?php

namespace App\Http\Controllers;

use App\Models\Lapak;
use Illuminate\Http\Request;

class LapakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapaks = Lapak::all(); // tetap semua data

        return view('lapak.index', compact('lapaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lapak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'status' => 'required',
            'foto' => 'image|mimes:jpg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/lapak'), $filename);

            $data['foto'] = $filename;
        }

        Lapak::create($data);

        return redirect()->route('lapak.index')
            ->with('success', 'Lapak berhasil ditambahkan!');

        return redirect()->route('lapak.create')
            ->with('error', 'Lapak gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lapak $lapak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lapak = Lapak::findOrFail($id);
        return view('lapak.edit', compact('lapak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lapak = Lapak::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'status' => 'required',
            'foto' => 'image|mimes:jpg,png|max:2048'
        ]);

        $lapak->nama = $request->nama;
        $lapak->jenis = $request->jenis;
        $lapak->harga = $request->harga;
        $lapak->deskripsi = $request->deskripsi;
        $lapak->status = $request->status;

        if ($request->hasFile('foto')) {

            if ($lapak->foto && file_exists(public_path('uploads/lapak/'.$lapak->foto))) {
                unlink(public_path('uploads/lapak/'.$lapak->foto));
            }

            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/lapak'), $filename);

            $lapak->foto = $filename;
        }

        $lapak->save();

        return redirect()->route('lapak.index')
            ->with('success', 'Lapak berhasil diubah!');

        return redirect()->route('lapak.edit')
            ->with('error', 'Lapak gagal diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lapak = Lapak::findOrFail($id);
        $lapak->delete();

        return redirect()->route('lapak.index')
            ->with('success', 'Lapak berhasil dihapus!');

        return redirect()->route('lapak.index')
            ->with('success', 'Lapak batal dihapus!');
    }
}
