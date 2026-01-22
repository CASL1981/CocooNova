<?php

namespace Database\Seeders;

use App\Models\Characteristic;
use Illuminate\Database\Seeder;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Characteristic::factory()->create([
            'name' => 'Tipo libreta militar',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'estrato socioeconómico',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'Tipo de vivienda',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'Genero',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'Tipo de sangre',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'Estado civil',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'Cargo',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        Characteristic::factory()->create([
            'name' => 'Area funcional',
            'FieldName' => '',
            'Modelo' => 'Employee',
        ]);

        // Characteristic::factory()->count(10)->create();
    }
}
