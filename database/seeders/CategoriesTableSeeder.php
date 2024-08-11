<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Fantasy', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Romance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Adventure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Science Fiction', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}