@extends('layouts.app')

@section('content')
    <div class="container">     
        <br><h4 class="title">Articles Review</h4><br />
        <div class="row">
            <div class="col-md-3">      </div>

            <div class="col-md-6 user-agileits1">      
               @if (count($article)>0)
                    <div class="row">
                        <div class="col-md-8 review">
                             <img src="\image\{{$article->id}}.jpg" width="90%" />
                        </div>
                        <div class="col-md-4">        </div>
                    </div><br>

                    <div class="row">
                            <div class="col-md-12">
                                    <div style="font-size:18px; text-align:justify">                    
                                            <b>Title:</b> {{$article->title}}<br><br> <b> Author:</b> <i>{{$article->user->last_name}} {{$article->user->first_name}}</i><br><br>
                                            <b>Article:</b> {{$article->article_text}}
                                    </div>
    
                            </div>
                            
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                                @if ($article->is_published==0)
                                        {!! Form::open(['action'=>['ModeratorsController@edit',$article->id], 'method'=>'GET', 'class'=>'float']) !!}                                     
                                                {!! Form::submit('Edit', [null]) !!}                                          
                                        {!! Form::close() !!}
                                
                                        {!! Form::open(['route'=>'publish','method'=>'post','class'=>'float']) !!}                                      
                                                {!! Form::hidden('article_id', $article->id, [null]) !!}                                                                         
                                                {!! Form::submit('Publish', [null]) !!}   
                                        {!! Form::close() !!}

                                        {!! Form::open(['action'=>['ModeratorsController@destroy',$article->id], 'method'=>'DELETE', 'class'=>'float']) !!}                                     
                                                {!! Form::submit('Delete', [null]) !!}                                          
                                        {!! Form::close() !!}                                
                                    
                                @else
                                        
                                        {!! Form::open(['action'=>['ModeratorsController@edit',$article->id], 'method'=>'GET', 'class'=>'float']) !!}                                     
                                        {!! Form::submit('Edit', [null]) !!}                                          
                                        {!! Form::close() !!}
                                
                                        {!! Form::open(['route'=>'retract','method'=>'post','class'=>'float']) !!}                                      
                                                {!! Form::hidden('article_id', $article->id, [null]) !!}                                                                         
                                                {!! Form::submit('Retract', [null]) !!}   
                                        {!! Form::close() !!}
                                        
                                
                                @endif                                  
    
                            </div>
                            
                    </div>
                       
               
               @endif



            </div>

            <div class="col-md-3">      </div>
            
               
                   
        </div>       
            

    </div>

@endsection

@section('footer')
    
@endsection