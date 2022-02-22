<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Quiz::class ;
    public function definition()
    {
        return [
            'name' => $this->faker->word() ,
            'course_id' => Course::all()->random()->id ,
        ];
    }
}
