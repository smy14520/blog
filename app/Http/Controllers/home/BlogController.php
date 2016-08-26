<?php

namespace App\Http\Controllers\home;

use App\Http\Model\Category;
use App\Http\Model\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class BlogController extends Controller
{
    public function blog($cate_name,$cate_id)
    {
        $cate=Category::where('cate_id',$cate_id)->first();
        $data=Category::where('cate_id',$cate->cate_id)->orwhere('paraent',$cate->cate_id)->get();
        foreach($data as $v)
        {
            $arr[]=$v['cate_id'];
        }

        $pos=Posts::join('category','posts.icon_id','=','category.cate_id')->whereIn('icon_id',$arr)->paginate(10);


//        $pos=Posts::whereIn('icon_id',$arr);
//
//        $pos=$pos->each(function($item,$key)
//        {
//            $cate=Category::all();
//            foreach($cate as $v)
//            {
//                if($item->icon_id==$v->cate_id)
//                {
//                    $str=str_replace('#','',$v->icon_color);
//                    $item['bocolor']='#'.dechex(hexdec($str)+1000);
//                    $item['color']=$v->icon_color;
//                    $item['icon']=$v->icon;
//                    $item['content']=mb_substr(strip_tags($item['content']), 0, 100, 'utf-8');
//                }
//            }
//        });

        //return view('home.blog',compact('about',$cate))->with('post',$pos);
        return view('home.blog')->with('about',$cate)->with('post',$pos);
         // $canum=Category::familytree(Category::all(),$cate);

    }
}
