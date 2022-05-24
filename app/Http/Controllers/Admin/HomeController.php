<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $tracks = Track::orderBy('id' , 'desc')->limit(5)->get() ;
        $courses = Course::orderBy('id' , 'desc')->limit(5)->get() ;
        $users = User::orderBy('id' , 'desc')->limit(5)->get() ; 
        $quizzes = Quiz::orderBy('id' , 'desc')->limit(5)->get() ; 

        return view('admin.dashboard', compact('tracks' , 'courses' , 'users' , 'quizzes'));
    }
}
