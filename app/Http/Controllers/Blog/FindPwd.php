<?php

namespace App\Http\Controllers\Blog;

use App\Notifications\ResetPwd;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
class FindPwd extends Controller
{
    public function index(){
        return view('password.index');
    }

    public function sendEmail(Request $request){
        $email = $request->input('email');
        $user = User::where('email','=',$email)->first();

        if ($user){
            Notification::send($user,new ResetPwd($email));
            session()->flash('success','我们已经给您发送了一封邮件，请前往您的邮箱进行后续操作！');
            return view('password.index');
        }else{
            session()->flash('danger','请输入正确的邮箱地址！');
            return redirect()->route('findpassword');
        }
    }

    public function resetPwd($email){
        $user = User::where('email','=',$email)->first();
        return view('password.setPassword',compact('user'));
    }

    public function update(Request $request){
        $post = $request->all();
        $this->validate($request,[
            'password'=>'required|min:6|max:16|confirmed'
        ]);
        $user = User::where('email','=',$request->input('email'))->first();
        $user['password'] = bcrypt($post['password']);
        $user->save();
        session()->flash('success','密码重置成功！请重新登录');
        return redirect()->route('login');
    }
}
