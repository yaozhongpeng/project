<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail; // 引入邮件类
use Gregwar\Captcha\CaptchaBuilder; //引入第三方验证码类库 
use App\Models\HomeRegister; // 引入模型类
use Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载前台注册页面
        return view('Home.Register.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        // dd($request->all());
        // 获取输入验证码
        $code = $request->input('code');
        // 获取系统生成验证码
        $vcode = session('vcode');
        // echo $code.'=>'.$vcode;
        if ($code == $vcode) {
            // echo '验证码输入正确!';
            // dd($request->all());
            $data['email'] = $request->input('email');
            $data['password'] = Hash::make($request->input('password'));
            $data['name'] = 'user_'.rand(1,10000);
            $data['phone'] = 'phone_'.rand(1,10000);
            $data['status']= 0; // 0 未激活 // 2 已经激活(发送邮件)
            $data['token'] = str_random(50);
            // dd($data);
            $data1 = HomeRegister::create($data);
            // dd($data1);
            // if ($data1) {
            //     echo 'ok';
            // }else{
            //     echo 'no';
            // }
            
            $id = $data1->id; // 在模型里插入数据的同时获取 id
            if($id){
                // echo 'ok';
                // 调用方法 发送邮件激活当前用户 status 0=>2
                $res = $this->registermail($id,$data['email'],$data['token']);
                if($res){
                    return redirect('https://mail.qq.com/')->with('success','注册成功,请登录邮箱激活账号!');
                }
                return back()->with('error','请重新发送邮件,激活用户');
            }
            return redirect('/homeregister/create')->with('error','注册失败,重新注册');
        }
        return back()->with('error','验证码有误');
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

    //测试邮件发送 
    // public function send(){ 
    //     // 邮件消息生成器 $message 
    //     Mail::raw('this is test', function ($message) { 
    //     // 发送主题 
    //     $message->subject('laravel发送邮件测试'); 
    //     // 接收方 
    //     $message->to("389832344@qq.com"); 
    //     }); 
    // }

    // 生成验证码
    public function code(){
        // 生成校验码代码
        ob_clean(); // 清除操作
        // 实例化校验码类库
        $builder = new CaptchaBuilder;
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把获取到的校验码存储在session 方便和输入的校验码做对比
        session(['vcode'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        // 输出验证码
        $builder->output();
        // die;
    }

    // 发送邮件
    public function registermail($id,$email,$token){
        // 闭包函数内部直接获取不到闭包函数外部的变量 
        // use 把闭包函数外部的变量直接引入到闭包函数内部
        Mail::send('Home.Register.jihuo',['id'=>$id,'token'=>$token],function($message)use($email){
            $message->to($email);
            $message->subject('激活用户');
        });
        return true;
    }

    // 邮件激活用户 status 由0=>2
    public function jihuo(Request $request){
        $id=$request->input("id");
        $token=$request->input("token");
        //获取数据库的token
        $user=HomeRegister::where("id","=",$id)->first();
        //对比邮件里token是否和数据库的 token 一致
        if($token == $user->token){
            // 执行修改 status 0=>2
            $data['status']=2;
            // token参数值重新赋值
            $data['token']=str_random(50);
            HomeRegister::where("id","=",$id)->update($data);
            echo "用户已经激活,请去登录";
        }
        return redirect('/homelogin/create')->with('success','激活成功,欢迎新用户');
    }

    //-----------------------前台手机注册-------------------------
    // 前台手机注册账号
    public function registerphone(Request $request){
        // dd($request->all());
        $data['email'] = 'email_'.rand(1,10000);
        $data['password'] = Hash::make($request->input('password'));
        $data['name'] = 'user_'.rand(1,10000);
        $data['phone'] = $request->input('phone');
        $data['status']= 2; // 0 未激活 
        $data['token'] = str_random(50);
        // dd($data);
        if (HomeRegister::create($data)) {
            return redirect('/homelogin/create')->with('success','注册成功');
        }else{
            return back()->with('error','注册失败!');
        }
    }

    // 检测手机号是否唯一
    public function checkphone(Request $request){
        $p = $request->input('phone');
        // echo $p;
        // 获取表单输入手机号和数据表已存在的做比较
        // $data = HomeRegister::where('phone','='$p)->first();
        $phone = HomeRegister::pluck('phone')->toArray();
        // dd($phone);
        if(in_array($p,$phone)){
            echo 1; // 存在
        }else{
            echo 0; // 不存在
        }
    } 

    // 发送短信校验码
    public function registersendphone(Request $request){
        $pp = $request->input('pp');
        // echo $pp;
        // 调用短信接口
        $data = sendsphone($pp);
        echo $data;
    }  

    // 检测短信验证码
    public function checkcode(Request $request){
        $code = $request->input('code'); // 输入的验证码
        if (isset($_COOKIE['pcode']) && !empty($code)) { // cokie 中有验证码 && 输入的验证码不为空
            $pcode = $request->cookie('pcode'); // 短信平台发送的验证码
            if ($code == $pcode) {
                echo 1; // 验证码一致
            }else{
                echo 2; // 验证码不一致
            }
        }else if(empty($code)){
            echo 3; // 输入的验证码为空
        }else if(!isset($_COOKIE['pcode'])){
            echo 4; // 验证码已过期
        }
    }

}
