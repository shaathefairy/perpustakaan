<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'kode_buku',
        'isbn',
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'bahasa',
        'jumlah_halaman',
        'stok',
        'sinopsis',
        'status',
        'rak',
    ];
}