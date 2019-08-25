<?php
// 后台公告模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article; // 导入公告模型类
use DB;
use Config; // 图片路径
use Intervention\Image\ImageManager; // 导入 Intervention Image 组件
use App\Services\OSS; // 导入OSS类
use Illuminate\Support\Facades\Redis; //导入三方类 Redis

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 公告列表
        // 获取搜索关键词
        $kw = $request->input('kw');
        // dd($kw);

        // 获取查询类型
        $kw_type = $request->input('kw_type');
        if (empty($kw_type)) {
            $kw_type = 'title';
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
        $articles = Article::where($kw_type,"like","%".$kw."%")->orderBy('id','desc')->paginate($pageSize);
        return view('Admin.Article.index',['articles'=>$articles,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加公告
        return view('Admin.Article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ----------------普通添加执行 start----------------------
        // 上传图片
        // if ($request->hasFile('thumb')) { // 1.检测是否有文件上传
        //     $name = time(); // 文件名
        //     $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取文件后缀
        //     // 2.移动文件到 upload 目录下,app.app_upload 为日期目录
        //     $request->file('thumb')->move(Config::get('app.app_upload'),$name.'.'.$ext);
        // }

        // // 图片裁剪
        // $manager = new ImageManager(); // 实例化类库
        // $manager->make(Config::get('app.app_upload').'/'.$name.'.'.$ext)->resize(100,100)
        //         ->save(Config::get('app.app_upload').'/'.'min_'.$name.'.'.$ext);
        
        // // 数据入库
        // // dd($request->all());
        // $data = $request->except(['_token']);
        // $data['thumb'] = trim(Config::get('app.app_upload').'/'.'min_'.$name.'.'.$ext,'.'); // linux 下需要根目录路径
        // $data['descr'] = $request->input('descr');
        // // dd($data);
        // if (Article::create($data)) {
        //     return redirect('/adminarticle')->with('success','添加公告成功!');
        // }else{
        //     return back()->with('error','添加失败!');
        // }
        // ----------------普通添加执行 end----------------------


        // ----------------阿里云 OSS 上传 start-------------------
        // 上传图片        
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

        // 图片裁剪
        $manager = new ImageManager(); // 实例化类库
        // 路径 env('ALIURL')=https://php217laravel.oss-cn-beijing.aliyuncs.com/
        $m = $manager->make(env('ALIURL').$newfile)->resize(100,100);
         // dd($m);

        // 数据入库
        // dd($request->all());
        $data['title']=$request->input('title');
        $data['editor']=$request->input('editor');
        $data['thumb'] = env('ALIURL').$newfile;
        $data['descr'] = $request->input('descr');
        // dd($data);
        if (Article::create($data)) {
            return redirect('/adminarticle')->with('success','添加公告成功!');
        }else{
            return back()->with('error','添加失败!');
        }
        // ----------------阿里云 OSS 上传 end-------------------
        // ----------------七牛云上传 待续-------------------       
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
        // 修改公告
        // echo $id;die;
        // 获取原有公告数据
        $art = Article::where('id','=',$id)->first();
        return view('Admin.Article.edit',['art'=>$art]);
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
        // 更新公告数据
        if ($request->hasFile('thumb')) { // 1.检测是否有文件上传
            $name = time(); // 文件名
            $file = $request->file('thumb'); // 文件上传信息
            $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取文件后缀
        
            // 上传阿里云 OSS
            $newfile = $name.'.'.$ext; // 上传到阿里云存储的新文件名
            $filepath = $file->getRealPath(); // 文件上传的临时目录
            OSS::upload($newfile, $filepath); // 实例化 oss 类
            // die; // 检测是否可以上传

            // 图片裁剪
            $manager = new ImageManager(); // 实例化类库
            // 获取 oss 路径 env('ALIURL')=https://php217laravel.oss-cn-beijing.aliyuncs.com/
            $manager->make(env('ALIURL').$newfile)->resize(100,100);
        }

        // $data = $request->except(['_token','_method']);
        if ($request->hasFile('thumb')){
            $img = env('ALIURL').$newfile;
        }else{
            $img = $request->input('hid');
        }
        $data['title']=$request->input('title');
        $data['editor']=$request->input('editor');
        $data['thumb'] = $img;
        $data['descr'] = $request->input('descr');
        // dd($data);
        if (Article::where('id','=',$id)->update($data)) {
            return redirect('/adminarticle')->with('success','修改成功!');
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
        // 删除公告
        if (Article::where('id','=',$id)->delete()) {
            return redirect('/adminarticle')->with('success','删除成功!');
        }
        return redirect('/adminarticle')->with('error','删除失败!');
    }

    // Ajax 删除公告
    public function del(Request $reqeust){
        // echo "del";die;
        $arr=$reqeust->input("arr");
        if($arr==""){
            echo "请至少选择一条数据";die;
        }
        // echo json_encode($arr);
        // 遍历
        foreach($arr as $key=>$value){
            Article::where("id","=",$value)->delete();
        }
        echo 1;
    }

    // 测试 redis 类
    public function redistest(){
        // Redis::set('one','php217'); // 设置值
        // echo Redis::get('one'); // 获取值
    }
}
