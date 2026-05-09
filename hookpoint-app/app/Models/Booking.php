<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'kode_booking',
        'nama_pemesan',
        'email',
        'tanggal',
        'status',
        'total_harga',
        'aktif',
        'bukti_pembayaran'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'total_harga' => 'decimal:2',
        'aktif' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function lapaks()
    {
        return $this->belongsToMany(Lapak::class, 'booking_lapak');
    }
}
