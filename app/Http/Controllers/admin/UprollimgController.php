<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class UprollimgController extends Controller
{
    public function uprollimg()
    {
        return view('admin.uprollimg');
    }

    public function upload()
    {

     $file=Input::file('file');
        if($file -> isValid()) {
            $clientName = $file -> getClientOriginalName(); //获取文件名称
            $tmpName = $file ->getFileName();  // 缓存在tmp文件夹中的文件名 例如 php9372.tmp 这种类型的.
            $realPath = $file -> getRealPath();//这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file -> getClientOriginalExtension(); //后缀
            $newName = md5(date('ymdhis').$clientName).".".$entension;
           // $path = $file -> move('uploads',$newName);
         $chb= Image::make($file)->resize(940,430)->save('uploads/img/'.$newName);
            //$chs= Image::make($file)->resize(276,288)->blur(15);  //->save('uploads/small/'.$newName);
//            $chs->text('Hello',150,120,function($font){
//                $font->file('font/Nowadays.otf');
//                $font->size(60);
//                $font->align('center');
//                $font->valign('top');
//
//                $font->color('#fdf6e3');
//            });

                $big='uploads/img/'.$newName;

            Carousel::create(['bigimg'=>$big]);
//            Carousel::
//            echo '/uploads/'.$newName;

        }
        }

    public function index()
    {
        $data=Carousel::all();
        return view('admin.carousel')->with('data',$data);
    }

    public function delete($id)
    {
       $c=Carousel::find($id)->delete();
        if($c)
        {
            echo '删除成功';
        }
        else
        {
            echo '删除失败';
        }
    }



}
