<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jayusman',
            'email' => 'pemilik@gmail.com',
            'username' => 'pemilik',
            'password' => '11111',
        ])->assignRole('pemilik');
        User::factory()->create([
            'name' => 'Ahmad ',
            'email' => 'manager@gmail.com',
            'username' => 'ahmad',
            'password' => '11111',
            'store_id' => 1,
        ])->assignRole('ahmad');
        User::factory()->create([
            'name' => 'Rya',
            'email' => 'rya@gmail.com',
            'username' => 'rya',
            'password' => '11111',
            'store_id' => 1,
        ])->assignRole('rya');
        User::factory()->create([
            'name' => 'aryo',
            'email' => 'aryo@gmail.com',
            'username' => 'aryo',
            'password' => 'aryo',
            'store_id' => 1,
        ])->assignRole('aryo');
        User::factory()->create([
            'name' => 'adam',
            'email' => 'adam@gmail.com',
            'username' => 'adam',
            'password' => '11111',
            'store_id' => 2,
        ])->assignRole('adam');
    }
}
