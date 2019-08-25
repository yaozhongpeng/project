<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // 注册
    public function register(){
    	// echo '注册';
    	// 加载视图
    	return view('Home.User.register');
    }

    // 调用短信接口
    public function send($m){
    	// echo '获取成功!';
        sendsphone($m);
    }
}
