<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run()
    {
        Booking::create([
            'kode_booking' => 'BK001',
            'nama_pemesan' => 'Nabil',
            'no_telepon' => '082562587282',
            'tanggal' => now(),
            'status' => 'lunas',
            'total_harga' => 100000,
            'aktif' => true,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK002',
            'nama_pemesan' => 'Andi',
            'no_telepon' => '082345276728',
            'tanggal' => now(),
            'status' => 'pending',
            'total_harga' => 80000,
            'aktif' => true,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK003',
            'nama_pemesan' => 'Siti',
            'no_telepon' => '082572467987',
            'tanggal' => now(),
            'status' => 'batal',
            'total_harga' => 120000,
            'aktif' => false,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK004',
            'nama_pemesan' => 'Fandi',
            'no_telepon' => '082562767282',
            'tanggal' => now(),
            'status' => 'lunas',
            'total_harga' => 100000,
            'aktif' => true,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK005',
            'nama_pemesan' => 'Dian',
            'no_telepon' => '081892767282',
            'tanggal' => now(),
            'status' => 'pending',
            'total_harga' => 80000,
            'aktif' => true,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK006',
            'nama_pemesan' => 'Dwi',
            'no_telepon' => '082562769876',
            'tanggal' => now(),
            'status' => 'batal',
            'total_harga' => 120000,
            'aktif' => false,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK007',
            'nama_pemesan' => 'Dani',
            'no_telepon' => '082562454282',
            'tanggal' => now(),
            'status' => 'pending',
            'total_harga' => 80000,
            'aktif' => true,
            'bukti_pembayaran' => null
        ]);

        Booking::create([
            'kode_booking' => 'BK008',
            'nama_pemesan' => 'Nurul',
            'no_telepon' => '082563457282',
            'tanggal' => now(),
            'status' => 'batal',
            'total_harga' => 150000,
            'aktif' => false,
            'bukti_pembayaran' => null
        ]);
    }
}
