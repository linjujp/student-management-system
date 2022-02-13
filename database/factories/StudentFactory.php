<?php

/**
 * @author    Linju Jayaprakash <linjujp@gmail.com>
 * @license   @linju
 * @copyright 2022, Linju Jayaprakash
 * 
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'name' =>$this->faker->name(),
            'age' => 12,
            'gender' => 'M',
            'teacher_id' => 1,
        ];
    }
}
