<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;
use Alert;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('all_questions', compact('questions'));
    }

    public function create()
    {
        if (!Auth::check()) return redirect('/login');
        
        return view('question.create_question');
    }

    public function store(Request $request)
    {  
        $request->validate([
            'title' => 'required|max:45',
            'content' => 'required'
        ]);

        Question::create([
            'user_id' => Auth::id(),
    		'title' => $request['title'],
            'content' => $request['content']
    	]);

        return redirect()->route('questions.index')->with('success','Question successfully posted');
    }

    public function show($id)
    {
        $question = Question::find($id);

        return view('question.show_question', compact('question'));
    }

    public function edit($id)
    {
        $question = Question::find($id);

        return view('question.edit_question', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:45',
            'content' => 'required'
        ]);

        Question::find($id)->update([
    		'title' => $request->title,
            'content' => $request->content
    	]);

        return redirect('/user_question')->with('success','Question updated successfully');
    }

    public function destroy($id)
    {
        $question = Question::find($id)->delete();

        return back();
    }

    public function user_question()
    {
        $questions = Question::where('user_id', Auth::id())->orderBy('created_at')->get();

        confirmDelete('Delete Question', 'Are you sure you want to delete this question?');

        return view('question.user_question', compact('questions'));
    }
}
