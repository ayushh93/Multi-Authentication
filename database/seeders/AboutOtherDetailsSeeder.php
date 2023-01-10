<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutOtherDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aboutotherdetails')->insert([
            'title1' => 'Expedition success rate',
            'value1' => '100%',
            'title2' => 'Climbers',
            'value2' => '1000+',
            'title3' => 'Trek success rate',
            'value3' => '100%',
        ]);
    }
}
