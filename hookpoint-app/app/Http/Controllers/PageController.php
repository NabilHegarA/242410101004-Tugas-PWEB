<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // ambil user dari database
        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();

        // cek user ada atau tidak
        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        // cek password (tanpa hash sesuai punyamu)
        if ($user->password != $request->password) {
            return back()->with('error', 'Password salah');
        }

        // simpan session
        Session::put('user', $user);

        // redirect sesuai role
        if ($user->role == 'admin') {
            return redirect('/dashboardAdmin');
        }

        return redirect('/dashboardUser');
    }

    public function dashboard()
    {
        $lapaks = $this->getDataLapak();
        return view('dashboard', compact('lapaks'));
    }

    public function register()
    {
        return view('register');
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'no_telepon' => 'required',
            'password' => 'required',
        ]);

        $userId = DB::table('users')->insertGetId([
            'username' => $request->username,
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'password' => $request->password,
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = DB::table('users')->where('id', $userId)->first();

        session(['user' => $user]);

        return redirect('dashboardUser');
    }

    private function getDataLapak()
    {
        return [
            [
                'nama' => 'Lapak A1',
                'jenis' => 'Lele',
                'harga' => 80000,
                'deskripsi' => 'Kolam lele dengan suasana tenang, cocok untuk pemancing santai.',
                'status' => 'available',
                'gambar' => 'kolam-lele.png'
            ],
            [
                'nama' => 'Lapak B1',
                'jenis' => 'Nila',
                'harga' => 80000,
                'deskripsi' => 'Pemandangan luas dengan ikan nila berkualitas dan mudah dipancing.',
                'status' => 'available',
                'gambar' => 'kolam-nila.png'
            ],
            [
                'nama' => 'Lapak C1',
                'jenis' => 'Gurame',
                'harga' => 80000,
                'deskripsi' => 'Kolam gurame dengan ukuran ikan besar, cocok untuk tantangan.',
                'status' => 'unavailable',
                'gambar' => 'kolam-gurame.png'
            ],
            [
                'nama' => 'Lapak D1',
                'jenis' => 'Patin',
                'harga' => 80000,
                'deskripsi' => 'Area luas dengan ikan patin aktif, cocok untuk pengalaman seru.',
                'status' => 'available',
                'gambar' => 'kolam-patin.png'
            ],
            [
                'nama' => 'Lapak A2',
                'jenis' => 'Lele',
                'harga' => 120000,
                'deskripsi' => 'Kolam lele dengan suasana tenang, cocok untuk pemancing santai.',
                'status' => 'available',
                'gambar' => 'kolam-lele.png'
            ],
            [
                'nama' => 'Lapak B2',
                'jenis' => 'Nila',
                'harga' => 120000,
                'deskripsi' => 'Pemandangan luas dengan ikan nila berkualitas dan mudah dipancing.',
                'status' => 'available',
                'gambar' => 'kolam-nila.png'
            ],
            [
                'nama' => 'Lapak C2',
                'jenis' => 'Gurame',
                'harga' => 120000,
                'deskripsi' => 'Kolam gurame dengan ukuran ikan besar, cocok untuk tantangan.',
                'status' => 'available',
                'gambar' => 'kolam-gurame.png'
            ],
            [
                'nama' => 'Lapak D2',
                'jenis' => 'Patin',
                'harga' => 120000,
                'deskripsi' => 'Area luas dengan ikan patin aktif, cocok untuk pengalaman seru.',
                'status' => 'unavailable',
                'gambar' => 'kolam-patin.png'
            ],
            [
                'nama' => 'Lapak A3',
                'jenis' => 'Lele',
                'harga' => 150000,
                'deskripsi' => 'Kolam lele dengan suasana tenang, cocok untuk pemancing santai.',
                'status' => 'unavailable',
                'gambar' => 'kolam-lele.png'
            ],
            [
                'nama' => 'Lapak B3',
                'jenis' => 'Nila',
                'harga' => 150000,
                'deskripsi' => 'Pemandangan luas dengan ikan nila berkualitas dan mudah dipancing.',
                'status' => 'available',
                'gambar' => 'kolam-nila.png'
            ],
            [
                'nama' => 'Lapak C3',
                'jenis' => 'Gurame',
                'harga' => 150000,
                'deskripsi' => 'Kolam gurame dengan ukuran ikan besar, cocok untuk tantangan.',
                'status' => 'available',
                'gambar' => 'kolam-gurame.png'
            ],
            [
                'nama' => 'Lapak D3',
                'jenis' => 'Patin',
                'harga' => 150000,
                'deskripsi' => 'Area luas dengan ikan patin aktif, cocok untuk pengalaman seru.',
                'status' => 'available',
                'gambar' => 'kolam-patin.png'
            ],
            [
                'nama' => 'Lapak A4',
                'jenis' => 'Lele',
                'harga' => 180000,
                'deskripsi' => 'Kolam lele dengan suasana tenang, cocok untuk pemancing santai.',
                'status' => 'available',
                'gambar' => 'kolam-lele.png'
            ],
            [
                'nama' => 'Lapak B4',
                'jenis' => 'Nila',
                'harga' => 180000,
                'deskripsi' => 'Pemandangan luas dengan ikan nila berkualitas dan mudah dipancing.',
                'status' => 'available',
                'gambar' => 'kolam-nila.png'
            ],
            [
                'nama' => 'Lapak C4',
                'jenis' => 'Gurame',
                'harga' => 180000,
                'deskripsi' => 'Kolam gurame dengan ukuran ikan besar, cocok untuk tantangan.',
                'status' => 'unavailable',
                'gambar' => 'kolam-gurame.png'
            ],
            [
                'nama' => 'Lapak D4',
                'jenis' => 'Patin',
                'harga' => 180000,
                'deskripsi' => 'Area luas dengan ikan patin aktif, cocok untuk pengalaman seru.',
                'status' => 'available',
                'gambar' => 'kolam-patin.png'
            ],
            [
                'nama' => 'Lapak A5',
                'jenis' => 'Lele',
                'harga' => 200000,
                'deskripsi' => 'Kolam lele dengan suasana tenang, cocok untuk pemancing santai.',
                'status' => 'available',
                'gambar' => 'kolam-lele.png'
            ],
            [
                'nama' => 'Lapak B5',
                'jenis' => 'Nila',
                'harga' => 200000,
                'deskripsi' => 'Pemandangan luas dengan ikan nila berkualitas dan mudah dipancing.',
                'status' => 'unavailable',
                'gambar' => 'kolam-nila.png'
            ],
            [
                'nama' => 'Lapak C5',
                'jenis' => 'Gurame',
                'harga' => 200000,
                'deskripsi' => 'Kolam gurame dengan ukuran ikan besar, cocok untuk tantangan.',
                'status' => 'available',
                'gambar' => 'kolam-gurame.png'
            ],
            [
                'nama' => 'Lapak D5',
                'jenis' => 'Patin',
                'harga' => 200000,
                'deskripsi' => 'Area luas dengan ikan patin aktif, cocok untuk pengalaman seru.',
                'status' => 'available',
                'gambar' => 'kolam-patin.png'
            ],
        ];
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/landing-page');
    }
}
