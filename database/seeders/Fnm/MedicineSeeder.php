<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::create(['name' => 'Medicina 1', 'slug' => 'Medicina 1','description' => 'la descripcion', 'company_id' => '1', 'user_id' => '1']);
        Medicine::create(['name' => 'Medicina 2', 'slug' => 'Medicina 2','description' => 'la descripcion', 'company_id' => '1', 'user_id' => '1']);
        Medicine::create(['name' => 'Medicina 3', 'slug' => 'Medicina 3','description' => 'la descripcion', 'company_id' => '1', 'user_id' => '1']);
    }
}
