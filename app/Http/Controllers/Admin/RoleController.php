<?php
// 后台角色管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 角色列表
        // 获取角色
        $role = DB::table("role")->paginate(5);
        return view("Admin.Role.index",['role'=>$role]);
    }

    // 分配权限
    public function adminauth($id){
        // echo $id;die;
        // 
        // 获取所有权限
        $auths = DB::table('node')->get();
        // dd($auths);

        // 获取角色信息
        $role = DB::table('role')->where('id','=',$id)->first();
        // dd($roles);

        // 获取当前角色的权限信息
        $auth_r = DB::table('role_node')->where('rid','=',$id)->get();
        // dd($auth_r);
        if (count($auth_r)) {
            foreach($auth_r as $key=>$value){
                $nids[]=$value->nid;
            }
            return view('Admin.Role.auth',['auths'=>$auths,'role'=>$role,'nids'=>$nids]);
        }else{
            return view('Admin.Role.auth',['auths'=>$auths,'role'=>$role,'nids'=>[]]);
        }
    }

    // 保存权限
    public function saveauth(Request $request){
        $rid = $request->input("rid");
        // echo $rid;
        // 获取分配的权限
        $nids=$_POST['nids'];
        // dd($nids);
        // 删除当前角色原来的权限
        DB::table("role_node")->where("rid","=",$rid)->delete();
        // 入库
        foreach($nids as $key=>$value){
            $data['nid'] = $value;
            $data['rid'] = $rid;
            DB::table("role_node")->insert($data);
        }
        return redirect("/role")->with("success","权限分配成功");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加角色
        return view("Admin.Role.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加角色
        $data = $request->except(['_token']);
        // 入库
        if(DB::table('role')->insert($data)){
            return redirect('/role')->with('success','添加角色成功');
        }else{
            return back()->with('error',"添加角色失败");
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
        // 修改角色
        // 获取当前角色信息
        $role = DB::table('role')->where('id','=',$id)->first();
        return view('Admin.Role.edit',['role'=>$role]);
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
        // 执行修改角色
        // 获取修改信息
        // echo $id;
        $data = $request->except(['_token','_method']);
        // dd($data);
        if (DB::table('role')->where('id','=',$id)->update($data)) {
            return redirect('/role')->with('success','修改角色成功!');
        }else{
            return back()->with('error','修改角色失败!');
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
        // 删除角色
        if(DB::table('role')->where('id','=',$id)->delete()){
            return redirect('/role')->with('success','删除成功!');
        }else{
            return redirect('/role')->with('error','删除失败!');
        }
    }
}
