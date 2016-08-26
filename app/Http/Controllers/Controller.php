<?php

namespace App\Http\Controllers;

use App\Http\Model\Category;
use App\Http\Model\Config;
use App\Http\Model\Posts;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{

    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $all=Category::all();
        $catetree=Category::subtree($all,0,0);

        $posts=Posts::orderBy('view','decs')->take(3)->get();
        $cateall=$all->each(function($item,$key){

            $item['count']=Posts::where('icon_id',$item->cate_id)->count();
        });
     
        $title=Config::all()->first();
        View::share('title',$title);
        View::share('catetree',$catetree);
        View::share('posts',$posts);
        view::share('cateall',$cateall);

    }
}
