<?php

namespace Database\Seeders;

use App\Models\Whoarewe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            SiteSettingSeeder::class,
            ContactDetailSeeder::class,
            MessageFromDirectorSeeder::class,
            RecommendedGearSeeder::class,
            WhoareweSeeder::class,
        ]);
    }
}
