@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>

            <form action="{{ $questionnaire->publicPath() }}" method="post">
                @csrf
                @foreach($questionnaire->questions as $key=>$questionrow)
                <div class="card mt-4">
                    <div class="card-header">
                        <strong>{{ $key+1 }}</strong> <span>{{ $questionrow->question}}</span>
                    </div>    
                    <div class="card-body">
                        @error('responses.'.$key.'.answer_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <ul class="list-group">
                            @foreach($questionrow->answers as $answerrow)
                            <label for="answer{{ $answerrow->id }}">
                                <li class="list-group-item">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" 
                                    id="answer{{ $answerrow->id }}" class="mr-1" 
                                    {{ (old('responses.'.$key.'.answer_id')==$answerrow->id)?'checked':'' }}
                                    value="{{ $answerrow->id }}">   
                                    {{ $answerrow->answer }}

                                    <input type="hidden" name="responses[{{ $key }}][question_id]" 
                                    value="{{ $questionrow->id }}">
                                </li>
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach

                <div class="card mt-4">
                  <div class="card-body mt-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name" name="survey[name]" {{ old('survey[name]')}}>
                        <small id="nameHelp" class="form-text text-muted">Hello, Whats yout name?</small>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" name="survey[email]" {{ old('survey[email]')}}>
                        <small id="emailHelp" class="form-text text-muted">Your email please</small>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-dark" >Complete Survey</button>
        </form>

    </div>
</div>
</div>
@endsection
