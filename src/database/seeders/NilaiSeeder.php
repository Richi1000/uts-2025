<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use App\Models\Murid;
use App\Models\Nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $murid = Murid::first();
        $mapel = MataPelajaran::first();

        if ($murid && $mapel) {
            Nilai::create([
                'murid_id' => $murid->id,
                'mata_pelajaran_id' => $mapel->id,
                'nilai' => 100,
                'kategori' => 'PR',
            ]);

            Nilai::create([
                'murid_id' => $murid->id,
                'mata_pelajaran_id' => $mapel->id,
                'nilai' => 85,
                'kategori' => 'PS',
            ]);

            Nilai::create([
                'murid_id' => $murid->id,
                'mata_pelajaran_id' => $mapel->id,
                'nilai' => 85,
                'kategori' => 'UTS',
            ]);

            Nilai::create([
                'murid_id' => $murid->id,
                'mata_pelajaran_id' => $mapel->id,
                'nilai' => 80,
                'kategori' => 'UAS',
            ]);
        }
    }
}
