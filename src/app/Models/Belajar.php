<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'murid_id',
        'mata_pelajaran_id',
        'jam_pelajaran_id',
    ];

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function jamPelajaran()
    {
        return $this->belongsTo(JamPelajaran::class);
    }
}
