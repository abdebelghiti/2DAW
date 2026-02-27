<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guests')->insert([
            'nombre' => fake()->name(),
            'apellidos' => fake()->lastName(),
            'email' => fake()->email(),
            'edad' => rand(5,45)
        ]);
    }
}
