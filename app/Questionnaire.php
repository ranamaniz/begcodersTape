<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Questionnaire extends Model
{
    //
    protected $guarded=[];

    // using helper to provide path
    // this path leads to show questionnares i.e QuestionnaireController@show
    public function path(){
        // return '/questionnaire'.$questionnaire->id;
        // can use $this instead of $questionnaire
        return url('/questionnaires/'.$this->id);
    }


    public function publicPath(){
        return url('/surveys/'.$this->id.'-'.Str::slug($this->title));
    }

    
    public function user(){
    	return $this->belongsTo(User::Class);
    }

    public function questions(){
    	return $this->hasMany(Question::class);
    }

    public function surveys(){
    	return $this->hasMany(Survey::class);
    }
}
