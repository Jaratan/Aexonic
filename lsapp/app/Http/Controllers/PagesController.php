<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index()
    {
        $title = "Welcome to Aexonic!";
        $user = User::orderBy('created_at','desc')->paginate(5);
        $data = array(
            'title'=>$title,
            'users'=>$user
        );
        return view('pages.index')->with($data);
    }
    
}
