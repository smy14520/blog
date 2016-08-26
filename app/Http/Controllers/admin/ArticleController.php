<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Category;
use App\Http\Model\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    function index()
    {
        $data=Posts::paginate(10);

        return view('admin.article.article')->with('data',$data);
    }
    function create()
    {
        $data=Category::all();
        return view('admin.article.add',compact('data'));
    }

    function store()
    {
        if($input=Input::all())
        {
            $input['created_by']=session('user')->username;
            $po=Posts::create($input);
            if($po)
            {
                $errors='文章成功发表';
            }
            else
            {
                $errors='文章发表失败请检查';
            }
            return back()->with('errors',$errors);
        }
    }

   public function edit($posts_id)
   {
       $data=Posts::find($posts_id);
       $cateall=Category::all();
       $catedata=Category::tree($cateall,0,0);
       return view('admin.article.edit')->with(['data'=>$data,'catedata'=>$catedata]);

   }
    public function update($id)
    {
       $input=Input::except('_token','_method');
        $re=Posts::where('id',$id)->update($input);
        if($re)
        {
            $errors='更新文章成功';
        }
        else
        {
            $errors='更新文章失败';
        }
        return back()->with('errors',$errors);
    }

    public function destroy($id)
    {
        if($input=Input::all())
        {
            $posts=Posts::destroy($id);
            if($posts)
            {
                echo '删除成功';
            }
            else
            {
                echo '删除失败';
            }
        }
    }
}
