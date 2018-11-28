<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\category;
use Auth;


class ModeratorsController extends Controller
{
    
        
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending=article::select('id','title','created_at')->where('is_published',false)->orderBy('id','desc')->simplePaginate(8);
        $published=article::select('id','title','publish_date')->where('is_published',true)->orderBy('id','desc')->simplePaginate(8);
        return view('moderators.index')->with('pending',$pending)->with('published',$published);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
          $article=article::with('User')->find($id);
          return view('moderators.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=article::find($id);
        $categories=category::pluck('category','id')->toArray();
        return view('moderators.edit')->with('article',$article)->with('categories',$categories);
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
       
        $this->validate($request,[
            'article_text'=>'required',
            'title'=>'required',
            
 
        ]);
 
        $article=article::find($id);
        $article->user_id=$request->input('user_id');
        $article->title=$request->input('title');
        $article->article_text=$request->input('article_text');
        $category=$request->input('categories');
        $article->category_id=$category[0];
        $article->save();
 
        if($request->hasFile('image')){
             $imageName=$article->id.'.jpg';
             $request->file('image')->move(base_path().'/public/image/',$imageName);
        }        
        
        return redirect("/moderator/{$id}")->with('success','Article Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $article=article::find($id);
         $article->delete();
         $path=base_path().'/public/image/'.$id.'.jpg';  
        
            if(file_exists($path)){
               unlink($path); 
            }
            

        return redirect('/moderator')->with('success','Article Deleted Successfully');
        
    }

    

    public function publish(Request $request)
    {
        $article=$request->input('article_id');
        $article=article::find($article);
        $article->is_published=1;
        $article->publish_date=date('Y-m-d H:i:s', strtotime('now'));
        $article->save();
        
        return redirect('/moderator')->with('success','Article Published Successfully');
    }

    public function retract(Request $request)
    {
        $article=$request->input('article_id');
        $article=article::find($article);
        $article->is_published=0;
        $article->publish_date=null;
        $article->save();
        
        return redirect('/moderator')->with('success','Article Retracted Successfully');
    }

    
}
