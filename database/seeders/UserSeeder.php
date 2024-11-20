<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['username' => "Rick",
            'email' => "rick@gmail.com",
            'password' => Hash::make("rick12345"),
            'token' => Hash::make("rick@gmail.com")],

            ['username' => "Morty",
            'email' => "morty@gmail.com",
            'password' => Hash::make("morty12345"),
            'token' => Hash::make("morty@gmail.com")]
        ];

        DB::table('users')->insert($data);
    }
}
