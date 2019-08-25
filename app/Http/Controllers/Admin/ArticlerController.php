<?php
// 后台公告模块 Redis 版
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article; // 导入公告模型类
use DB;
use Config; // 图片路径
use Intervention\Image\ImageManager; // 导入 Intervention Image 组件
use App\Services\OSS; // 导入OSS类
use Illuminate\Support\Facades\Redis; //导入三方类 Redis

class ArticlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redis 列表
        // 列表数据存储到 redis 缓存中
        $arts = []; // 存储数组格式的数据
        $hashkey = 'Hash_article'; // Hash 表用于存数据
        $listkey = 'List_article_list'; // 链表名,用于存储id
        // 判断 redis 中是否有缓存数据
        if (Redis::exists($listkey)) {
            // 获取缓存服务器下的数据 id
            $lists = Redis::lrange($listkey,0,-1);
            // dd($lists);
            // 遍历链表中的 id
            foreach($lists as $k=>$v){
                $arts[]=Redis::hgetall($hashkey.$v); 
            }
        }else{
            // 从数据库中获取,转换成数组
            $arts = Article::get()->toArray();
            // 把数据给 redis 一份
            foreach($arts as $k=>$v){
            // 1.把记录 id 存到链表中
            Redis::lpush($listkey,$v['id']);
            // 2.把数据 存到哈希表中
            Redis::hmset($hashkey.$v['id'],$v);
            }
        }
        return view('Admin.Articler.index',['arts'=>$arts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // redis 添加公告
        return view('Admin.Articler.add'); // 加载 redis 添加公告模板
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ----------------阿里云 OSS 上传 start-------------------        
        if ($request->hasFile('thumb')) { // 1.检测是否有文件上传
            $name = time(); // 文件名
            $file = $request->file('thumb'); // 文件上传信息
            $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取文件后缀
        }

        // 上传阿里云 OSS
        $newfile = $name.'.'.$ext; // 上传到阿里云存储的新文件名
        $filepath = $file->getRealPath(); // 文件上传的临时目录
        OSS::upload($newfile, $filepath); // 实例化 oss 类
        // die; // 休息一下,检测是否可以上传

        // 数据入库
        $data['title']=$request->input('title');
        $data['editor']=$request->input('editor');
        $data['thumb'] = env('ALIURL').$newfile;
        $data['descr'] = $request->input('descr');
        // 数据入库
        $data1 = Article::create($data);
        $id = $data1->id;
        if ($id) {
            // 添加数据到数据库的同时,添加到缓存服务器
            // ------------redis start-------------------------
            $listkey = 'List_article_list';   // 链表
            $hashkey = 'Hash_article';        // Hash表
            Redis::lpush($listkey,$id);       // id  存到链表
            $data['id'] = $id;                // Hash表中需要有 id 字段
            Redis::hmset($hashkey.$id,$data); // 数据存到哈希表
            // ------------redis end---------------------------
            return redirect('/adminarticleredis')->with('success','添加成功!');
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
        $art = Article::where('id','=',$id)->first();
        return view('Admin.Articler.edit',['art'=>$art]);
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
        // 删除公告
        if (Article::where('id','=',$id)->delete()) {
            // ------------redis start-------------------------
            $listkey = 'List_article_list'; // 链表
            $hashkey = 'Hash_article';      // Hash表
            // 删除缓存服务器数据,否则缓存存在
            Redis::lrem($listkey,1,$id);   // 删除链表里的 id
            Redis::del($hashkey.$id);    // 删除哈希表里的数据
            // ------------redis end---------------------------
            return redirect('/adminarticleredis')->with('success','删除成功!');
        }
        return redirect('/adminarticleredis')->with('error','删除失败!');
    }

    // Ajax 删除公告(全选 反选 全不选)
    public function del(Request $reqeust){
        // echo "del";die;
        $arr = $reqeust->input('arr');
        if($arr == ''){
            echo '请至少选择一条数据'; // die;
        }
        // echo json_encode($arr);
        // 遍历
        foreach($arr as $key=>$value){
            Article::where('id','=',$value)->delete();
            // ------------redis start-------------------------
            $listkey = 'List_article_list'; // 链表
            $hashkey = 'Hash_article';      // Hash表
            // 删除缓存服务器数据,否则缓存存在
            Redis::lrem($listkey,1,$value); // 删除链表里的 id
            Redis::del($hashkey.$value);    // 删除哈希表里的数据
            // ------------redis end---------------------------
        }
        echo 1;
    }

    // ajax 单个删除 redis 公告
    public function ajaxdel(Request $request){
        $id = $request->input('lid');
        // echo $id;
        // 删除公告
        if (Article::where('id','=',$id)->delete()) {
            // ------------redis start-------------------------
            $listkey = 'List_article_list'; // 链表
            $hashkey = 'Hash_article';      // Hash表
            // 删除缓存服务器数据,否则缓存存在
            Redis::lrem($listkey,1,$id);   // 删除链表里的 id
            Redis::del($hashkey.$id);    // 删除哈希表里的数据
            // ------------redis end---------------------------
            echo 1;
        }
    }
}
