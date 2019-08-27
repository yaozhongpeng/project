<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KeywordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 搜索词列表
        $kw = DB::table('goods_word')->paginate(10);//pluck('word');
        // dd($kw);
        return view('Admin.Keywords.index',['kw'=>$kw]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Keywords.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = $request->except(['_token']);
        // dd($data);
        if (DB::table('goods_word')->insert($data)) {
            return redirect('/adminkw')->with('success','添加搜索词成功!');
        }else{
            return back()->with('error','添加搜索词失败!');
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
        // 获取修改数据
        $kw = DB::table('goods_word')->where('id','=',$id)->first();
        return view('Admin.Keywords.edit',['kw'=>$kw]);
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
        $data = $request->except(['_token','_method']);
        // dd($data);
        $res = DB::table('goods_word')->where('id','=',$id)->update($data);
        if ($res) {
            return redirect('/adminkw')->with('success','修改搜索词成功!');
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
        // 删除搜索词
        if(DB::table('goods_word')->where('id','=',$id)->delete()){
            return redirect('/adminkw')->with('success','删除搜索词成功!');
        }
        return back()->with('error','删除搜索词失败!');
    }
}
