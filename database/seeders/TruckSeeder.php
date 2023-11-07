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
            'image' => 'trucks/RE-121.png',
            'user_id' => 2,
        ]);
        Truck::create([
            'unit' => 'RE-123',
            'image' => 'trucks/RE-123.png',
            'user_id' => 3,
        ]);
        Truck::create([
            'unit' => 'RE-124',
            'image' => 'trucks/RE-124.png',
            'user_id' => 4,
        ]);

        Truck::create([
            'unit' => 'RE-125',
            'image' => 'trucks/RE-125.png',
            'user_id' => 5,

        ]);

        Truck::create([
            'unit' => 'RE-135',
            'image' => 'trucks/RE-135.png',
            'user_id' => 6,
        ]);
    }
}
