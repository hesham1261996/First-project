<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($slug){

        $course = Course::where('slug' , $slug )->first();
        return view('course' , compact('course'));
    }
    public function enroll($slug){
        $course = Course::where('slug' , $slug )->first();
        $user= auth()->user() ;
        $user->courses()->attach([$course->id]); 
        $course = Course::where('slug' , $slug )->first();
        return redirect('/courses/'.$slug)->withStatus('you have enrolled');
    }
}
