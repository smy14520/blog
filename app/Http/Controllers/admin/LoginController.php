<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\libs\captcha\Code;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function Login()
    {
         if($input=Input::all())
         {
             if(strtolower(Code::getcode())==strtolower($input['code']))
             {
                 $passwod=$input['password'];
                 $username=$input['username'];

                 $user=User::all()->where('username',$input['username'])->first();

               if($user)
               {


                if(Crypt::decrypt($user->password)!=$passwod)
                 {

                     return back()->with('msg','密码错误');
                 }
                 else
                 {
                     session(['user'=>$user]);
                     return redirect('admin/index');
                    
                 }
               }
                 else
                 {
                     return back()->with('msg','没有该用户');
                 }

             }
             else
             {
                 return back()->with('msg','验证码错误');
             }
         }
        else
        {
        return view('admin.login');
        }
    }



    public function captcha()
    {
          $code=new Code();
          echo $code->make();
    }

    public function getcaptcha()
    {
        $code=new Code();
        echo $code->get();
    }


}
