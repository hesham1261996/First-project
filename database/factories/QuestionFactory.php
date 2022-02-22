<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Question::class ;
    public function definition()
    {

        $answers = $this->faker->paragraph(true) ;
        $right_answer =  $this->faker->randomElement(explode(' ' , $answers)) ; 
        return [
            'title' => $this->faker->randomLetter() ,
            'answers' => $answers ,
            'right_answer' => $right_answer , 
            'score'=>$this->faker->randomElement([10 ,20 ,30]) ,
            'quize_id'=> Quiz::all()->random()->id
            
        ];
    }
}
