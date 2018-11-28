@extends('layouts.app')

@section('content')
    <div class="container">
        <br><h4 class="title">Articles Available</h4><br />
        <div class="row">
            <div class="col-md-6">
                    <div id="c">PENDING ARTICLE(S)</div>
                        @if (count($pending)>0)
                            <ol>
                                @foreach ($pending as $item)
                                <li class="clearlink" style="font-size:16px;"> <a href="moderator/{{$item->id}}">{{$item->title}}: Submitted on {{$item->created_at}}</a></li>
                                @endforeach
                            </ol>
                        @else
                        There are currently no pending articles
                        @endif  
                        {!!$pending->render()!!}    	           
                
            </div> 
             
            <div class="col-md-6">
                    <div id="c">PUBLISHED ARTICLE(S)</div>
                    @if (count($published)>0)
                        <ol>
                            @foreach ($published as $item)
                            <li class="clearlink" style="font-size:16px;"> <a href="moderator/{{$item->id}}">{{$item->title}}: Published on {{substr($item->publish_date,7)}}</a></li>
                            @endforeach
                        </ol>
                    @else
                    There are currently no published articles
                    @endif  
                    {!!$published->render()!!}    	           
        
            </div>      
                   
        </div>       
            

    </div>

  
@endsection







@section('footer')
    
@endsection