<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Truck::create([
            'unit' => 'RE-121',
            'image' => 'categories/CURSOS.png',
            'user_id' => 1,

        ]);

        Truck::create([
            'unit' => 'RE-122',
            'image' => 'categories/TENIS.png',
            'user_id' => 2,
        ]);
        Truck::create([
            'unit' => 'RE-123',
            'image' => 'categories/CELULARES.png',
            'user_id' => 3,
        ]);
        Truck::create([
            'unit' => 'RE-124',
            'image' => 'categories/COMPUTADORAS.png',
            'user_id' => 4,
        ]);
    }
}
