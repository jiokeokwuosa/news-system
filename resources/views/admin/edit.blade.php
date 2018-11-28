@extends('layouts.app')

@section('content')

<div class="container">
        <br><h4 class="title">Update User Profile</h4><br />
    <div class="col-md-12">
            
          <div class="main-agileits">
                                    
            
                {!! Form::open(['action'=>['AdminsController@update',$user->id],'method'=>'put']) !!}
            

                    
                        
                        <div class="key">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input id="first_name" type="text" placeholder="Enter First Name" name="first_name" value="{{$user->first_name}}">
                                                        
                            <div class="clearfix"></div>
                        </div>

                        <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="last_name" type="text" placeholder="Enter Last Name" name="last_name" value="{{$user->last_name}}">
                                                            
                                <div class="clearfix"></div>
                        </div>
                        
                                          
                        <div class="contact-left cont">                       
                       
                            {!! Form::select('access_level[]', $access_level, $user->access_level, ['class'=>'bottom','size'=>'1']) !!}                                        
                                                                        
                        </div>                
                      
                      
                        <div class="key1">                               
                          <input type="submit" name="action" value="Update"/>                              
                        </div>
                      
           
           {!! Form::close() !!}
           
              
              
        </div>
  
    </div>
    
   
  
</div>
          


@endsection
