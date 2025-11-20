<?php

namespace Database\Seeders;

use App\Models\Regalo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Regalo::create([
            'id' => '0',
            'name' => 'Prueba seeder',
        ]);
    }
}
