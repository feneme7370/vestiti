<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Fnm\ApiarySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Fnm\DaySeeder;
use Database\Seeders\Fnm\RoleSeeder;
use Database\Seeders\Fnm\CompanySeeder;
use Database\Seeders\Fnm\DiseaseSeeder;
use Database\Seeders\Fnm\PictureSeeder;
use Database\Seeders\Fnm\CampaignSeeder;
use Database\Seeders\Fnm\CategorySeeder;
use Database\Seeders\Fnm\MedicineSeeder;
use Database\Seeders\Fnm\PlagueSeeder;
use Database\Seeders\Fnm\TypeMoneySeeder;
use Database\Seeders\Fnm\TypeVisitSeeder;
use Database\Seeders\Fnm\VisitSeeder;

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
            CampaignSeeder::class,
            DiseaseSeeder::class,
            PlagueSeeder::class,
            TypeVisitSeeder::class,
            MedicineSeeder::class,
            ApiarySeeder::class,
            VisitSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
