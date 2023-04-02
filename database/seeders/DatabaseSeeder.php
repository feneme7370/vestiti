<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Fnm\CategorySeeder;
use Database\Seeders\Fnm\CompanySeeder;
use Database\Seeders\Fnm\DaySeeder;
use Database\Seeders\Fnm\PictureSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Fnm\RoleSeeder;
use Database\Seeders\Fnm\TypeMoneySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            DaySeeder::class,
            PictureSeeder::class,
            TypeMoneySeeder::class,
            UserSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
