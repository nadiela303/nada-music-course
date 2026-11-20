<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // Menghubungkan ke tabel programs di database
    protected $table = 'programs';

    protected $fillable = [
        'nama_program',
        'deskripsi',
        'harga',
    ];

    // Relasi: Satu program kursus bisa diambil di banyak data pendaftaran
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
