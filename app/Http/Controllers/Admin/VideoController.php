<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index' , compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $roull = [
            'title' => 'required|min:10' ,
            'link' => 'required|min:10' 
        ];
        $this->validate($request , $roull) ; 
        Video::create($request->all());

        return redirect('admin/videos')->withStatus('successfuly create');
    }


    public function show(Video $video)
    {
        return view('admin/videos/show' , compact('video'));
        
    }


    public function edit(Video $video)
    {
        return view('admin.videos.edit' , compact('video'));
    } 


    public function update(Request $request, Video $video)
    {
        $roull = [
            'title' => 'required|min:10' ,
            'link' => 'required|min:10' 
        ];
        $this->validate($request , $roull) ;

        if($video->update($request->all())){
            return redirect('admin/videos')->withstatus('succefully update');
        }else{
            return redirect('admin/videos/'.$video->id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Video $video)
    {
        $video->delete() ;
        if($video){
            return redirect('admin/videos')->withstatus('succefully Delete');
        }else{
            return redirect('admin/videos')->withstatus(' sonthing wrong , try agane.');
        }
    }
}
