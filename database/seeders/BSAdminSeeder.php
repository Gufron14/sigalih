<?php

namespace Database\Seeders;

use App\Models\BSAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BSAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BSAdmin::create([
            'username' => 'bsadmin',
            'password' => bcrypt('password'),
        ]);
    }
}
