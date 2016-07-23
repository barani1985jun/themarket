<?php

use Illuminate\Database\Seeder;
use App\Brand;
class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand=array('ESPIRIT','SPM','THOMAS COOK','UNILIVER','LIFESTYLE','TONNY BLARE');
        foreach(range(0,5) as $index)
        {
            Brand::create([
                'brand_name'=>$brand[$index]
                ]);
        }
    }
}
