<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Model\Blog;
Route::get('/', function () {
    $blogs = Blog::paginate(5);
    return view('home.index',compact('blogs'));
});
//Route::get('/','Blog\UserController@index')->name('home');

//用户资源路由
Route::resource('/user','Blog\UserController');
//登录模板路由
Route::get('/login','Blog\Login@create')->name('login');
//登录
Route::post('/login','Blog\Login@login')->name('login');

Route::get('/logout','Blog\Login@logout')->name('logout');

//邮箱激活路由
Route::get('/activeEmail/{token}','Blog\UserController@activeEmail')->name('activeEmail');

//密码找回路由
Route::get('/findpassword','Blog\FindPwd@index')->name('findpassword');
//密码找回发送邮件
Route::post('/sendEmail','Blog\FindPwd@sendEmail')->name('sendEmail');

//邮件激活
Route::get('/reset/{email}','Blog\FindPwd@resetPwd')->name('resetPwd');

//更改密码
Route::post('/reset','Blog\FindPwd@update')->name('update');

//博客
Route::resource('/blog','Blog\BlogController');