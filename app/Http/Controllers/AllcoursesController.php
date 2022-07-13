<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AllcoursesController extends Controller
{

    public function index()
    {
        $courses = Course::cursorPaginate(16);
        return view('allcourses' , compact('courses'));
    } 

}
