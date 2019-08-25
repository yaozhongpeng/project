<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User; // 导入模型类
use Hash; // 导入 Hash
use Mail; // 导入 Mail

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 退出
        // $request->session()->pull('homename'); // 销毁 session

        // // 加载登录界面
        // return redirect('/homelogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载登录页面
        return view('Home.Login.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 邮箱登录
        // dd($request->all());
        $email = $request->input('email'); // 获取输入邮箱
        $password = $request->input('password'); // 获取输入密码
        // 根据输入邮箱查询
        $info = User::where('email','=',$email)->first();
        // dd($info);
        // 1.检测邮箱
        if ($info) {
            // echo $email.'ok';
            // 2.检测密码
            if (Hash::check($password,$info->password)) {
                // echo 'password is ok';
                // 3.检测状态
                if ($info->status == '已激活') {
                    // 4.登录成功,设置 session 
                    // session(['homename'=>$email]);
                    session(['email'=>$email]);
                    session(['user_id'=>$info->id]);
                    return redirect('/homeindex');
                }else{
                    return back()->with('error','用户未激活,请登录注册邮箱激活账号!');
                }
            }else{
                 return back()->with('error','密码输入错误!');
            }
        }else{
            return back()->with('error','邮箱输入错误或未注册');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 加载忘记找回方式模板
    public function forget(){
       return view("Home.Login.forget");
    }

    //----------------email start--------------------
    // email-0 发送找回密码视图邮件
    public function loginmail($id,$email,$token){
        Mail::send("Home.Login.reset",[
            'id'=>$id,
            'token'=>$token
            ],function($message)use($email){
            $message->to($email);
            $message->subject("重置密码");
        });
        return true;
    }

    // email-1 加载邮箱找回模板
    public function useemail(){
       return view("Home.Login.useemail");
    }

    // email-2 调用发邮件方法
    public function doemail(Request $request){
        // 发送邮件找回密码
        $email = $request->input('email');
        //获取数据库的数据
        $info = User::where('email','=',$email)->first();
        if($this->loginmail($info->id,$email,$info->token)){
            return redirect('https://mail.qq.com/');
        }
    }

    // email-3 根据 id 校验 token
    public function reset(Request $request){
        $id = $request->input('id');
        $token = $request->input('token');
        // 获取数据库的数据
        $info = User::where('id','=',$id)->first();
        // echo $id.":".$token;
        // 直接跳转到重置密码模板
        // 对比toke'
        if($token == $info->token){
            return view('Home.Login.resetpwd',['id'=>$id]);
        }
    }

    // 执行重置密码
    public function doreset(Request $request){
        //密码的修改
        $id=$request->input('id');
        $password = $request->input('password');
        //执行修改
        $data['password'] = Hash::make($password);
        //重置token的值
        $data['token'] = str_random(50);
        if(User::where('id','=',$id)->update($data)){
            return redirect('/homelogin/create')->with('success','密码重置成功,请使用新密码登录!');
        }
     }
     
    //----------------email end--------------------

    //----------------phone start------------------

    // phone 1.加载手机找回模板
    public function usephone(){
       return view("Home.Login.usephone");
    }

    // phone 2.调用发送短信方法
    public function dophone(Request $request){
        $p = $request->input('phone');
        // echo $phone;
        $phone = User::where('phone','=',$p)->first();
        if ($phone) {
            echo 1;
        }else{
            echo 0;
        }
    }

    // 发送短信校验码
    public function dophonesendphone(Request $request){
        $pp = $request->input('pp');
        // echo $pp;
        // 调用短信接口
        $data = sendsphone($pp);
        echo $data;
    }

    // 检测短信验证码
    public function checkpcode(Request $request){
        $code = $request->input('code'); // 输入的验证码
        $pcode = $request->cookie('pcode'); // 短信平台发送的验证码
        if ($code == $pcode) {
            return view('Home.Login.resetpwd');
        }else{
            return back()->with('error','验证码一致');
        }
    }
    //----------------phone end------------------

    // 加载保密问题找回模板
    public function usequestion(){
       return view("Home.Login.usequestion");
    }
}
