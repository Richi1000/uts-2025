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

    public function guru() {
        return $this->belongsTo(Guru::class);
    }

    public function belajar() {
        return $this->hasMany(Belajar::class);
    }

    public function nilai() {
        return $this->hasMany(Nilai::class);
    }
}
