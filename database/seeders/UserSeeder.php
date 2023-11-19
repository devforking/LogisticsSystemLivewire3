<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Nes GC',
            'phone' => '2333035355',
            'email' => 'polodev10@gmail.com',
            'profile' => 'admin',
            'status' => 'ACTIVE',
            'password' => bcrypt('secret2'),
            'profile_photo_path' => 'users/mapache.jpg'
        ]);
        User::create([
            'name' => 'Kevin Mad',
            'phone' => '785035355',
            'email' => 'kevin@gmail.com',
            'profile' => 'driver',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Juan',
            'phone' => '785035355',
            'email' => 'Juan@gmail.com',
            'profile' => 'driver',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Augusto',
            'phone' => '785035355',
            'email' => 'Augusto@gmail.com',
            'profile' => 'driver',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Carlos',
            'phone' => '785035355',
            'email' => 'Carlos@gmail.com',
            'profile' => 'driver',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Pedro',
            'phone' => '785035355',
            'email' => 'Pedro@gmail.com',
            'profile' => 'driver',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Manuel Espinas',
            'phone' => '7850353552',
            'email' => 'manuel@gmail.com',
            'profile' => 'maintenance',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'Marcos Angel',
            'phone' => '7850353551',
            'email' => 'marcos@gmail.com',
            'profile' => 'information technology',
            'status' => 'ACTIVE',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'Melisa Hall',
            'phone' => '785035355',
            'email' => 'melisah@gmail.com',
            'profile' => 'washing',
            'status' => 'LOCKED',
            'password' => bcrypt('admin')
        ]);
    }
}
