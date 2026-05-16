<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    protected $table = 'lapaks';

    protected $fillable = [
        'nama',
        'jenis',
        'harga',
        'deskripsi',
        'status',
        'gambar'
    ];
}
