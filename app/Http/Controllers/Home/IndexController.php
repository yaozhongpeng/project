<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 前台首页
        $cate = self::getCatesByPid(0);
        // dd($cates);

        // 获取公告信息
        $article_top = DB::table('articles')->orderBy('id','desc')->take(3)->get();
        // dd($article_top);

        // 获取友情链接
        $links = DB:: table('links')->where('status','=',1)->get();

        // 轮播图
        $imgs = DB::table('lb_img')->where('status','=',1)->get();

        // 首页商品推荐
        $goods = DB::table('goods')->take(10)->get();
        // 首页资讯推荐
        $news = DB::table('news')->take(6)->get();

        //获取顶级分类信息 
        $cates = DB::table('cates')->where('pid','=',0)->get();

        // 搜索词维护
        // $keywords = DB::table('goods_word')->where('level','=',1)->get(); 
        // dd($cate); 
        // 遍历 
        foreach($cates as $c){ 
            $good[] = DB::table('goods')->join('cates','goods.cate_id','=','cates.id')
            ->select('cates.name as cname','cates.id as cid','goods.id as sid','goods.name as sname','goods.pic','goods.num','goods.descr','goods.price')
            ->where('goods.cate_id','=',$c->id)->get();
        }
        return view('Home.Index.index',[
            'cate'=>$cate,
            'article_top'=>$article_top,
            'links'=>$links,
            'imgs'=>$imgs,
            'goods'=>$goods,
            'good'=>$good,
            'news'=>$news
            ]);
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

    // 无限分类递归数据遍历
    public static function getCatesByPid($pid){
        //获取数据
        $cate = DB::table('cates')->where('pid','=',$pid)->get();
        $data = [];
        // 遍历
        foreach($cate as $key=>$value){
            // 把子类的信息写在父类 suv 的下标里
            $value->suv = self::getCatesByPid($value->id);
            $data[] = $value;
        }
        return $data;
    }

    // 退出
    public function logout(Request $request){
        $request->session()->pull('email');
        $request->session()->pull('cart');
        $request->session()->pull('goods');
        return redirect('/homelogin/create');
    }

    // 中文分词搜索
    public function search(Request $request)
    {
        // dd($request->input('kw'));
        $word = empty($request->input('kw')) ? $request->input('kw') : '苍老师';
        // $word = isset($_GET['kw']) ? $_GET['kw'] : '1';
        // $word = $_GET['kw'];
        // dd($word);
        $data = DB::table('goods_word')->where('word','=',$word)->get();
        // dd($data);
        foreach ($data as $k => $v) {
            $data1[] = DB::table('goods')->join('goods_word','goods.id','=','goods_word.goods_id')
            ->select('goods_word.id as wid','goods.id as gid','goods.name','goods.pic','goods.descr','goods.num','goods.price')
            ->where('goods.id','=',$v->goods_id)->get();    
        }
        // dd($data1);
        return view('Home.Goods.search',['data'=>$data,'data1'=>$data1,'word'=>$word,'request'=>$request->all()]);
    }

    // goods_word 表,搜索词维护
    public function kwuse()
    {
        $keywords = DB::table('goods_word')->where('level','=',1)->get();
        // dd($keywords);
        return view('Home.HomePublic.homepublic',['keywords'=>$keywords]);
    }
}
