<?php
// 后台商品管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config; // 图片路径
use Intervention\Image\ImageManager; // 导入 Intervention Image 组件
use App\Services\OSS; // 导入OSS类

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 后台商品列表
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

        // 排序规则
        $orderType = $request->input('orderType');
        if (empty($orderType)) {
            $orderType = 'id';
        }else{
            $orderType = $request->input('orderType');
        }
        // dd($orderType);
        $good = DB::table('goods')->where($kw_type,"like","%".$kw."%")->orderBy($orderType)->paginate($pageSize);
        return view('Admin.Goods.index',['good'=>$good,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 后台商品添加
        $cate = CateController::getCates(); // 调用分类控制器中的获取分类方法
        return view('Admin.Goods.add',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加商品
        // dd($request->all());
        // ----------------阿里云 OSS 上传 start-------------------
        // 上传图片        
        if ($request->hasFile('pic')) { // 1.检测是否有文件上传
            $name = time(); // 文件名
            $file = $request->file('pic'); // 文件上传信息
            $ext = $request->file('pic')->getClientOriginalExtension(); // 获取文件后缀
        }

        // 上传阿里云 OSS
        $newfile = $name.'.'.$ext; // 上传到阿里云存储的新文件名
        $filepath = $file->getRealPath(); // 文件上传的临时目录
        OSS::upload($newfile, $filepath); // 实例化 oss 类
        // die; // 休息邮箱,检测是否可以上传
        
        // 数据入库
        $data['cate_id']=$request->input('cate_id');
        $data['name']=$request->input('name');
        $data['pic'] = env('ALIURL').$newfile;
        $data['descr'] = $request->input('descr');
        $data['num'] = $request->input('num');
        $data['price'] = $request->input('price');
        // dd($data);
        if (DB::table('goods')->insert($data)) {
            return redirect('/admingoods')->with('success','添加商品成功!');
        }else{
            return back()->with('error','添加失败!');
        }
        // ----------------阿里云 OSS 上传 end-------------------
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 后台商品详情
        // echo $id;
        $show = DB::table('pingjia')->where('id','=',$id)->get();
        return view('Admin.Goods.show',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 后台商品修改
        $cate = CateController::getCates();
        $good = DB::table('goods')->where('id','=',$id)->first();
        return view('Admin.Goods.edit',['cate'=>$cate,'good'=>$good]);
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
        // dd($request->all());
        // $data = $request->except(['_method','_token']);
        // dd($data);
        // 上传图片        
        if ($request->hasFile('pic')) { // 1.检测是否有文件上传
            $name = time(); // 文件名
            $file = $request->file('pic'); // 文件上传信息
            $ext = $request->file('pic')->getClientOriginalExtension(); // 获取文件后缀
        
            // 上传阿里云 OSS
            $newfile = $name.'.'.$ext; // 上传到阿里云存储的新文件名
            $filepath = $file->getRealPath(); // 文件上传的临时目录
            OSS::upload($newfile, $filepath); // 实例化 oss 类

            $img = env('ALIURL').$newfile;
        }else{
            $g = DB::table('goods')->where('id','=',$id)->first();
            $img = $g->pic;
        }
        
        // 数据入库
        $data['cate_id']=$request->input('cate_id');
        $data['name']=$request->input('name');
        $data['pic'] = $img;
        $data['descr'] = $request->input('descr');
        $data['num'] = $request->input('num');
        $data['price'] = $request->input('price');
        // dd($data);
        if (DB::table('goods')->where('id','=',$id)->update($data)) {
            return redirect('/admingoods')->with('success','修改商品成功!');
        }else{
            return back()->with('error','修改失败!');
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
        // 后台商品删除
        if (DB::table('goods')->where('id','=',$id)->delete()) {
            return redirect('/admingoods')->with('success','删除成功!');
        }
        return back()->with('error','删除失败!');
    }
}
