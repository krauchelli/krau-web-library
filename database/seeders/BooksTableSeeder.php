<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('books')->insert([
        //     ['title' => 'Sword Art Online', 'author' => 'Reki Kawahara', 'published_date' => '2009-04-10', 'isbn' => '9784048677608', 'category_id' => 1, 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['title' => 'Toradora!', 'author' => 'Yuyuko Takemiya', 'published_date' => '2006-03-10', 'isbn' => '9784048677609', 'category_id' => 2, 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['title' => 'No Game No Life', 'author' => 'Yuu Kamiya', 'published_date' => '2012-04-25', 'isbn' => '9784048677610', 'category_id' => 3, 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['title' => 'Accel World', 'author' => 'Reki Kawahara', 'published_date' => '2009-02-10', 'isbn' => '9784048677611', 'category_id' => 4, 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        // ]);
        $faker = Faker::create();

        foreach (range(1, 25) as $index) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'published_date' => $faker->date(),
                'isbn' => $faker->isbn13,
                'category_id' => $faker->numberBetween(1, 4),
                'user_id' => $faker->numberBetween(1, 5),
                'description' => $faker->paragraph,
                'amount' => 5,
                'filename' => null, // Default value
                'cover_image' => null, // Default value
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}