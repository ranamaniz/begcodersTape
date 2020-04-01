<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionController extends Controller
{
    //

    public function create(Questionnaire $questionnaire){
    	return view('question.create',['questionnaire'=>$questionnaire]);
    }

    public function store(Questionnaire $questionnaire){
    	// dd(request()->all());
    	$data = request()->validate([
    		'question.question'=>'required',
    		'answers.*.answer'=>'required',
    	]);

    	// dd($questionnaire);
    	// dd($data['answers']);
    	// dd($data['question']['question']);

    	$question = $questionnaire->questions()->create($data['question']);
    	$question->answers()->createMany($data['answers']);

    	return redirect('/questionnaires/'.$questionnaire->id);
    }
}
