<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Measure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Measure::create(['short_name' => 'km', 'name' => 'kilometro', 'slug' => 'kilometro','description' => 'la descripcion']);
        Measure::create(['short_name' => 'mt', 'name' => 'metros', 'slug' => 'metros','description' => 'la descripcion']);
        Measure::create(['short_name' => 'kg', 'name' => 'kilogramos', 'slug' => 'kilogramos','description' => 'la descripcion']);
        Measure::create(['short_name' => 'gm', 'name' => 'gramos', 'slug' => 'gramos','description' => 'la descripcion']);
    }
}
