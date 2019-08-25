<?php
// 后台会员管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\User; // 导入模型类
use A; // 导入自定义类
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 列表
        $rows = User::count();            // 总记录数
        $pagesize = 5;                    // 每页数量
        $maxpage = ceil($rows/$pagesize); // 最大页码

        for ($i=1; $i <= $maxpage; $i++) { 
            $pages[$i] = $i;
        }
        // dd($pages);
        // 获取当前页
        $p = $request->input('page');
        // 判断
        if (empty($p)) {
            $p = 1;
        }
        // 获取偏移量
        $offset = ($p-1)*$pagesize;
        
        // DB 获取当前页数据
        // $sql = "select * from user limit $offset,$pagesize";
        // $data = DB::select($sql);

        // 模型获取当前页数据
        $data = User::offset($offset)->limit($pagesize)->get();

        // echo 'ok';
        // 判断是否为 ajax 请求
        if ($request->ajax()) {
            // echo 'This is ajax request!'; die;
            // echo '<b>'$p'</b>'; 
            // die;
            // 返回请求数据到视图,加载 ajax 请求独立的模板
            return view('Admin.User.page',[
                'data'=>$data
                ]);
        }

        // 加载视图
        return view('Admin.User.index',[
            // 'user'=>$user,
            'pages'=>$pages,
            'data'=>$data,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加
        // echo 'This is add';
        // 加载视图
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Respon.se
     */
    public function store(Request $request)
    {
        // 添加执行
        // dd($request->all());
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $data['status'] = 1; // 默认禁用
        $data['token'] = str_random(50);

        // 使用模型类插入数据
        if(User::create($data)){
            // echo 'ok!';
            return redirect('/adminuser')->with('success','添加成功!');
        }else{
            return back();
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
        // 修改
        // 获取修改数据
        $user = User::where('id','=',$id)->first();
        // echo '<pre>';
        // print_r($user);
        return view('Admin.User.edit',['user'=>$user]);
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
        // echo $id;
        // 获取修改数据
        $data = $request->except(['_token','_method']);
        $data['password'] = Hash::make($data['password']);

        if(User::where('id','=',$id)->update($data)){
            return redirect('/adminuser')->with('success','修改成功');
        }else{
            return redirect('/adminuser/$id/edit')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 删除
        if(User::where('id','=',$id)->delete()){
            return redirect('/adminuser')->with('success','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }

    // 获取会员详情
    public function userinfo($id){
        // echo $id;
        $userinfo = User::find($id)->info;
        // dd($userinfo);
        return view('Admin.User.info',['userinfo'=>$userinfo]);
    }

    // 会员收货地址
    public function useraddress($id){
        // echo $id;
        //调用模型类的address
        $address=User::find($id)->address;
        // dd($address);
        return view('Admin.User.address',['address'=>$address]);
    }

    // 设置自定义类
    public function xxoo() { 
    //实例化类A 
        $class = new A(); 
        $class->sendphone();
        return view('Admin.User.diy'); 
    }
}
