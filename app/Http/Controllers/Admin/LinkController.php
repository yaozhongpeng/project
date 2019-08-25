<?php
// 后天友情链接管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link; // 导入友情链接模型类

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 友情链接列表
        // 获取搜索关键词
        $kw = $request->input('kw');
        // dd($kw);
        // echo $kw;

        // 获取查询类型
        $kw_type = $request->input('kw_type');
        if (empty($kw_type)) {
            $kw_type = 'keywords';
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

        $links = Link::where($kw_type,"like","%".$kw."%")->paginate($pageSize);
        // dd($links);
        return view('Admin.Link.index',[
            'links'=>$links,
            'request'=>$request->all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加友情链接
        return view('Admin.Link.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 添加执行
        $data = $request->except(['_token']);
        $data['link'] = 'http://'.ltrim(($request->input('link')),'http://');
        // dd($data);
        if (Link::create($data)) {
            return redirect('/adminlink')->with('success','添加链接成功!');
        }else{
            return back()->with('error','添加链接失败!');
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
        // 修改友情链接
        // 获取原有数据
        $link = Link::where('id','=',$id)->first();
        return view('Admin.Link.edit',['link'=>$link]);
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
        // 执行修改更新
        // 获取新添加的数据
        $data = $request->except(['_token','_method','status']); // 状态为获取到原始数据,暂时去掉
        $data['link'] = 'http://'.ltrim(($request->input('link')),'http://');
        // dd($data);
        $res = Link::where('id','=',$id)->update($data);
        if ($res) {
            return redirect('/adminlink')->with('success','修改成功!');
        }
        return back()->with('error','修改失败!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 删除友情链接
        // 删除
        if(Link::where('id','=',$id)->delete()){
            return redirect('/adminlink')->with('success','删除成功!');
        }
        return redirect('/adminlink')->with('error','删除失败!');
    }

    // 友情链接开关
    public function linkup(Request $request){
        $id = $request->input('lid');
        // echo $id;
        $data0['status'] = 0; 
        $data1['status'] = 1; 
        $l = Link::where('id','=',$id)->first();
        if ($l->status == '上架中') {
            Link::where('id','=',$id)->update($data0);
            echo '0';
        }else if($l->status == '已下架'){
            Link::where('id','=',$id)->update($data1);
            echo '1';
        }
    }
}
