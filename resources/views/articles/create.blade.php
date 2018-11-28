@extends('layouts.app')

@section('content')
    <div class="container">
        <br><h4 class="title">Create Article</h4><br />
        <div class="col-md-12">
                
                                    
               
               
               {!! Form::open(['action'=>'ArticlesController@store','files'=>true]) !!}
               
                <div class="row">
                    <div class="col-md-3">     </div>
                    <div class="col-md-6 contact-left cont user-agileits1"> 
                             <br/>
                             
                        {!! Form::text('title',null , ['placeholder'=>'Enter Title','class'=>'bottom','required']) !!}                        
                        
                        {!! Form::textarea('article_text', null, ['placeholder'=>'Enter Article Text','class'=>'bottom','required']) !!}                        
                        
                        {!! Form::select('categories[]', $categories, null, ['class'=>'bottom','size'=>'1']) !!}                                        
                        
                                                 
                         {!! Form::file('image', [null]) !!}  <br>                       
                         
                         {!! Form::submit('Create Post', [null]) !!}
                         
                         
                                 
                    </div>
                    <div class="col-md-3"> </div>
                
                </div>
             
                
                {!! Form::close() !!}
                
               
                
        </div>       
            

    </div>

  
@endsection







@section('footer')
    
@endsection