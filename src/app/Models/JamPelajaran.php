<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'mata_pelajaran_id',
        'guru_id',
    ];

    public function guru() {
        return $this->belongsTo(Guru::class);
    }
    
    public function mataPelajaran()
    {
    return $this->belongsTo(MataPelajaran::class);
    }

    public function belajar()
    {
        return $this->hasMany(Belajar::class);
    }
}
