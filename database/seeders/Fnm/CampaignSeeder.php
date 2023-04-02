<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::create(['name' => '19/20', 'slug' => '19/20','description' => 'la descripcion']);
        Campaign::create(['name' => '20/21', 'slug' => '20/21','description' => 'la descripcion']);
        Campaign::create(['name' => '22/23', 'slug' => '22/23','description' => 'la descripcion']);
    }
}
