<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'costcenter' => '1',
            'name' => 'Oficina principal',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1',
        ]);

        Destination::create([
            'costcenter' => '1000',
            'name' => 'Farmacia Pueblo Nuevo',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1000',
        ]);
        Destination::create([
            'costcenter' => '1100',
            'name' => 'farmacia Valencia',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1100',
        ]);
        Destination::create([
            'costcenter' => '1300',
            'name' => 'Farmacia Montelibano',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1300',
        ]);

        Destination::create([
            'costcenter' => '1600',
            'name' => 'Farmacia San Antero',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1600',
        ]);

        Destination::create([
            'costcenter' => '2200',
            'name' => 'Farmacia San Carlos',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '2200',
        ]);
    }
}
