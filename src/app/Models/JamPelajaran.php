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
    ];

    public function belajars()
    {
        return $this->hasMany(Belajar::class);
    }
}
