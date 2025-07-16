<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip' => '1704',
            'nama' => 'Bapak Ari Prabowo',
            'no_telepon' => '081278912345',
            'alamat' => 'Jl. Pendidikan No. 22, Surabaya',
        ]);

        Guru::create([
            'nip' => '2704',
            'nama' => 'Bu Rina Marlina',
            'no_telepon' => '085612345678',
            'alamat' => 'Jl. Guru Bangsa No. 7, Semarang',
        ]);

        Guru::create([
            'nip' => '2745',
            'nama' => 'Bu Lamria',
            'no_telepon' => '085612345771',
            'alamat' => 'Jl. Guru Bangsa No. 5, Semarang',
        ]);
    }
}
