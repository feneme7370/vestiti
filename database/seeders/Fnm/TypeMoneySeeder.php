<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\TypeMoney;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeMoney::create(['name' => 'USD', 'slug' => 'usd','description' => 'dolares de estados unidos']);
        TypeMoney::create(['name' => 'EUR', 'slug' => 'eur','description' => 'euros']);
        TypeMoney::create(['name' => '$', 'slug' => 'peso','description' => 'peso argentino']);
    }
}
