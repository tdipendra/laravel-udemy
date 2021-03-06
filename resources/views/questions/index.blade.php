@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions </h2>
                        <div class="ml-auto"> 
                        <a href="{{ route('questions.create')  }} " class="btn btn-outline-secondary"> Ask Question </a>
                        </div>
                        
                    </div>
                    
                </div>

                    <div class="card-body"> 
                @include ('layouts._messages')
                    @foreach ($questions as $question)
                        <div class="media">
                        <div class="d-flex flex-column counters">
                        <div class="vote">
                        <strong>{{ $question->votes}}</strong>{{ str_plural('vote',$question->votes) }}
                        </div>
                        <div class="status {{ $question->status}} "> 
                        <strong>{{ $question->answers_count}}</strong>{{ str_plural('answer',$question->answers_count) }}
                        </div> 
                        <div class="view">
                         {{ $question->views . " " . str_plural('view',$question->votes) }}
                        </div>
                        </div>
                            <div class="media-body">  
                            <div class="d-flex align-items center">
                            <h3 class="mt-0"> <a href="{{ $question->url }}"> {{ $question->title }}</a> ></h3>
                            <div class="ml-auto">
                            @if (Auth::user()->can('update',$question))
                            <!-- @can ('update',$question) -->
                                <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-sm btn-outline-info " >Edit</a>
                            @endif
                            <!-- @endcan -->
                            @if (Auth::user()->can('delete',$question))

                                <!-- @can('delete',$question) -->
                                    <form class="form-delete" method="post" action="{{ route('questions.destroy',$question->id)}}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_token() }}
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure')" > Delete</button>
                                    </form>
                            @endif
                                <!-- @endcan -->
                            </div>
                            </div>
                                <!-- <h3 class="mt-0"> <a href="{{ $question->url }}"> {{ $question->title }}</a> ></h3> -->
                                <p class="lead" >
                                    Ask by <a href="{{ $question->user->url }}">{{ $question->user->name}}</a>
                                    <small class="text-muted" >  {{ $question->created_date }} </small>
                                </p>
                                <!-- <h3 class="mt-0">{{ $question->title }}></h3> -->
                                {{ str_limit($question->body, 250) }}
                            </div>

                            </div>
                             <hr>
                        @endforeach
                        <div class="mx-auto"></div>
                        {{ $questions->links() }}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
