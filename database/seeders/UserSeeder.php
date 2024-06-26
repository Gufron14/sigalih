<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            "nik" => "3205201403010002",
            "password" => bcrypt("password"),
            "phone" => "081234567890",
            "email" => "gufron@test.com",
        ]);
        \App\Models\User::create([
            "nik" => "3205202711030003",
            "password" => bcrypt("password"),
            "phone" => "081234567891",
            "email" => "test@test.com",
        ]);
    }
}
