<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'nama_siswa',
        'no_hp', // Sesuaikan dengan name di form (misal: no_telepon atau no_hp)
        'alamat',
    ];
}
