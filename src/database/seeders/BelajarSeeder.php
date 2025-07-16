<?php

namespace Database\Seeders;

use App\Models\Belajar;
use App\Models\JamPelajaran;
use App\Models\MataPelajaran;
use App\Models\Murid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $murid = Murid::first();
        $mapel = MataPelajaran::first();
        $jam = JamPelajaran::first();

        if ($murid && $mapel && $jam) {
            Belajar::create([
                'murid_id' => $murid->id,
                'mata_pelajaran_id' => $mapel->id,
                'jam_pelajaran_id' => $jam->id,
            ]);
        }
    }
}
