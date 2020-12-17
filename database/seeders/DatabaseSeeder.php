<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'money',
            'status' => 1
        ]);
        DB::table('types')->insert([
            'name' => 'bonus',
            'status' => 1
        ]);
        DB::table('types')->insert([
            'name' => 'object',
            'status' => 1
        ]);
        DB::table('prize_objects')->insert([
            'name' => 'house',
            'status' => 1
        ]);
        DB::table('prize_objects')->insert([
            'name' => 'car',
            'status' => 1
        ]);
        DB::table('prize_objects')->insert([
            'name' => 'ticket',
            'status' => 1
        ]);



    }
}
