<?php

namespace Database\Seeders;

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
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
            CharacteristicSeeder::class,
            CharacteristicDetailSeeder::class,
        ]);

        // importar datos desde archivos de excel
        $this->call([
            SpreadsheetSeeder::class,
        ]);
    }
}
