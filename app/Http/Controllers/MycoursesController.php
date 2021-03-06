<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MycoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user =  auth()->user();
        $user_courses = $user->courses ; 
        return view('mycourses' , compact('user_courses'));
        
    }


}

