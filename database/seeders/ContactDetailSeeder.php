<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_details')->insert([
            'email' => 'admin@admin.com',
            'address' =>'Dummy Address',
            'contact_number' =>'9878232424',
        ]);
    }
}
