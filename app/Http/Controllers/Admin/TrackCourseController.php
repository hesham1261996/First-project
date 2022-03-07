<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackCourseController extends Controller
{

    public function create(Track $track)
    {
        return view('admin.tracks.courseCreate' , compact('track'));
    }

    
}
