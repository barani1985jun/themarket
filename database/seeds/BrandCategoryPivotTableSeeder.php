<?php

use Illuminate\Database\Seeder;

class BrandCategoryPivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	foreach(range(1,10) as $index)
     	{
     		DB::table('brand_category')->insert([
     			'brand_id'=>rand(1,12),
     			'category_id'=>rand(7,12)
     			]);
     	}   
    }
}
