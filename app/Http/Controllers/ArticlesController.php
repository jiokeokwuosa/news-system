<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\article;
use App\comment;
use App\User;
use Auth;

class ArticlesController extends Controller
{
    
    
    
    
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return('am here');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::pluck('category','id')->toArray();
        return view ('articles.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'article_text'=>'required',
           'title'=>'required',
           'image'=>'mimes:jpeg,png,gif'

       ]);

       $article=new article();
       $article->user_id=Auth::user()->id;
       $article->title=$request->input('title');
       $article->article_text=$request->input('article_text');
       $category=$request->input('categories');
       $article->category_id=$category[0];
       $article->save();

       if($request->hasFile('image')){
            $imageName=$article->id.'.jpg';
            $request->file('image')->move(base_path().'/public/image/',$imageName);
       }

       $categories=category::pluck('category','id')->toArray();
       return redirect('/articles/create')->with('success','Articles Created Successfully')->with('categories',$categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=article::with('User')->with('comment')->find($id);
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveComment(Request $request)
    {
        $this->validate($request,[
            'comment_text'=>'required',
                    ]);
 
        $comment=new comment();
        $comment->article_id=$request->input('article_id');
        $comment->user_id=Auth::user()->id;       
        $comment->comment_text=$request->input('comment_text');
        $comment->save();
                    
        return redirect("/articles/{$request->input('article_id')}")->with('success','Comment Created Successfully');
    }

    public function showByCategory($id)
    {
        $article=article::where('category_id',$id)->get();
        $category=category::select('category')->where('id',$id)->get();              
        return view('articles.category')->with('article',$article)->with('category',$category);
    }

    
}
