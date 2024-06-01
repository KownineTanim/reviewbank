<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $reviews = [];
        $pids = \App\Models\Product::where('status', 'active')->pluck('id')->toArray();
        $pbids = \App\Models\User::where('status', 'active')->pluck('id')->toArray();

        foreach (range(1, 100000) as $i) {
            $faker = \Faker\Factory::create();
            $review =[
                'token' => Str::slug($faker->name()),
                'product_id' => $pids[array_rand($pids)],
                'posted_by' => $pbids[array_rand($pbids)],
                'price_rating' => $faker->numberBetween(1, 5),
                'quality_rating' => $faker->numberBetween(1, 5),
                'design_rating' => $faker->numberBetween(1, 5),
                'durability_rating' => $faker->numberBetween(1, 5),
                'service_rating' => $faker->numberBetween(1, 5),
                'description' => $faker->paragraph(),
                'status' => 'active'
            ];
            // $reviews[] = $review;
            try {
                \App\Models\Review::insert($review);
                print_r(["$i) Done"]);
            } catch (\Exception $e) {

            }
        }

        // \App\Models\Review::insert($reviews);
    }
}
