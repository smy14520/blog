<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\User;


class IndexController extends Controller
{
    public function Index()
    {

        return view('admin.index');
    }

    public function Info()
    {
        return view('admin.info');
    }

    public function quit()
    {
        session(['user' => NULL]);
        return redirect('admin/login');
    }

    public function pass()
    {
        if ($input = Input::all()) {

            $rule = ['password_o' => 'required|',
                'password' => 'required|confirmed|between:6,12'
            ];
            $message = ['password_o.required' => '旧密码不能为空',
                'password.between' => '新密码不能低于6~12位',
                'password.required' => '新密码不能为空',
                'password.confirmed' => '重复密码不相同',

            ];

            $validator = Validator::make($input, $rule, $message);
            if ($validator->fails()) {

                return back()->withErrors($validator);
            }
            if ($input['password_o'] == Crypt::decrypt(session('user')->password)) {
                $user = User::all()->where('username', session('user')->username)->first();
                $user->password = Crypt::encrypt($input['password']);
                $user->update();
                $validator->errors()->add('passok', '修改密码成功');

            } else {
                $validator->errors()->add('passerr', '原密码错误请重新输入');
            }

            return back()->withErrors($validator);
        }

        return view('admin.pass');
    }




}
