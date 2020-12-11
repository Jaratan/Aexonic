<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = User::find($id);
        //check for user
        if(auth()->user()->id!== $post->id)
        {  return redirect('/posts')->with('error','Unauthorised page');  }

        return view('pages.edit')->with('post',$post);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone'=> 'required|min:10|max:10',
            'country'=> 'required|max:50',
            'state'=> 'required|max:50',
            'city'=> 'required|max:50',
            'pincode'=>'required|max:10',
            'user_image'=>'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if(request()->hasFile('user_image')){
            //Get filename with extension
            $fileNameWithExt = request()->file('user_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = request()->file('user_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = request()->file('user_image')->storeAs('public/cover_images',$fileNameToStore);
        }

        $post = User::find($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->phone = $request->input('phone');
        $post->country = $request->input('country');
        $post->state = $request->input('state');
        $post->city = $request->input('city');
        $post->pincode = $request->input('pincode');

        if($request->hasFile('user_image')){
            $post->user_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/dashboard')->with('success','Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = User::find($id);
        //check for user
        if(auth()->user()->id!== $post->id)
        {  return redirect('/posts')->with('error','Unauthorised page');  }

        if($post->cover_image!='noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->user_status = 'I';
        $post->save();
        Session::flush();
        return redirect('/login');
    }

   
}
