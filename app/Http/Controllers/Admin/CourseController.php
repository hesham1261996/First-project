<?php

namespace App\Http\Controllers\Admin;
use App\Models\Course ;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::orderBy('id' , 'desc')->paginate(15) ;
        return view('admin.courses.index' , compact('courses'));
    }


    public function create()
    {
        return view('admin.courses.create') ;
    }

    public function store(Request $request )
    {
        $rouls = [
            'title' => 'required|min:3',
            'link' => 'required|min:5',
            'status' => 'required|in:0,1'
        ];
        $this->validate($request , $rouls);

        $course = Course::create($request->all());

        if($course){


            if ($file=$request->file('image')) {

                $fileName = $file->getClientOriginalName();
                $fileextention = $file->getClientOriginalExtension() ; 
                $file_to_stor = time() .'_'. explode('.', $fileName)[0] .'_.'. $fileextention ; 

                
                
                $file->move('images' , $file_to_stor);   // (move) => to copy the file to folder image

                    Photo::create([

                        'filename' => $file_to_stor , 
                        'photoable_id'=> $course->id , 
                        'photoable_type'=> 'App\Models\Course',
                    ]);
                
            }
            return redirect()->route('courses.index')->withStatus('successfuly create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit( Course  $course)
    {
        return view('admin.courses.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $roules= [
            'title' => 'required|min:3',
            'link' => 'required|min:5',
            'status' => 'required|in:0,1'
        ];
        $this->validate($request , $roules) ; 
        $course->update($request->all());

        if($course){

            if($file = $request->file('image')){
                $fileName= $file->getClientOriginalName();
                $fileextention = $file->getClientOriginalExtension();
                $file_to_store = time() .'_'. explode('.' , $fileName)[0] .'_.'.$fileextention ; 
                

                if($file->move('images' , $file_to_store)){
                    if($course->photo){
                        $photo = $course->photo;

                        $filename = $course->photo->filename;
                        unlink('images/'.$filename) ;  // (unlink) => delete file from location 
                        
                        $photo->filename =  $file_to_store ;
                        $photo->save() ;
                    }else{
                        Photo::create([

                            'filename' => $file_to_store , 
                            'photoable_id'=> $course->id , 
                            'photoable_type'=> 'App\Models\Course',
                        ]);
                    }
                }
                return redirect()->route('courses.index')->withStatus('successfuly Update');
                
            }
        }
    }


    public function destroy(Course $course)
    {
        if($course->photo){
            $filename = $course->photo->filename;
            unlink('images/'.$filename) ;  // (unlink) => delete file from location 

        }
        $course->photo->delete() ;
        $course->delete();
        return redirect()->route('courses.index')->withStatus('successfuly Update');
    }
}
