<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'federico',
            'last_name' => 'marasco',
            'email' => 'marascofederico95@gmail.com',
            'password' => '$2y$10$H3y0R1g78fkWWKNb.rftQ.M4sbnVroGD5WrpVBCv2UK2eiNtw/Mg6',
            'document' => '38916700',
            'adress' => 'arenales 356',
            'phone' => '2396513953',
            'description' => 'una breve descripcion',
            'birthday' => '1995-09-07',
            'status' => true,
            'role_id' => '1',
            'company_id' => '1',
        ]);
    }
}
