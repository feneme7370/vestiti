<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\TypeVisit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeVisit::create(['name' => 'cosecha', 'slug' => 'cosecha']);
        TypeVisit::create(['name' => 'alimentacion', 'slug' => 'alimentacion']);
        TypeVisit::create(['name' => 'control', 'slug' => 'control']);
        TypeVisit::create(['name' => 'otros', 'slug' => 'otros']);
    }
}
