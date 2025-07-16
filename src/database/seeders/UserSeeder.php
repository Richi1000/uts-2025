<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );
        $admin->assignRole('super_admin');
        
        $murid1 = User::firstOrCreate(
            ['email' => 'richie@admin.com'],
            ['name' => 'Richie Yaputra', 'password' => Hash::make('password')]
        );
        $murid1->assignRole('murid');

        $murid2 = User::firstOrCreate(
            ['email' => 'Hisyam@admin.com'],
            ['name' => 'Hisyam Mubarok', 'password' => Hash::make('password')]
        );
        $murid2->assignRole('murid');

        $guru1 = User::firstOrCreate(
            ['email' => 'aryprabowo@admin.com'],
            ['name' => 'Ary Prabowo', 'password' => Hash::make('password')]
        );
        $guru1->assignRole('guru');

        $guru2 = User::firstOrCreate(
            ['email' => 'RinaMarlina@admin.com'],
            ['name' => 'RinaMarlina', 'password' => Hash::make('password')]
        );
        $guru2->assignRole('guru');

        $guru3 = User::firstOrCreate(
            ['email' => 'Lamria@admin.com'],
            ['name' => 'Lamria', 'password' => Hash::make('password')]
        );
        $guru3->assignRole('guru');

        $user = User::firstOrCreate(
            ['email' => 'user@admin.com'],
            ['name' => 'User Account', 'password' => Hash::make('password')]
        );
        $user->assignRole('user');
    }
}
