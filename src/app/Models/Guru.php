<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'nama',
        'no_telepon',
        'alamat',
    ];

    public function user() {
    return $this->belongsTo(User::class);
    }

    public function mataPelajaran() {
        return $this->hasMany(MataPelajaran::class);
    }
    
}
