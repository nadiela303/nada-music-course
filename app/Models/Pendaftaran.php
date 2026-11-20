<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Program;
use App\Models\User;

class Pendaftaran extends Model
{
    use HasFactory;

    // Menghubungkan ke tabel pendaftarans di database
    protected $table = 'pendaftarans';

    protected $fillable = [
        'siswa_id',
        'program_id',
        'user_id',
        'tanggal_daftar',
        'status',
    ];

    // Relasi ke tabel siswas (Setiap pendaftaran milik satu siswa)
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    // Relasi ke tabel programs (Setiap pendaftaran memilih satu program kursus)
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    // Relasi ke tabel users (Admin/petugas yang melayani pendaftaran)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
