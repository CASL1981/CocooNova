<?php

namespace Database\Seeders;

use App\Models\Destination;
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
            UserSeeder::class,
            DestinationSeeder::class,
        ]);

        User::factory(50)->create();
        Destination::factory(30)->create();
        
    }
}
