<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\This;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model= Video::class ;
    public function definition()
    {
        return [
            'title' =>$this->faker->paragraph(true),

            'link' => $this->faker->url() ,
            'course_id' => Course::all()->random()->id ,
        ];
    }
}
