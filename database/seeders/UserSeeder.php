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
            "password" => "password",
            "phone" => "081234567890",
            "email" => "gufron@test.com",
        ]);
    }
}
