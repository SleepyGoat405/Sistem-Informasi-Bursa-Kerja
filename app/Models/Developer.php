<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'developer';

    // Primary key tabel
    protected $primaryKey = 'nim';

    // Tipe primary key (karena defaultnya integer)
    public $incrementing = false; // Karena NIM bukan integer auto-increment
    protected $keyType = 'string';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'prodi',
        'gambar',
        'peran',
    ];
}
