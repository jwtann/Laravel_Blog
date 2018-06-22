<?php

namespace App\Http\Controllers\Blog;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class Login extends Controller
{
    public function create(){
        return view('home.login');
    }

    public function login(Request $request){
        $result = Auth::attempt([
           'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);
        if ($result){
            $user = User::where('email','=',$request->input('email'))->first();
            if (!$user['status']){
                session()->flash('danger','账号未激活，请前往您的邮箱先进行激活！');
                Auth::logout();
                return redirect()->route('login');
            }
            session()->flash('success','登录成功');
            return redirect('/');
        }
        session()->flash('danger','邮箱或密码不正确！');
        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        session()->flash('success','退出成功');
        return redirect('/');
    }
}
