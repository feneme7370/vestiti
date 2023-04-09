<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disease::create(['name' => 'Enfermedad 1', 'slug' => 'Enfermedad 1','description' => 'la descripcion', 'company_id' => '1', 'user_id' => '1']);
        Disease::create(['name' => 'Enfermedad 2', 'slug' => 'Enfermedad 2','description' => 'la descripcion', 'company_id' => '1', 'user_id' => '1']);
        Disease::create(['name' => 'Enfermedad 3', 'slug' => 'Enfermedad 3','description' => 'la descripcion', 'company_id' => '1', 'user_id' => '1']);
    }
}
