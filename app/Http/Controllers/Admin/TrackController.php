<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class TrackController extends Controller
{

    public function index()
    {
        $tracks = Track::orderBy('id' , 'desc')->paginate(15) ;  
        return view('admin.tracks.index' , compact('tracks'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request , Track $track) 
    {
        $roules = [
            'name' => 'required|min:3'
        ];
        $this->validate($request , $roules );

        $track->create($request->all());

        return redirect('admin/tracks')->withStatus(__('successefully create'));

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('admin.tracks.show' , compact('track'));
    }


    public function edit(Track $track )
    {
        return view('admin.tracks.edit' , compact('track'));
    }


    public function update(Request $request, Track $track )
    {
        $roules = [
            'name' => 'required|min:5'
        ];
        $this->validate($request , $roules );

        if($request->has('name')){
            $track->name = $request->name ;
        }
        if($track->isDirty()){

            $track->save() ;
            return redirect('admin/tracks')->withstatus('successfully update');
        }else{
            return redirect('admin/tracks/'. $track->id .'/edit')->withstatus('Nothing update');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Track $track)
    {
        $track->delete();
        return redirect('admin/tracks')->withstatus('successfully delete');
    }
}
