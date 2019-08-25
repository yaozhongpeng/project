<?php
// 后台管理员模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 管理员列表
        // 获取搜索关键词
        $kw = $request->input('kw');
        // dd($kw);
        // 获取查询类型
        $kw_type = $request->input('kw_type');
        if (empty($kw_type)) {
            $kw_type = 'name';
        }else{
            $kw_type = $request->input('kw_type'); 
        }
        // 分页数量控制
        $pageSize = $request->input('pageSize');
        if (empty($pageSize)) {
            $pageSize = 5;
        }else{
            $pageSize = $request->input('pageSize');
        }
        $adminusers = DB::table('admin_users')->where($kw_type,"like","%".$kw."%")->paginate($pageSize);
        return view('Admin.Adminuser.index',['adminusers'=>$adminusers,'request'=>$request->all()]);
    }

    // -----------------------分配角色------------------------
    public function adminuserrole($id){
        // echo $id;
        // 获取当前用户信息
        $info = DB::table('admin_users')->where('id','=',$id)->first();

        // 获取所有角色信息
        $role = DB::table('role')->get();

        // 获取当前用户角色信息
        $data = DB::table('user_role')->where('uid','=',$id)->get();
        if(count($data)){
            foreach($data as $key=>$value){
                //$rids 当前用户的所有角色 id
                $rids[]=$value->rid;
            }
            // 加载分配角色模板
            return view('Admin.Adminuser.role',['info'=>$info,'role'=>$role,'rids'=>$rids]);
        }else{
            return view('Admin.Adminuser.role',['info'=>$info,'role'=>$role,'rids'=>array()]);
        }
    }

    // --------------------------保存角色---------------------------
    public function saverole(Request $request){
        // 把选中的新角色插入到user_role
        // 获取用户的id
        $uid=$request->input('uid');
        // echo $uid;
        // 获取分配的角色
        $rids=$_POST['rids'];
        // var_dump($rids);

        // 把当前用户的角色信息删除
        DB::table('user_role')->where('uid','=',$uid)->delete();
        // 入库
        foreach($rids as $key=>$value){
            $data['uid'] = $uid;
            $data['rid'] = $value;
            DB::table("user_role")->insert($data);
        }
        return redirect('/adminusers')->with('success','角色分配成功');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加管理员
        return view('Admin.Adminuser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加
        // dd($request->all());
        $data = $request->except(['_token']); // 取出多余参数
        $data['password'] = Hash::make($data['password']); // 密码加密
        if(DB::table('admin_users')->insert($data)){
            return redirect('/adminusers')->with('success','添加管理员成功!');
        }else{
            return back()->with('error','添加失败!');
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
        // 修改管理员
        // 获取修改记录信息
        $adminuser = DB::table('admin_users')->where('id','=',$id)->first();
        return view('Admin.Adminuser.edit',['adminuser'=>$adminuser]);
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
        // 修改管理员信息
        // echo $id;
        // 获取修改数据
        $data = $request->except(['_token','_method']);
        $data['password'] = Hash::make($data['password']);

        if(DB::table('admin_users')->where('id','=',$id)->update($data)){
            return redirect('/adminusers')->with('success','修改管理员成功');
        }else{
            return redirect('/adminusers/$id/edit')->with('error','修改失败');
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
        // 删除管理员
        if(DB::table('admin_users')->where('id','=',$id)->delete()){
            return redirect('/adminusers')->with('success','删除管理员成功!');
        }else{
            return redirect('/adminusers')->with('error','删除失败!');
        }
    }
}
