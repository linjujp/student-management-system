<?php

/**
 * @author    Linju Jayaprakash <linjujp@gmail.com>
 * @license   @linju
 * @copyright 2022, Linju Jayaprakash
 * 
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        $faker = \Faker\Factory::create();

        DB::table("students")->insert([
            "name" => $faker->name(),
           
        ]);


    }
}
