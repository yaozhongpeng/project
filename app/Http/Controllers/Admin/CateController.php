<?php
// 后台分类管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; // 导入 DB 类

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 分类首页
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
            $pageSize = 5;
        }else{
            $pageSize = $request->input('pageSize');
        }

        // 分类数据
        // $cate = DB::table('cates')->get();
        // 调整类别顺序
        $cate = DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->where($kw_type,"like","%".$kw."%")->paginate($pageSize);
        // 遍历
        foreach($cate as $k=>$v){
            // echo $v->path,'<br>';
            $arr = explode(',',$v->path); // 字符串转换成数组
            $len = count($arr)-1; // 根据数组长度获取逗号个数
            $cate[$k]->name = str_repeat('|--',$len).$v->name; // 根据逗号个数拼接字符串,给name字段重新赋值
        }
        return view('Admin.Cate.index',['cate'=>$cate,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid=0)
    {
        // 添加分类
        // 获取分类数据
        // $cate = DB::table('cates')->get();
        // 获取选中id
        $cates = self::getCates();
        // $c = $this->getCatesAjax($pid);
        return view('Admin.Cate.add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加
        // dd($request->all());
        $data = $request->except(['_token']);
        // 获取 pid
        $pid = $request->input('pid');
        if($pid==0){
            // 添加的是顶级分类
            $data['path'] = '0';
            // dd($data);
        }else{
            // dd($data);
            // 添加子类
            // 拼接 path=> 父类 path 和父类 id 拼接成字段
            // 获取父类信息
            $info = DB::table('cates')->where('id','=',$pid)->first();
            $data['path'] = $info->path.','.$info->id;
            // dd($data);
        }
        if(DB::table('cates')->insert($data)){
            // echo 'ok';
            return redirect('/admincate/create')->with('success',"添加分类成功");
        }else{
            // echo 'error';
            return back()->with('error','添加分类失败');
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
        // 分类修改
        $cate = self::getCates();
        $c = DB::table('cates')->where('id','=',$id)->first();
        return view('Admin.Cate.edit',['cate'=>$cate,'c'=>$c]);
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
        // 更新数据
        // echo $id;die;
        // 获取修改数据
        $data = $request->except(['_token','_method']);
        // dd($data);
        if ($request->pid == 0) {
            return redirect('/admincate')->with('error','修改顶级分类请联系管理员!');
        }

        if(DB::table('cates')->where('id','=',$id)->update($data)){
            return redirect('/admincate')->with('success','修改分类成功');
        }else{
            return redirect('/admincate')->with('error','修改分类失败');
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
        // 删除分类
        // 判断当前分类是否有子类
        // 获取当前分类下的子类个数
        $s = DB::table('cates')->where('pid','=',$id)->count();
        // echo $s;
        if($s > 0){
            return redirect('/admincate')->with('error','需要先删除子分类!');
        }

        // 删除分类
        if(DB::table('cates')->where('id','=',$id)->delete()){
            return redirect('/admincate')->with('success','删除分类成功');
        }else{
            return redirect('/admincate')->with('error','删除分类失败');
        }
    }

    // 获取分类方法,变为静态方法,后台添加商品调用
    public static function getCates(){
        $cate = DB::table('cates')->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy('paths')->get();
        // 遍历
        foreach($cate as $k => $v){
            // echo $value->path,'<br>';
            // 把字符串转换为数组
            $arr = explode(',',$v->path);
            // var_dump($arr);
            // 获取逗号个数
            $len = count($arr)-1;
            // 重复字符串 str_repeat
            $cate[$k]->name=str_repeat('|--',$len).$v->name;
        }
        return $cate;
    }

    // ajax 获取分类方法,待完善...
    // public function getCatesAjax($pid=0){
    //     $c = DB::table('cates')->where('pid','=',$pid)->get();
    //     // $c = json_encode($c);
    //     return $c;
    // }
}
