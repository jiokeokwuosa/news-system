<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\editorials;
use App\comment;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $slide=article::take(14)->select('id','title','publish_date')->where('is_published',true)->orderBy('id','desc')->get();
         $health=article::take(1)->select('id','title','article_text')->where('is_published',true)->where('category_id',1)->orderBy('id','desc')->get();
         $education=article::take(1)->select('id','title','article_text')->where('is_published',true)->where('category_id',2)->orderBy('id','desc')->get();
         $religion=article::take(1)->select('id','title','article_text')->where('is_published',true)->where('category_id',3)->orderBy('id','desc')->get();
         $sports=article::take(1)->select('id','title','article_text')->where('is_published',true)->where('category_id',4)->orderBy('id','desc')->get();
         $politics=article::take(1)->select('id','title','article_text')->where('is_published',true)->where('category_id',5)->orderBy('id','desc')->get();
         $trending=comment::with('article')->take(6)->select('article_id',DB::raw('count(article_id) as count'))->groupBy('article_id')->orderBy('count','desc')->get();
         $editorials=editorials::with('users')->take(5)->select('id','user_id','title','publish_date','article_text')->where('is_published',true)->orderBy('id','desc')->get();
         return view('index')->with('slide', $slide)->with('health',$health)->with('education',$education)->with('religion',$religion)->with('sports',$sports)->with('politics',$politics)->with('trending',$trending)->with('editorials',$editorials);
         
    }
    public function home(){
        return('hhh');
      
    }
}
