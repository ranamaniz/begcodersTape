<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	protected $guarded=[];

    public function questionnaire(){
    	return $this->belongsTo(Questionnaire::class);
    }

    //for the same question there are many responses over different surveys
    //i.e. for same question_id-> has many response_id
    public function surveyresponses(){
    	return $this->hasMany(SurveyResponse::class);
    }

    public function answers(){
    	return $this->hasMany(Answer::class);
    }
}
