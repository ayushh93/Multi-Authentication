<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhoareweSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('whoarewes')->insert([
            'title' => 'Dummy title',
            'image' =>'image.png',
            'description' =>'This is default description.',
        ]);
    }
}
