<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Apiary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apiary::factory(20)->create();
    }
}
