<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'no_telepon',
        'alamat',
    ];

    // Relasi ke mata pelajaran (nanti setelah Mapel dibuat)
    public function mataPelajarans() {
        return $this->hasMany(MataPelajaran::class);
    }
}
