<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'News System') }}</title>
    <link rel="icon" href="/images/logo.jpeg" />

    <!-- Scripts -->
    <script src="/js/jquery-3.2.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/smartmenus.js"></script>
    <script src="/js/jquery.cycle2.js"></script>
    <script src="/js/jquery.cycle2.tile.js"></script>
    <script src="/js/jquery.cycle2.caption.js"></script>
    <!-- Fonts -->
   
    <!-- Styles -->
    <link  href="/css/style.css" rel="stylesheet" media="all" />
    <link  href="/css/smartmenus.css" rel="stylesheet" media="all" />
    <link  href="/css/simple.css" rel="stylesheet" media="all" />
    <link  href="/css/bootstrap.min.css" rel="stylesheet" media="all" />
    <link  href="/css/overlay.css" rel="stylesheet"  media="all"/>
    <link href="/css/font-awesome.css" rel="stylesheet"/> 
    
    
</head>
<body>
    <header class="header1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="date"> <i class="glyphicon glyphicon-time"></i>                                                        
                           {{ $actualtime=date('F j, Y', strtotime('now'))}}                                           
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="glyphicon glyphicon-earphone"></i> 07037381011
                    </div>   	
                </div> 
                
                <div class="col-md-6">
                    <div class="date1">
                        <i class="glyphicon glyphicon-map-marker"></i> Awka, Anambra State, Nigeria.  
                    </div>            
                </div>   
            </div>
        </div>
    </header>

    <header class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <br> <a href="/"> <img src="/images/banner.png" width="70%" class="img-responsive"/></a><br>
                </div>
                
                <div class="col-md-6" style="text-align: right;">
                                                   
                            @if(!Auth::check())
                                <a  href="{{ route('login') }}">{{ __('Login') }}</a> |
                                <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                               
                            @else    
                                                    
                                Welcome : {{Auth::user()->first_name}} -
                                    <a href="/articles/create">Submit A Story</a> |                                       

                                        @if (Auth::user()->access_level>1)
                                        <a href="/moderator">Review</a> |
                                        @endif

                                        @if (Auth::user()->access_level>2)
                                        <a href="/admin">Admin</a> |
                                        @endif

                                       
                                       
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                           {{ __('Logout') }}
                                       </a>
   
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           @csrf
                                       </form>
                                   
                           @endif
                                    
                </div>           
            </div>        	
        </div>	
    </header>

    <nav id="button">
            <div class="container">
              
                    
                 
                <nav id="main-nav">
                    <!-- Mobile menu toggle button (hamburger/x icon) -->
                    <input id="main-menu-state" type="checkbox" />
                    <label class="main-menu-btn" for="main-menu-state">
                      <span class="main-menu-btn-icon"></span> Toggle main menu visibility
                    </label>
                 <ul id="main-menu" class="sm sm-simple">
                    <li><a href="/">Home</a></li>            	
                    <li><a href="/showByCategory/5">Politics</a></li>
                    <li><a href="/showByCategory/2">Education</a></li>			
                    <li><a href="/showByCategory/3">Religion</a></li>
                    <li><a href="/showByCategory/4">Sports</a></li>
                    <li><a href="/showByCategory/1">Health</a></li>			
                    <li><a href="/showByCategory/6">Others</a></li>
                    <li><a href="/">Contact Us</a></li>
                 </ul>
               </nav>
            </div>
            
        </nav>
        
      
@include('inc.messages')
@yield('content')

@section('footer')
<footer id="links" class="footer1">
    <div class="container">
        <div class="row">
            
            <div class="col-md-4 justify">
        		 <h3 style="font-family: font1, font2;">About Us</h3><br />
        		<p>Niger Times Media House is a citadel of learning, here we focus  learning,
                Students will be oriented to  their education to solve pratical problems confronting them in the Nigeria society and beyound.</p>
            </div>
            
            <div class="col-md-3">
                    <h3 style="font-family: font1, font2;">Quick Links</h3><br />
                    <div class="newspaper">
                        <ul style="list-style: none; clear: both; padding-left: 0px;" class="footerlinks">
                            <li class="linespace"><a href="index.php">Home</a></li>
                            <li class="linespace"><a href="aboutus.php">About Us</a></li>
                            <li class="linespace"><a href="about.php#programme">Education News</a></li>
                            <li class="linespace"><a href="about.php#staff">Religion News</a></li>
                            <li class="linespace"><a href="library.php">Sports News</a></li>
                            <li class="linespace"><a href="forum.php">Politics News</a></li>
                            <li class="linespace"><a href="forum.php">Other News</a></li>
                            <li class="linespace"><a href="contactus.php">Contact-us</a></li>
                            
                        </ul>
                    </div>
              </div>
              
              <div class="col-md-2">
                    <h3 style="font-family: font1, font2;">My Account</h3><br />
                       <ul style="list-style: none;padding-left: 0px;" class="footerlinks">
                            <li class="linespace"><a href="login.php">Login</a></li>
                            <li class="linespace"><a href="signup.php">Signup</a></li>                                                       
                       </ul>
                    
              </div>
              
              <div class="col-md-3">
                <h3 style="font-family: font1, font2;">Information</h3><br />
					<ul style="list-style: none;padding-left: 0px;" class="footerlinks">
						<li class="linespace"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>  Awka, Anambra State, Nigeria.</li>
						<li class="linespace"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>  07037381011</li>
						<li class="linespace"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>  <a href="mailto:okwuosakenechukwu@gmail.com">Nigertimes@gmail.com</a></li>
			        </ul>
              
              </div>
        
        </div>
    
    </div>    
</footer>

<footer id="footer2">
    <div class="copy-section">
            <div class="container">
                <div class="social-icons">
                    <a href="#"><i class="icon1"></i></a>
                    <a href="#"><i class="icon2"></i></a>
                    <a href="#"><i class="icon3"></i></a>
                    <a href="#"><i class="icon4"></i></a>
                </div>
                <div class="copy">
                    <p>&copy; 2017  Nigertimes Media House. All rights reserved</p>
                </div>
            </div>
    </div>  

</footer>
 
@show                      
                   

        
    
</body>
</html>
