<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    protected $fillable = [
        'nama_lapak',
        'jenis',
        'harga',
        'deskripsi',
        'status',
        'gambar'
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_lapak');
    }
}
