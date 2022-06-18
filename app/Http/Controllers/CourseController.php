<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($slug){

        $course = Course::where('slug' , $slug )->first();
        return view('course' , compact('course'));
    }
}
