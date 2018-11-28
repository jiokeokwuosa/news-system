@extends('layouts.app')

@section('content')

   

    <div class="container">
            <br><h4 class="title">Login Form</h4><br />
        <div class="col-md-12">
                
              <div class="main-agileits">
                                        
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <span class="clearlink"><a href="/">Back to Home</a></span>
                          <div class="key">
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                              <input id="email" type="email" placeholder="Enter Email" name="email"  autofocus>
                                                          
                              <div class="clearfix"></div>
                          </div>
                         
                          <div class="key">
                              <i class="fa fa-lock" aria-hidden="true"></i>
                              <input id="password" type="password" placeholder="Enter Password"  name="password" required>

                                                             
                              <div class="clearfix"></div>
                          </div>
                          
                          
                          
                          <div class="key1">                               
                              <input type="submit" name="action" value="Login"/>                              
                          </div>
                          
                </form>
                  
                  
            </div>
      
        </div>
        
       
      
    </div>

                       
@endsection
