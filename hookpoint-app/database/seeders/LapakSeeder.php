<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lapak;

class LapakSeeder extends Seeder
{
    public function run()
    {
        Lapak::create([
            'nama_lapak' => 'Lapak A',
            'jenis' => 'Lele',
            'harga' => 80000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'available',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak B',
            'jenis' => 'Nila',
            'harga' => 100000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'available',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak C',
            'jenis' => 'Gurame',
            'harga' => 120000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'unavailable',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak D',
            'jenis' => 'Patin',
            'harga' => 150000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'available',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak E',
            'jenis' => 'Lele',
            'harga' => 100000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'available',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak F',
            'jenis' => 'Gurame',
            'harga' => 120000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'unavailable',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak G',
            'jenis' => 'Lele',
            'harga' => 100000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'available',
            'gambar' => null
        ]);

        Lapak::create([
            'nama_lapak' => 'Lapak H',
            'jenis' => 'Nila',
            'harga' => 120000,
            'deskripsi' => "tempat vip dengan pemandangan yang indah",
            'status' => 'unavailable',
            'gambar' => null
        ]);
    }
}
