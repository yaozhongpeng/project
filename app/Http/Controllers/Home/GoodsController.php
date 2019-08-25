<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 商品首页
        $cates = self::getCatesByPid(0); // 获取分类数据
        $goods = DB::table('goods')->take(10)->get(); // 获取商品首页推荐商品数据
        return view('Home.Goods.index',['cates'=>$cates,'goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 商品详情
        $good = DB::table('goods')->where('id','=',$id)->first();
        // 买家评价
        $ping = DB::table('pingjia')->where('goods_id','=',$id)->get();
        return view('Home.Goods.show',['good'=>$good,'ping'=>$ping]);
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

    // 商品列表页
    public function list($id){
        $cate = DB::table('cates')->where('id','=',$id)->first(); // 获取当前分类
        $childcate = DB::table('cates')->where('pid','=',$id)->get(); // 获取当前分类下的子分类
        // dd($childcate);
        // dd($cate->cid);
        // var_dump($cate->cid);die;
        // 商品
        $arr = explode(',',$cate->cid);
        // dd($arr);
        $goods = DB::table('goods')->where('cate_id','=',$id)->get(); // 获取该分类下的所有商品
        // $goods = DB::select("select * form goods where cate_id in($arr)");
        return view('Home.Goods.list',['goods'=>$goods,'cate'=>$cate,'childcate'=>$childcate]);
    }
    // goods 商城首页,无限分类递归数据遍历
    public static function getCatesByPid($pid){
        //获取数据
        $cate = DB::table("cates")->where("pid","=",$pid)->get();
        $data = [];
        // 遍历
        foreach($cate as $key=>$value){
            // 把子类的信息写在父类 suv 的下标里
            $value->suv = self::getCatesByPid($value->id);
            $data[] = $value;
        }
        return $data;
    }
}
