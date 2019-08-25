<?php
// 后台轮播图管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config; // 图片路径
use Intervention\Image\ImageManager; // 导入 Intervention Image 组件

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 轮播图列表
        $imgs = DB::table('lb_img')->paginate(5);
        return view('Admin.Img.index',['imgs'=>$imgs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加录播图
        return view('Admin.Img.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加录播图
        // dd($request->all());
        // 上传图片
        if ($request->hasFile('thumb')) { // 1.检测是否有文件上传
            $name = time(); // 文件名
            $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取文件后缀
            // 2.移动文件到 upload 目录下,app.app_upload 为日期目录
            $request->file('thumb')->move(Config::get('app.app_upload'),$name.'.'.$ext);
        }

        // 图片裁剪
        $manager = new ImageManager(); // 实例化类库
        $manager->make(Config::get('app.app_upload').'/'.$name.'.'.$ext)->resize(660,300)
                ->save(Config::get('app.app_upload').'/'.'min_'.$name.'.'.$ext);
        
        // 数据入库
        // dd($request->all());
        $data['name'] = $request->input('name');
        $data['thumb'] = trim(Config::get('app.app_upload').'/'.'min_'.$name.'.'.$ext,'.'); // linux 下需要根目录路径        
        // dd($data);
        if (DB::table('lb_img')->insert($data)) {
            return redirect('/adminimg')->with('success','添加成功!');
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
        // 修改轮播图
        $img = DB::table('lb_img')->where('id','=',$id)->first();
        return view('Admin.Img.edit',['img'=>$img]);
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
        // 执行修改
        // dd($request->all());
        // 上传图片
        if ($request->hasFile('thumb')) { // 1.检测是否有文件上传
            $name = time(); // 文件名
            $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取文件后缀
            // 2.移动文件到 upload 目录下,app.app_upload 为日期目录
            $request->file('thumb')->move(Config::get('app.app_upload'),$name.'.'.$ext);
        
            // 图片裁剪
            $manager = new ImageManager(); // 实例化类库
            $manager->make(Config::get('app.app_upload').'/'.$name.'.'.$ext)->resize(660,300)
                ->save(Config::get('app.app_upload').'/'.'min_'.$name.'.'.$ext);
         }
        
        // 封装修改数据
        $data = $request->except(['_token','_method']);
        if ($request->hasFile('thumb')) { 
            $data['thumb'] = trim(Config::get('app.app_upload').'/'.'min_'.$name.'.'.$ext,'.'); // linux 下需要根目录路径        
            // dd($data['thumb']);
        }else{
            $img = DB::table('lb_img')->where('id','=',$id)->first();
            $data['thumb'] = $img->thumb;
            // dd($data['thumb']);
        }
        // dd($data);
        if (DB::table('lb_img')->where('id','=',$id)->update($data)) {
            return redirect('/adminimg')->with('success','修改成功!');
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
        // 删除
        if(DB::table('lb_img')->where('id','=',$id)->delete()){
            return redirect('/adminimg')->with('success','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }
}
