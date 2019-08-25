<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User; // 导入模型类
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 会员中心首页
        // return view('Home.Member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        // 会员中心修改资料
        // echo $id; // die;
        $user_info = DB::table('user_info')->where('user_id','=',$id)->first();
        return view('Home.Member.edit',['user_info'=>$user_info]);
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
        if (DB::table('user_info')->where('user_id','=',$id)->update($data)) {
            echo '修改成功';
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
        //
    }

    public function member($id)
    {
        // 会员中心首页
        // echo $id;die;
        $user = User::where('email','=',$id)->first();
        return view('Home.Member.index',['user'=>$user]);
    }

    // 会员详情
    public function memberinfo($id){
        // echo $id;die;
        $info = User::find($id)->info;
        // dd($info);
        return view('Home.Member.info',['info'=>$info]);
    }

    // 会员收货地址
    public function memberaddress($id){
        // echo $id;
        $address = User::find($id)->address;
        // dd($address);
        return view('Home.Member.address',['address'=>$address,'id'=>$id]);
    }
}
