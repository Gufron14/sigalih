<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nik" => fake()->numberBetween(16),
            "nama" => fake()->name(),
            "ttl" => fake()->date(),
            "jk" => 0,
            "alamat" => fake()->address(),
            "rt" => fake()->numberBetween(16),
            "rw" => fake()->numberBetween(16),
            "desa" => fake()->address(),
            "agama" => fake()->name(),
            "stts_perkawinan" => false,
            "pekerjaan" => fake()->jobTitle(),
            "kewarganegaraan" => fake()->country() 
        ];
    }
}
