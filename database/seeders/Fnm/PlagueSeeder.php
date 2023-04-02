<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Plague;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plague::create(['name' => 'Plaga 1', 'slug' => 'Plaga 1','description' => 'la descripcion']);
        Plague::create(['name' => 'Plaga 2', 'slug' => 'Plaga 2','description' => 'la descripcion']);
        Plague::create(['name' => 'Plaga 3', 'slug' => 'Plaga 3','description' => 'la descripcion']);
    }
}
