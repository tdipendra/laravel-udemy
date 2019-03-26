 <div class="row mt-4 ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')



                    
                    @foreach($answers as $answer)
                      
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
                                 <a title="Mark this answer as best answer" class="vote-accepted  mt-2"  >
                                 
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