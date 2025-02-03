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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'juanra',
            'email' => 'juan_curbelo@cifpzonzamas.es',
            'password' => Hash::make('password'),
        ]);
        
        User::factory()->create([
            'name' => 'jmorfi',
            'email' => 'morfijorge489@gmail.com',
            'password' => Hash::make('jmorfi'),
        ]);

    }
}
