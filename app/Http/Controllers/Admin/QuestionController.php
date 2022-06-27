<?php

namespace App\Http\Controllers\Admin;
use App\Models\Question ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id' , 'desc')->paginate(30);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Question $question)
    {
        $rules = [
            'title' => 'required|min:5|max:1000',
            'answers' => 'required|min:5|max:1000',
            'right_answer' => 'required|min:5|max:1000',
            'score' => 'required|integer|in:5,10,15,20,25,30',
            'quize_id' => 'required|integer' ,
            'type' => 'required'
            
        ];
        $this->validate($request , $rules);
        if($question->create($request->all())){

            return redirect('admin/questions')->withStatus('question successfuly created');
            
            
        }else{
            
            return redirect('admin/questions')->withStatus('something wrong try agene');
        }

    }


    public function edit(Question $question)
    {
        return view('admin.questions.edit' , compact('question'));
    }


    public function update(Request $request, Question $question )
    {
        $rules = [
            'title' => 'required|min:5|max:1000' , 
            'answers'=> 'required|min:5|max:1000' , 
            'right_answer'=>'required|min:5|max:1000' , 
            'score' => 'required|integer|in:5,10,15,20,25,30',
            'quize_id' => 'required|integer' ,
            'type' => 'required'
        ];
        $this->validate($request , $rules);
        if($question->update($request->all())){
            return redirect('admin/questions')->withStatus('question successfuly update');
        }else{
            return redirect('admin/questions/'.$question->id.'/edit')->withStatus('sonething wrong try agane');
        }

        
    }


    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('admin/questions')->withStatus('question successfuly deleted');

    }
}
