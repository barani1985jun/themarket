<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $price=['1000','500','5000','300','5593','3952','2222','3333','4444','21231','34523','222'];
        foreach(range(0,10) as $index)
        {
            Product::create([
                'name'=>$faker->unique()->word(3),
                'title'=>$faker->word(4),
                'description'=>$faker->paragraph($ndSentences=4),
                'price'=>$price[$index],
                'category_id'=>rand(1,5),
                'brand_id'=>rand(1,5)
                ]);
           
        }

    }
}
