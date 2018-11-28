@extends('layouts.app')

@section('content')
    <div class="container">     
        <br><h4 class="title">{{$article->title}}</h4><br />
        <h4 class="center" style="color:#660033;"><b>Published on {{substr($article->publish_date,7)}} By <i>{{$article->user->last_name}} {{$article->user->first_name}}</i></b></h4>
        <div class="row">
            <div class="col-md-2">      </div>

            <div class="col-md-8 user-agileits1">      
               @if (count($article)>0)
                    <div class="row">
                        <div class="col-md-8 review">
                             <img src="\image\{{$article->id}}.jpg" width="90%" style="max-height:220px;" />
                        </div>
                        <div class="col-md-4">        </div>
                    </div><br>

                    <div class="row">
                            <div class="col-md-12">
                                    <div style="font-size:18px; text-align:justify">         
                                         {{$article->article_text}}
                                    </div>
    
                            </div>
                            
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-8 justify contact-left cont ">
                          @if(Auth::check()) <div id="c" style="margin-top:10px; font-family:font2;" class="links">Add Comment</div>
                            {!! Form::open(['route'=>'saveComment']) !!}
                                 {!! Form::textarea('comment_text', null, ['placeholder'=>'Enter Comment','required']) !!}
                                 
                                 {!! Form::hidden('article_id', $article->id, [null]) !!}
                                 
                                 {!! Form::submit('Submit', [null]) !!}
                            {!! Form::close() !!}
                          @endif 
                            
                            <div id="c" style="margin-top:10px; font-family:font2;" class="links">{{count($article->comment)}} Comment(s) :: @if(Auth::check()) <a href="/">Add Comment</a>@endif</div>
                                @if (count($article->comment)>0)
                                    @foreach ($article->comment as $item)
                                       <b> <span style="color:#660033;">By {{$item->user->last_name}} {{$item->user->first_name}} on {{$item->created_at}}</span></b><br>{{$item->comment_text}}<br><br>
                                    @endforeach
                                @endif

                        </div>
                        <div class="col-md-4"></div>
                        
                    </div>  
                       
               
               @endif



            </div>

            <div class="col-md-2">      </div>
            
               
                   
        </div>       
            

    </div>

@endsection

@section('footer')
    
@endsection