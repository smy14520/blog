<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(15);
        return view('admin.category')->with('category', $category);
    }

    public function create()
    {
       $cateall=Category::all();
        $data=Category::tree($cateall,0,0);

        return view('admin.add')->with('data',$data);

    }
    public function store()
    {
        if ($input = Input::all()) {

            $rule = ['title' => 'required|',
                'icon' => 'required',
                'iconcolor' => 'required'
            ];
            $message = ['title.required' => '标题不能为空',
                'icon.required' => 'Icon不能为空',
                'iconcolor.required' => 'color不能为空'
            ];
            $validator = Validator::make($input, $rule, $message);
            if ($validator->fails()) {
                return redirect('admin/category/create')->withErrors($validator);
            } else
            {
                $catecreate = Category::create(
                    [
                        'cate_name' => $input['title'],
                        'icon' => $input['icon'],
                        'icon_color' => $input['iconcolor'],
                        'cate_quotation' => $input['quotation'],
                        'paraent' => $input['paraent'],
                    ]);
                if($catecreate)
                {
                    $validator->errors()->add('create', '添加成功');
                }
                else
                {
                    $validator->errors()->add('create', '添加失败');
                }
                return redirect('admin/category/create')->withErrors($validator);
            }
        }
    }

    public function altericon()
    {

        if ($input = Input::all()) {
            $filed = Category::where('cate_id', $input['id'])->update(['icon' => $input['icon']]);
            if ($filed) {
                echo '更新ICon成功';
            } else {
                echo '更新失败';
            }

        }


    }

    public function altericoncolor()
    {

        if ($input = Input::all()) {
            $filed = Category::where('cate_id', $input['id'])->update(['icon_color' => $input['color']]);
            if ($filed) {
                echo '更新IconColor成功';
            } else {
                echo '更新失败';
            }

        }
    }


    public function edit($cate_id)
    {
        $catedata=Category::find($cate_id);
        $cateall=Category::all();
        $data=Category::tree($cateall,0,0);

        return view('admin.edit')->with(['catedata'=>$catedata,'data'=>$data]);

    }
    public function update($id)
    {
        $input=Input::except('_token','_method');
        $re=Category::where('cate_id',$id)->update($input);
        if($re)
        {
            $errors='更新分类成功';
        }
        else
        {
            $errors='更新分类成功';
        }
        return back()->with('errors',$errors);
    }

    public function destroy($cate_id)
    {
        if($input=Input::all())
        {
            $cate=Category::destroy($cate_id);
           if($cate)
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
