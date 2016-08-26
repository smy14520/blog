<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    public function index()
    {
        $config=Config::first();
        if($input=Input::except('_token'))
        {


            if($config)
            {

                $co=Config::where('id',$config->id)->update($input);
                if($co)
                {
                    $errors='更新配置成功';
                }
                else
                {
                    $errors='更新配置失败';
                }
            }
            else
            {
         $con=Config::create($input);
            if($con)
            {
                $errors='更新配置成功';
            }
            else
            {
                $errors='更新配置失败';
            }
            }
            return back()->with('errors',$errors);
        }

           

        return view('admin.config')->with('data',$config);
    }
}
