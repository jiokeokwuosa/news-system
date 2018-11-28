<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\access_table;

class AdminsController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::select('id','first_name','last_name')->where('access_level',1)->orderBy('id','desc')->simplePaginate(8);
        $moderator=User::select('id','first_name','last_name')->where('access_level',2)->orderBy('id','desc')->simplePaginate(8);
        $admin=User::select('id','first_name','last_name')->where('access_level',3)->orderBy('id','desc')->simplePaginate(8);
        return view('admin.index')->with('user',$user)->with('moderator',$moderator)->with('admin',$admin);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $access_level=access_table::pluck('access_name','access_level')->toArray();
        return view('admin.edit')->with('user',$user)->with('access_level',$access_level);
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'access_level'=>['required']         
            
 
        ]);
 
        $user=User::find($id);
        $user->first_name=$request->input('first_name');
        $user->last_name=$request->input('last_name');
        $level=$request->input('access_level');
        $user->access_level=$level[0];
        $user->save();              
        
        return redirect('/admin')->with('success','Record Updated Successfully');
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

    
}
