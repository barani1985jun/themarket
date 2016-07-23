<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=array('MEN','WOMEN','KIDS','FASHION','CLOTHES','SHOES');
        foreach(range(0,5) as $index)
        {
            Category::create([
                'category_name'=>$cat[$index]
                ]);
        }
    }
}
