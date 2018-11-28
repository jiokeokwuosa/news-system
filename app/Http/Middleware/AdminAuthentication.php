<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\http\RedirectResponse;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;
    
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }
    
    public function handle($request, Closure $next)
    {
        if($this->auth->check())
        {
            if($this->auth->user()->access_level>2)
            {
                return $next($request);
            }
        }
        return new RedirectResponse(url('/'));
        
    }
}
