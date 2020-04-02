<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
   protected $guarded=[];

   // response belongs to a survey 
   public function survey(){
   	$this->belongsTo(Survey::class);
   }

   //ofcourse question is also related to surey response
   //when we delete questions, we must delete survey response related to that question too
   //Hence there is a relation to be made(which is already there but not coded or written in function) 
   public function question(){
   	return $this->belongsTo(Question::class); 
   	//a survey response belongs to a question in a questionnaire
   	//a survey has many survey response for single question
   }


   // a response belongs to answer
   // i.e. in a survey, a user gives one response or choose one answer for certain question
   public function answer(){
   	return $this->belongsTo(Answer::class);
   }
}
