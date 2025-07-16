<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru1 = Guru::first(); 
        $guru2 = Guru::skip(1)->first();
        $guru3 = Guru::skip(1)->skip(2)->first();

        MataPelajaran::create([
            'nama_mapel' => 'Bahasa Pemrograman',
            'guru_id' => $guru1->id,
        ]);

        MataPelajaran::create([
            'nama_mapel' => 'Kalkulus II',
            'guru_id' => $guru2->id,
        ]);

        MataPelajaran::create([
            'nama_mapel' => 'Aljabar Linear',
            'guru_id' => $guru3->id,
        ]);
    }
}
