<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Course::class;
    public function definition()
    {
        $title = $this->faker->sentence ; 
        return [
            'title'         => $title,
            'description'   => $this->faker->randomLetter(),
            'slug'          => strtolower(str_replace(' ','-', $title)),
            'status'        => $this->faker->randomElement([0,1]),
            'link'          => $this->faker->url() ,
            'track_id'      => Track::all()->random()->id
        ];
    }
}
