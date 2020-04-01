<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
class SurveyController extends Controller
{
    //
    public function show(Questionnaire $questionnaire, $slug){
    	// dd($slug)
    	// dd($questionnaire->load('questions.answers'));    	
    	// lazy loading questions and answers
    	$questionnaire->load('questions.answers');

    	// dd($questionnaire);
    	return view('survey.show',compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){
    	// dd(request()->all());

    	$data =request()->validate([
    		'survey.name'=>'required',
    		'survey.email'=>'required|email',
    		'responses.*.answer_id'=>'required',
    		'responses.*.question_id'=>'required'
    	]);

    	// dd($data);
    	// dd($questionnaire->surveys());
    	$survey= $questionnaire->surveys()->create($data['survey']);
    	// dd($data['survey']);
    	$survey->surveyresponses()->createMany($data['responses']);

    	return redirect('/home');
    }
}
