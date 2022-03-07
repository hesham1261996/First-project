<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**)
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id' , 'desc')->paginate(15) ; 
        return view('admin.quizzes.index' , compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Quiz $quiz)
    {
        $roulles = [
            'name' => 'required|min:10|max:100' , 
            'course_id' => 'integer'
        ];
        $this->validate($request , $roulles);

        if($quiz->create($request->all())){

            return redirect('admin/quizzes')->withStatus('successfuly craete') ; 
        }else{
            return redirect('admin/quizzes')->withStatus('successfuly craete') ; 
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('admin/quizzes/show' , compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('admin/quizzes/edit' , compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $roulles = [
            'name' => 'required|min:10|max:100' , 
            'course_id' => 'integer'
        ];
        $this->validate($request , $roulles);

        if($quiz->update($request->all())){
            return redirect('admin/quizzes');

        }else{
            return redirect('admin/'.$quiz->id.'/edit');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        if($quiz->delete()){
            
            return redirect('admin/quizzes');

        }
    }
}
