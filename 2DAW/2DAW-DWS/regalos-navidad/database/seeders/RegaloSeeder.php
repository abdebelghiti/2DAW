<?php

namespace Database\Seeders;

use App\Http\Controllers\RegaloController;
use App\Models\Regalo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegaloSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Regalo::create([
            'id' => '0',
            'name' => 'Prueba seeder'
            //Se intentan insertar campos que no tengo en la bd (updated_at, created_at)
        ]);
    }
}
