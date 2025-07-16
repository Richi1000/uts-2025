<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'guru_id',
    ];

    public function gurus() {
        return $this->belongsTo(Guru::class);
    }

    public function belajars() {
        return $this->hasMany(Belajar::class);
    }

    public function nilais() {
        return $this->hasMany(Nilai::class);
    }
}
