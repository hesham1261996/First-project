<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $user_courses = Course::orderBy('id')->paginate(20);

        $tracks = Track::with('courses')->orderBy('id' , 'desc')->get();
        
        // $user_courses= Course::findOrFail(1)->users;
        return view('home' , compact('user_courses' , 'tracks')) ;
    }
}
