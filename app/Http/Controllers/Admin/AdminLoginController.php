<?php
// 后台登录模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 退出
        $request->session()->pull('adminname'); // 销毁 session
        $request->session()->pull('nodelist');

        // 加载登录界面
        return redirect('/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 后台登录
        // 加载后台登录视图
        return view('Admin.AdminLogin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行登录
        // dd($request->all());
        // 获取登录 nasme 和 password
        $name = $request->input('name');
        $password = $request->input('password');
        // 检测管理员 name
        $info = DB::table('admin_users')->where('name','=',$name)->first();
        // dd($info);

        // 检测 name
        if ($info) { 
            // echo 'name ok!';
            // ---------------检测密码 start---------------
            if (Hash::check($password,$info->password)) {
                // echo 'password is ok!';
                session(['adminname'=>$name]); // 登录成功,设置session
                // name 和 password 通过 继续下一步
                // 设置权限开始
                // 1.获取后台登录用户的所有的权限信息
                $list = DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
                // dd($list);
                // 2.初始化权限 让所有的后台管理员都具有后台首页的权限
                $nodelist['AdminController'][] = "index";
                foreach($list as $key=>$value){
                    // 把当前登录的用户权限写入到 $nodelist
                    $nodelist[$value->mname][] = $value->aname;
                    // 如果有create方法 添加store
                    if($value->aname == "create"){
                        $nodelist[$value->mname][] = "store";
                    }
                    // 如果有 edit方法 添加 update
                    if($value->aname == "edit"){
                        $nodelist[$value->mname][] = "update";
                    }
                }
                // dd($nodelist);
                // 3.把当前登录用户的所有权限信息存储到 session 中
                session(['nodelist'=>$nodelist]);

                return redirect('/admin')->with('success','登录后台成功!');
            }else{
                return back()->with('error','密码问题');
            }
            // ---------------检测密码 end---------------
        }else{
            return back()->with('error','用户名问题');
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
}
