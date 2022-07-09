<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){


        $tracks = Track::with('courses')->orderBy('id' , 'desc')->get();

        // git famous tracks ids 
        $famous_track_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10); 

        $famous_track = Track::withCount('courses')->whereIn('id' , $famous_track_ids)->orderBy('courses_count','desc')->get();

        if(Auth::check()){
            $user = auth()->user();
            $user_courses =  $user->courses ;
            // user's courses
            $user_courses_ids = $user->courses->pluck('id');

            // uesr's tracks
            $user_tracks_ids = $user->tracks->pluck('id');

            // Courses are not shared by the user
            $recommended_courss = Course::whereIn('track_id' ,$user_tracks_ids )->whereNotIn('id' , $user_courses_ids)->get();

            // $user_courses= Course::findOrFail(1)->users;
            return view('home' , compact('user_courses' , 'tracks' , 'famous_track' , 'recommended_courss')) ;
                
        }else{
            return view('home' , compact('tracks' , 'famous_track'  )) ;
        }



        
        
        

    }
}
