<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Div;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($slug , $name) {

        $course = Course::where('slug' , $slug)->first();
        $quiz = $course->Quizzes()->where('name' , $name)->first();

        
        return view('quizzs' , compact('course' , 'quiz'));
    }
    public function submit( $slug , $name , Request $request , Db $data  ) {

        $quiz = Quiz::where('name' , $name)->first();

        $questions = $quiz->questions ; 

        $questions_ids = [];

        $questions_right_answer = []; 

        $quizz_score = 0 ;
        
        
        foreach($questions as $question ){
            $questions_ids[] = $question->id ; 
            $questions_right_answer[] = $question->right_answer ;
            $quizz_score += $question->score ;
            
        }
        for($i= 0 ; $i < count($questions_ids) ; $i++ ){
            $your_answer = trim($request['answer'.$questions_ids[$i]]);
            $the_answer =trim($questions_right_answer[$i]);

            if($your_answer != $the_answer ){
                return back()->withStatus('the answer '.$your_answer.'is not correct');
            }
        }
        // attach user with quizz
        $user = Auth::user();

        $data::table('users')
                ->where('id',$user->id  )
                ->update(['score' => $user->score += $quizz_score ]);
        if($data) {
            return redirect('courses/'.$slug)->withStatus('well done you have solved '.$quiz->name .'Quizz and earned ' . $quizz_score);
        }
        


    }
}
