<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DistrictSeeder::class,
            VillageSeeder::class
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'su@example.com',
            'role' => 0,
            'password' => bcrypt('superadmin'),
        ]);

        User::create([
            'name' => 'Operator 1',
            'email' => 'op1@example.com',
            'role' => 1,
            'password' => bcrypt('operator')
        ]);

        User::create([
            'name' => 'Operator 2',
            'email' => 'op2@example.com',
            'role' => 1,
            'password' => bcrypt('operator')
        ]);
    }
}
