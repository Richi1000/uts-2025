<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru1 = User::where('email', 'aryprabowo@admin.com')->first();
        $guru2 = User::where('email', 'RinaMarlina@admin.com')->first();
        $guru3 = User::where('email', 'Lamria@admin.com')->first();

        Guru::create([
            'user_id' => $guru1->id,
            'nip' => '1704',
            'nama' => 'Bapak Ari Prabowo',
            'no_telepon' => '081278912345',
            'alamat' => 'Jl. Pendidikan No. 22, Surabaya',
        ]);

        Guru::create([
            'user_id' => $guru2->id,
            'nip' => '2704',
            'nama' => 'Bu Rina Marlina',
            'no_telepon' => '085612345678',
            'alamat' => 'Jl. Guru Bangsa No. 7, Semarang',
        ]);

        Guru::create([
            'user_id' => $guru3->id,
            'nip' => '2745',
            'nama' => 'Bu Lamria',
            'no_telepon' => '085612345771',
            'alamat' => 'Jl. Guru Bangsa No. 5, Semarang',
        ]);
    }
}
