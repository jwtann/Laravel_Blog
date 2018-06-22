<?php

namespace App\Http\Controllers\Blog;

use App\Http\Requests\Usercheck;
use App\Mail\RegMail;
use App\Model\Blog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['create','store','index','activeEmail']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Usercheck $usercheck)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['email_token'] = str_random(10);
        $result = User::create($data);
        Mail::to($result)->send(new RegMail($result['email_token']));
        session()->flash('success','我们已向您注册的邮箱发送了一封邮件，请前往激活使用！');
        return redirect('/');
    }

    public function activeEmail($token){
        $user = User::where('email_token','=',$token)->first();
        $user['status'] = 1;
        $user->save();
        Auth::login($user);
        session()->flash('success','恭喜，激活成功!');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $blogs = Blog::where('user_id','=',$user['id'])->paginate(5);
        return view('home.show',compact('user','blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username'=>'required|min:3|max:16',
            'password'=>'nullable|required|min:5|max:16|confirmed'
        ]);

        $user['username'] = $data['username'];
        if ($data['password']){
            $user['password'] = bcrypt($data['password']);
        }
        $user->save();
        if ($data['password']){
            Auth::logout();
            session()->flash('success','密码修改成功,请重新登录');
            return redirect()->route('login');
        }
        session()->flash('success','资料修改成功');
        return redirect()->route('login');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();
        session()->flash('success','删除成功');
        return redirect()->route('user.index');
    }
}
