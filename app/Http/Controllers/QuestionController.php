<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;
use App\Models\Category;
use App\Models\QuestionCategory;
use Alert;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        
        return view('all_questions')->with([
            'questions' => $questions,
            'search' => ''
        ]);
    }

    public function search(Request $request)
    {
        $questions = Question::whereRaw("UPPER(title) LIKE '%". strtoupper($request['search'])."%'")->get(); 

        return view('all_questions')->with([
            'questions' => $questions,
            'search' => $request['search']
        ]);
    }

    public function create()
    {
        if (!Auth::check()) return redirect('/login');

        $categories = Category::all();
        
        return view('question.create_question', compact('categories'));
    }

    public function store(Request $request)
    {  
        $request->validate([
            'title' => 'required|max:45',
            'content' => 'required',
            'category' => 'required'
        ]);

        $question = Question::create([
            'user_id' => Auth::id(),
    		'title' => $request['title'],
            'content' => $request['content']
    	]);

        for ($i = 0; $i < sizeof($request['category']); $i++)
        {
            QuestionCategory::create([
                'category_id' => $request['category'][$i],
                'question_id' => $question->id
            ]);
        }

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

        $categories = Category::all();

        return view('question.edit_question', compact('question', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:45',
            'content' => 'required',
            'category' => 'required'
        ]);

        $question = Question::find($id)->update([
            'user_id' => Auth::id(),
    		'title' => $request['title'],
            'content' => $request['content']
    	]);

        $question_category = QuestionCategory::where('question_id', $id)->delete();

        for ($i = 0; $i < sizeof($request['category']); $i++)
        {
            QuestionCategory::create([
                'category_id' => $request['category'][$i],
                'question_id' => $id
            ]);
        }

        return redirect('/user_question')->with('success','Question updated successfully');
    }

    public function destroy($id)
    {
        $question = Question::find($id)->delete();

        return back()->with('Success', 'Question deleted successfully');
    }

    public function user_question()
    {
        $questions = Question::where('user_id', Auth::id())->orderBy('created_at')->get();

        return view('question.user_question')->with([
            'questions' => $questions,
            'search' => ''
        ]);
    }

    public function search_user_question(Request $request)
    {
        $questions = Question::whereRaw("user_id = " . Auth::id() . " AND UPPER(title) LIKE '%". strtoupper($request['search'])."%'")->orderBy('created_at')->get();

        return view('question.user_question')->with([
            'questions' => $questions,
            'search' => $request['search']
        ]);
    }
}
