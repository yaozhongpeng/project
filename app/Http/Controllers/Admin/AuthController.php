<?php
// 后台权限管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 后台权限列表
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
            $pageSize = 8;
        }else{
            $pageSize = $request->input('pageSize');
        }

        $auth = DB::table("node")->where($kw_type,"like","%".$kw."%")->paginate($pageSize);
        return view("Admin.Auth.index",['auth'=>$auth,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加权限
        // 获取文件路径
        $dir = app_path('Http\Controllers\Admin');
        // dd($path);   
        $handle = opendir($dir);   
        while( ($fileName = readdir($handle))!== false ) {
            if ($fileName=='.' || $fileName=='..'){ continue;}    
            // echo $fileName.'<br>';
            $fileName = substr($fileName,0,strpos($fileName,'.'));
            $arr[] = $fileName;
        }
        // var_dump($arr); // die;    
        closedir($handle);
        return view("Admin.Auth.add",['arr'=>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加权限
        $data = $request->except(['_token']);
        $m = $request->input('mname');
        $a = $request->input('aname');
        $d = DB::table('node')->where('mname','=',$m)->where('aname','=',$a)->first();
        // dd($d);
        if(!empty($d)) {
            return back()->with('error','权限已存在,请勿重复添加!');
        }
        // 入库
        if(DB::table('node')->insert($data)){
            return redirect('/auth')->with('success','添加权限成功!');
        }else{
            return back()->with('error','添加权限失败!');
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
        // 修改权限
        // 获取原有权限信息
        $auth = DB::table('node')->where('id','=',$id)->first();
        return view('Admin.Auth.edit',['auth'=>$auth]);
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
        // 更新权限数据
        $data = $request->except(['_token','_method']);
        if (DB::table('node')->where('id','=',$id)->update($data)) {
            return redirect('/auth')->with('success','权限修改成功!');
        }else{
            return back()->with('error','修改权限失败!');
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
        // 删除权限
        if(DB::table('node')->where('id','=',$id)->delete()){
            return redirect('/auth')->with('success','删除权限成功!');
        }else{
            return redirect('/auth')->with('error','删除权限失败!');
        }
    }
}
