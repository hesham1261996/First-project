<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Photo::class ;
    public function definition()
    {
        $userid = User::all()->random()->id;
        $courseid = Course::all()->random()->id;
        $photoablaid = $this->faker->randomElement([$userid , $courseid ]);
        $photoablatype = $photoablaid == $userid ? 'App\Models\User' : 'App\Models\Course' ;

        return [
            'filename'=>$this->faker->randomElement(['1.Jpg' ,'2.Jpg' , '3.Jpg' , '4.Jpg' ,
                                                        '5.Jpg' , '6.Jpg' , '7.Jpg']),
            'photoable_id'=> $photoablaid ,
            'photoable_type' => $photoablatype
        ];
    }
}
