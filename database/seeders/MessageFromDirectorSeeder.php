<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageFromDirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messagefromdirectors')->insert([
            'title' => 'Message from Director',
            'image' =>'image.png',
            'description' =>'This is default message.',
        ]);
    }
}
