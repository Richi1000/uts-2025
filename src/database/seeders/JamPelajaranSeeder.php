<?php

namespace Database\Seeders;

use App\Models\JamPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JamPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JamPelajaran::create([
            'hari' => 'Senin',
            'jam_mulai' => '07:00:00',
            'jam_selesai' => '09:30:00',
            'guru_id' => 1,
        ]);

        JamPelajaran::create([
            'hari' => 'Senin',
            'jam_mulai' => '09:30:00',
            'jam_selesai' => '11:30:00',
            'guru_id' => 2,
        ]);

        JamPelajaran::create([
            'hari' => 'Senin',
            'jam_mulai' => '13:00:00',
            'jam_selesai' => '15:30:00',
            'guru_id' => 3,
        ]);
    }
}
