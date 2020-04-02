<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded=[];

    public function questionnaire(){
    	return $this->belongsTo(Questionnaire::class);
    }

    //has many ressponses or answers for a single survey 
    // i.e. one many answersId or answers(in different rows) for a single surveyId  
    public function surveyresponses(){
    	return $this->hasMany(SurveyResponse::class);
    }
}
