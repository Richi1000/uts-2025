<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MuridSeeder::class,
            GuruSeeder::class,
            MataPelajaranSeeder::class,
            JamPelajaranSeeder::class,
            BelajarSeeder::class,
            NilaiSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
