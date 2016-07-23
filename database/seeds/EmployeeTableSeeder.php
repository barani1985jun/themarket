<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Employee;
class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach(range(1,10) as $index)
        {
        	Employee::create([
        			'name' => $faker->name(),
        			'email' => $faker->email(),
        			'contact_number' => rand(10000,3958675),
        			'position' => $faker->randomElement($array=array('Project Lead','Project Member','Project Manager', 'Software Developer' ,' Back End Developer'))

        		]);

        		
        }
    }
}
