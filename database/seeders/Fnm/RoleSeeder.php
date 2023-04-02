<?php

namespace Database\Seeders\Fnm;

use App\Models\Fnm\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'admin','slug' => 'admin' ,'description' => 'una breve descripcion']);
        Role::create(['name' => 'usuario','slug' => 'usuario', 'description' => 'una breve descripcion']);
        Role::create(['name' => 'empleado','slug' => 'empleado' , 'description' => 'una breve descripcion']); 

    }
}
