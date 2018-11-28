@extends('layouts.app')

@section('content')
    <div class="container">
        <br><h4 class="title">User Admistration</h4><br />
        <div class="row">
            <div class="col-md-4">
                    <div id="c">USER(S)</div>
                        @if (count($user)>0)
                            <ol>
                                @foreach ($user as $item)
                                <li class="clearlink" style="font-size:16px;"> <a href="admin/{{$item->id}}/edit">{{$item->last_name}} {{$item->first_name}}</a></li>
                                @endforeach
                            </ol>
                        @else
                        There is currently no User Account
                        @endif  
                        {!!$user->render()!!}    	           
                
            </div> 
             
            <div class="col-md-4">
                <div id="c">MODERATOR(S)</div>
                    @if (count($moderator)>0)
                        <ol>
                            @foreach ($moderator as $item)
                            <li class="clearlink" style="font-size:16px;"> <a href="admin/{{$item->id}}/edit">{{$item->last_name}} {{$item->first_name}}</a></li>
                            @endforeach
                        </ol>
                    @else
                    There is currently no Moderator Account
                    @endif  
                    {!!$moderator->render()!!}    	           
            
            </div>
            
            <div class="col-md-4">
                <div id="c">ADMIN(S)</div>
                    @if (count($admin)>0)
                        <ol>
                            @foreach ($admin as $item)
                            <li class="clearlink" style="font-size:16px;"> <a href="admin/{{$item->id}}/edit">{{$item->last_name}} {{$item->first_name}}</a></li>
                            @endforeach
                        </ol>
                    @else
                    There is currently no Admin Account
                    @endif  
                    {!!$admin->render()!!}    	           
            
            </div> 
                 
               
        </div>       
            

    </div>

  
@endsection







@section('footer')
    
@endsection