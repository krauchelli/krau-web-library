<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            ['title' => 'Sword Art Online', 'author' => 'Reki Kawahara', 'published_date' => '2009-04-10', 'isbn' => '9784048677608', 'category_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'Toradora!', 'author' => 'Yuyuko Takemiya', 'published_date' => '2006-03-10', 'isbn' => '9784048677609', 'category_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'No Game No Life', 'author' => 'Yuu Kamiya', 'published_date' => '2012-04-25', 'isbn' => '9784048677610', 'category_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'Accel World', 'author' => 'Reki Kawahara', 'published_date' => '2009-02-10', 'isbn' => '9784048677611', 'category_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}