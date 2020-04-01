@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    {{-- 
                        instead of /questionnaires/{{ $questionnaire->id }} we can use path() fucntion defined on Questionnaire Model 
                    --}}
                    <a href="{{ $questionnaire->path() }}/questions/create" class="btn btn-dark">   Add New Question
                    </a>
                    <a href="{{ $questionnaire->publicPath() }}" 
                        class="btn btn-dark">  
                        Take Survey
                    </a>
                </div>
            </div>

            @foreach($questionnaire->questions as $questionrow)
            {{-- gets a column of question i.e. questionData data --}}
            <div class="card mt-4">
                <div class="card-header">{{ $questionrow->question}}</div>    
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionrow->answers as $answerrow)
                        {{-- gets a row of answer i.e. answerData data --}}

                            <li class="list-group-item">{{ $answerrow->answer }}</li>
                        @endforeach
                    </ul> 
                </div>
            </div>
            @endforeach
      </div>
  </div>
</div>
@endsection
