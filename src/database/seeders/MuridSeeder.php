<?php

namespace Database\Seeders;

use App\Models\Murid;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $murid1 = User::where('email', 'richie@admin.com')->first();
        $murid2 = User::where('email', 'Hisyam@admin.com')->first();

        Murid::create([
            'user_id' => $murid1->id,
            'nim' => '20230801544',
            'nama' => 'Richie Yaputra',
            'tanggal_lahir' => '2000-02-01',
            'alamat' => 'Jl. Teluk gong, Jakarta',
            'no_telepon' => '081188770012',
        ]);

        Murid::create([
            'user_id' => $murid2->id,
            'nim' => '20230801543',
            'nama' => 'Hisyam Mubarok',
            'tanggal_lahir' => '1999-01-01',
            'alamat' => 'Jl. Kebangsaan No. 5, Bogor',
            'no_telepon' => '082112345678',
        ]);
    }
}
