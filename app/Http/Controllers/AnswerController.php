<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_question)
    {
        if (!Auth::check()) return redirect('/login');

        $question = Question::find($id_question);
        // join('users', 'questions.user_id', '=', 'users.id')
        //             ->get(['questions.*', 'users.name'])
        //             ->find($id_question);
        // dd($question);
        return view('answer.create_answer', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'content' => 'required',
        ]);
        $question = Answer::create([
            'user_id' => Auth::id(),
            'question_id' => $request['question_id'], 
            'content' => $request['content']
    	]);
        return redirect()->route('questions.index')->with('success','Answer successfully posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($id_question)
    {
        //
        $question = Question::join('users', 'questions.user_id', '=', 'users.id')
                    ->where('questions.id',$id_question)
                    ->get(['questions.*', 'users.name']);
        $answers = Answer::join('users', 'answers.user_id', '=', 'users.id')
                    ->where('question_id',$id_question)
                    ->get(['answers.*', 'users.name']);
        // dd($question);
        return view('question.show_question')->with([
            'question' => $question[0],
            'answers' => $answers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id_answer)
    {
        //
        $answer = Answer::find($id_answer);
        return view('answer.edit_answer', compact('answer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_answer)
    {
        //
        $request->validate([
            'content' => 'required',
        ]);
        $answer = Answer::find($id_answer)->update([
            // 'user_id' => Auth::id(),
            'content' => $request['content']
        ]);
        return redirect()->route('answered.by.user')->with('success','Answer successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_answer)
    {
        //
        $answer = Answer::find($id_answer)->delete();
        return back()->with('Success', 'Answer deleted successfully');
    }

    public function user_answer()
    {
        $answers = Answer::where('user_id', Auth::id())->orderBy('created_at')->get();

        return view('answer.user_answer')->with([
            'answers' => $answers,
        ]);
    }
}
