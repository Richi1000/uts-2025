<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model 
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
    ];

    public function belajars() {
        return $this->hasMany(Belajar::class);
    }

    public function nilais() {
        return $this->hasMany(Nilai::class);
    }

    public function gurus() {
        return $this->hasMany(Guru::class);
    }
}
