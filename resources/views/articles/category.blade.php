@extends('layouts.app')

@section('content')
    <div class="container">     
        <br><h4 class="title">{{$category[0]->category}}</h4><br />
       
        <div class="row">
            <div class="col-md-2">      </div>

            <div class="col-md-8 user-agileits1">      
               @if (count($article)>0)
                    @foreach ($article as $article)
                        <div class="row none">
                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    
                                        <a href="/articles/{{$article->id}}">
                                        <div class="port-7 effect-2">
                                            <div class="image-box">
                                                <img src="/image/{{$article->id}}.jpg"  style="float: left; width: 100%; max-height: 200px; height: 177px;" class="img-responsive"/>                      
                                            </div>
                                            
                                            <div class="text-desc">
                                            <h4>{{$category[0]->category}}</h4>
                                            </div>
                                        </div>
                                        </a>          
                                        
                                
                                </div>
                            
                                <div class="col-md-6">
                                <a href="/articles/{{$article->id}}">
                                <p class="title1 red">{{htmlspecialchars(ucwords(strtolower($article->title)))}}</p>
                                <p class="t">{{substr($article->article_text,0,240)}}...</p>
                                </a>
                            
                                </div>
                            
                        </div>    
                    
                    @endforeach    
               
               @else
                    No Article Available
               @endif



            </div>

            <div class="col-md-2">      </div>
            
               
                   
        </div>       
            

    </div>

@endsection

@section('footer')
    
@endsection