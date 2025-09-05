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
            UserSeeder::class,
            // Add other seeders here as needed
        ]);

        // Optionally, you can create additional users for testing
        // Uncomment the line below to create 50 random users
        //
        
        // User::factory(50)->create();
    }
}
