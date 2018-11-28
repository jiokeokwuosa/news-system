@extends('layouts.app')

@section('content')
    <div class="container">
        <br><h4 class="title">Modify Article</h4><br />
        <div class="col-md-12">
                
                                    
               
               
                {!! Form::open(['action'=>['ModeratorsController@update',$article->id], 'method'=>'PUT','files'=>true]) !!}
               
                <div class="row">
                    <div class="col-md-3">     </div>
                    <div class="col-md-6 contact-left cont user-agileits1"> 
                             <br/>
                             
                        {!! Form::text('title',$article->title , ['placeholder'=>'Enter Title','class'=>'bottom','required']) !!}                        
                        
                        {!! Form::textarea('article_text', $article->article_text, ['placeholder'=>'Enter Article Text','class'=>'bottom','required']) !!}                        
                        
                        {!! Form::select('categories[]', $categories, $article->category_id, ['class'=>'bottom','size'=>'1']) !!}                                        
                        
                                                 
                         {!! Form::file('image', [null]) !!}  <br>                       
                         {!! Form::hidden('user_id',$article->user_id, [null]) !!}
                                                  
                         {!! Form::submit('Update Post', [null]) !!}
                         
                         
                                 
                    </div>
                    <div class="col-md-3"> </div>
                
                </div>
             
               
                {!! Form::close() !!}
                
               
                
        </div>       
            

    </div>

  
@endsection







@section('footer')
    
@endsection