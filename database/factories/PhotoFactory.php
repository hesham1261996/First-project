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
            'filename'=>$this->faker->randomElement(['1.Jpg' ,'2.Jpeg' , '3.Jpg' , '4.Jpg' ,
                                                        '5.Jpg' , '6.Jpg' , '7.Jpg' , '8.jpg', '9.jpg' , '10.jpg']),
            'photoable_id'=> $photoablaid ,
            'photoable_type' => $photoablatype
        ];
    }
}
