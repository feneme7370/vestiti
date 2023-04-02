<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create(['name' => 'lunes', 'slug' => 'lunes']);
        Day::create(['name' => 'martes', 'slug' => 'martes']);
        Day::create(['name' => 'miercoles', 'slug' => 'miercoles']);
        Day::create(['name' => 'jueves', 'slug' => 'jueves']);
        Day::create(['name' => 'viernes', 'slug' => 'viernes']);
        Day::create(['name' => 'sabado', 'slug' => 'sabado']);
        Day::create(['name' => 'domingo', 'slug' => 'domingo']);
    }
}
