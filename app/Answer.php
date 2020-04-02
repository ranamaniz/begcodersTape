<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $guarded=[];

    public function question(){
    	$this->belongsTo(Question::class);
    }

    //In survey: many response for same answer
    // i.e for answerId = 4, there are more than certain number of response or choices
    // many people choose same choice for a question
    // which means many survey responses for a single answer

    // many user may choose same answer / respond with same answer
    // for a question in a questionnaire
    // i.e an answer may be responded or choosen by many users 
    public function surveyresponses(){
    	return $this->hasMany(SurveyResponse::class);
    }
}
