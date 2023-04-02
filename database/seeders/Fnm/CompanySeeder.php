<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'TuMiel',
            'slug' => 'tumiel',
            'email' => 'tumiel@gmail.com.ar',
            'phone' => '2396513953',
            'adress' => 'Av. Maya 256',
            'city' => 'pehuajo',
            'status' => true,
            'social' => '{"facebook":"facebook.com","twitter":"twiter.com","instagram":"instagram.com","youtube":"youtube.com","tiktok":"tiktok.com"}'
        ]);
        Company::factory(10)->create();
    }
}
