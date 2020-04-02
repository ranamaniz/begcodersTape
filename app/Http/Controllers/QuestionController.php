<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;

class QuestionController extends Controller
{
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

    // double model-route biding
    public function destroy(Questionnaire $questionnaire, Question $question){
       // dd($questionnaire);
       // dd($question->answers);

        //delete answer related to question
        $question->answers()->delete(); 
        // delete answers and questions in survey which are related to questions that are to be deleted
        $question->surveyresponses()->delete();        
        $question->delete();

        return redirect($questionnaire->path( ));

    }
}
