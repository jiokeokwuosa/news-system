@extends('layouts.app')

@section('content')
    
    <div style="color:red;">
        @if (count($slide)<4)
        Not enough slide images
        @endif
        
    </div> 
    <div class="slide">	
        <div class="cycle-slideshow" style="font-size:28px;" data-cycle-speed=1200  data-cycle-caption-plugin=caption2>
            <div class="cycle-pager"></div>
            <div class="cycle-overlay"></div>
            <img src="/image/{{$slide[0]->id}}.jpg" style="max-height:440px; width:100%;" data-cycle-fx=tileBlind data-cycle-tile-count=4  data-cycle-desc="{{$slide[0]->title}}" />
            <img src="/image/{{$slide[1]->id}}.jpg" style="max-height:440px; width:100%;" data-cycle-fx=tileSlide data-cycle-tile-vertical=false data-cycle-desc="{{$slide[1]->title}}"/>
            <img src="/image/{{$slide[2]->id}}.jpg" style="max-height:440px; width:100%;" data-cycle-fx=tileBlind data-cycle-tile-vertical=false data-cycle-desc="{{$slide[2]->title}}"/>
            <img src="/image/{{$slide[3]->id}}.jpg" style="max-height:440px; width:100%;" data-cycle-fx=tileSlide data-cycle-tile-count=12 data-cycle-desc="{{$slide[3]->title}}"/>
            
        </div>     
    </div>

    <div class="container-fluid" style="margin-top: 15px;">
        <div class="row">         
            <div class="col-md-3 justify">            
                <div id="c">LATEST NEWS</div>
                    @if (count($slide)>0)
                    <table>
                        @foreach ($slide as $item)
                        <tr><td>
                            <div class=latestNews>                    
                                <a href="/articles/{{$item->id}}"class=t><img src="/image/{{$item->id}}.jpg" height=53 width=55 class=img-circle /><b><small><i class="glyphicon glyphicon-time"></i></small><font color=red>{{substr($item->publish_date,0,7)}}: </font>{{htmlspecialchars(ucfirst(strtolower($item->title)))}}</b></a>	
                            </div>
                        </td></tr>
                        @endforeach
                    </table>
                    @else
                    There are currently no articles to view
                    @endif       	           
                
            </div> 
            
            <div class="col-md-6 update"> 
            
                <div id="c">NEWS UPDATES</div> 
                <!--Politics-->   
                <div class="row none">
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            
                                <a href="/articles/{{$politics[0]->id}}">
                                <div class="port-7 effect-2">
                                    <div class="image-box">
                                        <img src="/image/{{$politics[0]->id}}.jpg"  style="float: left; width: 100%; max-height: 200px; height: 177px;" class="img-responsive"/>                      
                                    </div>
                                    
                                    <div class="text-desc">
                                    <h4>Politics</h4>
                                    </div>
                                </div>
                                </a>          
                                
                        
                        </div>
                    
                        <div class="col-md-6">
                        <a href="/articles/{{$politics[0]->id}}">
                        <p class="title1 red">{{htmlspecialchars(ucwords(strtolower($politics[0]->title)))}}</p>
                        <p class="t">{{substr($politics[0]->article_text,0,240)}}...</p>
                        </a>
                    
                        </div>
                    
                    </div>
                    
                    <!--Education-->
                    <div class="row none">
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            
                                <a href="/articles/{{$education[0]->id}}">
                                <div class="port-7 effect-2">
                                    <div class="image-box">
                                        <img src="/image/{{$education[0]->id}}.jpg"  style="float: left; width: 100%; max-height: 200px; height: 177px;" class="img-responsive"/>                      
                                    </div>
                                    
                                    <div class="text-desc">
                                    <h4>Education</h4>
                                    </div>
                                </div>
                                </a>          
                                
                        
                        </div>
                    
                        <div class="col-md-6">
                        <a href="/articles/{{$education[0]->id}}">
                        <p class="title1 red">{{htmlspecialchars(ucwords(strtolower($education[0]->title)))}}</p>
                        <p class="t">{{substr($education[0]->article_text,0,240)}}...</p>
                        </a>
                    
                        </div>
                    
                    </div>

                    <!--Religion-->
                    <div class="row none">
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            
                                <a href="/articles/{{$religion[0]->id}}">
                                <div class="port-7 effect-2">
                                    <div class="image-box">
                                        <img src="/image/{{$religion[0]->id}}.jpg"  style="float: left; width: 100%; max-height: 200px; height: 177px;" class="img-responsive"/>                      
                                    </div>
                                    
                                    <div class="text-desc">
                                    <h4>Religion</h4>
                                    </div>
                                </div>
                                </a>          
                                
                        
                        </div>
                    
                        <div class="col-md-6">
                        <a href="/articles/{{$religion[0]->id}}">
                        <p class="title1 red">{{htmlspecialchars(ucwords(strtolower($religion[0]->title)))}}</p>
                        <p class="t">{{substr($religion[0]->article_text,0,240)}}...</p>
                        </a>
                    
                        </div>
                    
                    </div>
                    
                    
                    <!--Sports-->
                    <div class="row none">
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            
                                <a href="/articles/{{$sports[0]->id}}">
                                <div class="port-7 effect-2">
                                    <div class="image-box">
                                        <img src="/image/{{$sports[0]->id}}.jpg"  style="float: left; width: 100%; max-height: 200px; height: 177px;" class="img-responsive"/>                      
                                    </div>
                                    
                                    <div class="text-desc">
                                    <h4>Sports</h4>
                                    </div>
                                </div>
                                </a>          
                                
                        
                        </div>
                    
                        <div class="col-md-6">
                        <a href="/articles/{{$sports[0]->id}}">
                        <p class="title1 red">{{htmlspecialchars(ucwords(strtolower($sports[0]->title)))}}</p>
                        <p class="t">{{substr($sports[0]->article_text,0,240)}}...</p>
                        </a>
                    
                        </div>
                    
                    </div> 

                    <!--Health-->
                    <div class="row none">
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            
                                <a href="/articles/{{$health[0]->id}}">
                                <div class="port-7 effect-2">
                                    <div class="image-box">
                                        <img src="/image/{{$health[0]->id}}.jpg"  style="float: left; width: 100%; max-height: 200px; height: 177px;" class="img-responsive"/>                      
                                    </div>
                                    
                                    <div class="text-desc">
                                    <h4>Health</h4>
                                    </div>
                                </div>
                                </a>          
                                
                        
                        </div>
                    
                        <div class="col-md-6">
                        <a href="/articles/{{$health[0]->id}}">
                        <p class="title1 red">{{htmlspecialchars(ucwords(strtolower($health[0]->title)))}}</p>
                        <p class="t">{{substr($health[0]->article_text,0,240)}}...</p>
                        </a>
                    
                        </div>
                    
                    </div>
                    
                    
            </div>

            
            <div class="col-md-3 justify">
                <!--Trending News-->
                <div id="c">TRENDING NOW</div>
                
                @if (count($trending)>0)
                @foreach ($trending as $item)
                <b><a href="/articles/{{$item->article->id}}" class=t>{{htmlspecialchars(ucwords(strtolower($item->article->title)))}}</a><br><font color=red>{{$item->count}} Comment(s)</font><small><i class="fa fa-comments"></i></small></b><br><hr>
                @endforeach
                @else
                No Trending Article
                @endif     
                
                <!--Editorials-->          
                <div id="c">Editorials</div>
                    @if (count($editorials)>0)
                        @foreach ($editorials as $item)
                        <b><a href="/articles/{{$item->id}}" class=t>{{htmlspecialchars(ucwords(strtolower($item->title)))}}: </b>{{substr($item->article_text,0,90)}}... <br><small><font color=red><i class="glyphicon glyphicon-time"></i> {{$item->publish_date}}</font></small></a><br>
                        @endforeach
                    @else
                    No Editorial Article
                    @endif      	           
                
               
            </div>


        
           
        </div>  
          
    </div> 
    
@endsection

@section('footer')
    @parent
@endsection