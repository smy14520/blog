<?php

namespace App\Http\Controllers\home;

use App\Http\Model\Carousel;
use App\Http\Model\Comment;
use App\Http\Model\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index()
    {
        $data=Carousel::all();
        return view('home.index')->with('data',$data);
    }

    public function post($id)
    {
        Posts::where('id',$id)->increment('view');
        $post=Posts::where('id',$id)->first();
        $comm=Comment::where('pid',$id)->get();
        return view('home.post',compact('post',$post,'comm',$comm));
    }

    public function comment()
    {
        Comment::create(Input::all());
      return  back();
    }
}
