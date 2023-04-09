<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Visit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visit::factory(30)->create();
    }
}
