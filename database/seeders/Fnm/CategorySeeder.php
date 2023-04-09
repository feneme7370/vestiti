<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'type' => 'egresos', 
            'name' => 'compra', 
            'slug' => 'compra',
            'description' => 'la descripcion',
        ]);
        Category::create([
            'type' => 'ingresos', 
            'name' => 'venta', 
            'slug' => 'venta',
            'description' => 'la descripcion',
        ]);
    }
}
