@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <!-- <h2>Ask  Questions </h2> -->
                                <h1>{{ $question->title }} </h1>
                                <div class="ml-auto"> 
                                <a href="{{ route('questions.index')  }} " class="btn btn-outline-secondary">  Back All Question </a>
                                </div>
                                
                            </div>
                    
                        </div>
                                <hr>  
                        <div class="media">
                            <div class="d-fex flex-column vote-controls">
                            <!-- fonawesome some size of fonts
                            fa-xs .75em
                            fa-sm .875em 
                            fa-lg 1.33 
                            fa-2x - fa-10x  2em - 10em -->

                                                            <a title="This question is useful" class="vote-up" > 
                                <!-- Vote Up  -->
                                <!-- <i class="fas fa-angle-up"></i>   -->
                                <i class="fas fa-caret-up fa-3x"></i>
                                </a> 
                                <span class="votes-count">1230</span>
                                <a title="This question is not useful " class="vote-down off  ">
                                <!-- Vote Down -->
                                <!-- <i class="fas fa-angle-down"></i> -->
                                <i class="fas fa-caret-down fa-3x"></i>
                                 </a>
                                 <a title="Click to mark as favroite question (Click again to undo)" class="favorite mt-2 favorited" >
                                 <!-- favorite -->
                                 <!-- <i class="fas fa-star"></i> -->
                                 <i class="fas fa-star fa-2x"></i>
                                     <span class="favorites-count">123</span>
                                 </a>


                                </div>
                                <div class="media-body">
                                    <h3>{{ $question->body }} </h3>
                                    <div class="float-right">
                                                <span class="text-muted">Questioned {{  $question->created_at }} </span>
                                                <div class="media mt-2 ">
                                                    <a href="{{ $question->user->email }}" class="pr-2">
                                                    <img src="{{ $question->user->avater }}" alt="  ">
                                                    </a>
                                                    <div class="media-body mt-1 ">
                                                        <a href="{{ $question->user->url }}">{{ $question->user->name  }}</a>
                                                    </div>
                                                </div>
                    </div>
                </div>
                    <!-- { !!  $question->body_html !! } -->
                    </form> 
                   <form action="{{ route('questions.store')}}" method="post">
                   <!-- @csrf
                   <div class="form-group">
                    <label for="question-title"> Question title </label>
                    <input type="text" name="title" value="{{ old('title') }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                        <strong> {{ $errors->first('title')}}</strong>
                        </div>
                    @endif
                   </div>
                   <div class="form-group">
                    <label for="question-body"> Explain your question </label>
                    <textarea name="body" id="question-body" rows="10 "class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                        <strong> {{ $errors->first('body')}}</strong>
                        </div>
                    @endif
                   
                   </div>
                   <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-lg"> Ask this Question</button>
                   </div> -->
                   <!-- @include ("questions._form",['buttonText' => "Ask Questions"]) -->
                   

                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count . " " . str_plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                      
                    <div class="media">
                    <div class="d-fex flex-column vote-controls">
                            <!-- fonawesome some size of fonts
                            fa-xs .75em
                            fa-sm .875em 
                            fa-lg 1.33 
                            fa-2x - fa-10x  2em - 10em -->

                                                            <a title="This answer is useful" class="vote-up" > 
                                <!-- Vote Up  -->
                                <!-- <i class="fas fa-angle-up"></i>   -->
                                <i class="fas fa-caret-up fa-3x"></i>
                                </a> 
                                <span class="votes-count">1230</span>
                                <a title="This answer is not useful " class="vote-down off  ">
                                <!-- Vote Down -->
                                <!-- <i class="fas fa-angle-down"></i> -->
                                <i class="fas fa-caret-down fa-3x"></i>
                                 </a>
                                 <a title="Mark this answer as best answer" class="vote-accepted  mt-2" >
                                 
                                 <i class="fas fa-check  fa-2x"></i>
                                    
                                 </a>


                                </div>
                    <div class="media-body">
                         <!-- { !! $answer->body_html !! } -->
                        {{ $answer->body }}
                        
                          <div class="float-right">
                                <span class="text-muted">Answered {{  $answer->created_at }} </span>
                                <div class="media mt-2 ">
                                    <a href="{{ $answer->user->email }}" class="pr-2">
                                    <img src="{{ $answer->user->avater }}" alt="  ">
                                    </a>
                                    <div class="media-body mt-1 ">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name  }}</a>
                                    </div>
                                </div>
                          </div>
                    </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
             </div>
        </div>
    </div>
</div>
@endsection