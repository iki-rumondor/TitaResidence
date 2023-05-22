<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'admin',
            'password' => \bcrypt('admin'),
            'phone_num' => 123124109009,
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'username' => 'Ilham',
            'password' => \bcrypt(12345678),
            'phone_num' => '+6285341965179',
            'level' => 'Basic',
        ]);
        $user->assignRole('customer');
        
        House::create([
            'model' => 'Tipe A',
            'price' => 1000000,
            'bedrooms' => 2,
            'bathrooms' => 1,
            'size' => 120,
            'image' => 'contoh',
            'status' => 'Dijual',
        ]);
    }
}
