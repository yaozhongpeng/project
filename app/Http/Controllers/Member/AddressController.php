<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 收货地址列表
        $id = session('user_id');
        // echo $id;die;
        $address = DB::table('address')->where('user_id','=',$id)->get();
        // dd($address);
        // var_dump($address);die;
        return view('Member.Address.index',['address'=>$address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Member.Address.add');
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
        $data['user_id'] = session('user_id');
        // dd($data);
        if(DB::table('address')->insert($data)){
            return redirect('/myaddress')->with('success','添加地址成功');
        }else{
            return back()->with('error','添加地址失败');
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
        // $city = DB::table('district')->where('upid','=',0)->get();
        $address = DB::table('address')->where('id','=',$id)->first();
        return view('Member.Address.edit',['address'=>$address]);
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
        $data['user_id'] = session('user_id');
        // dd($data);
        if(DB::table('address')->where('id','=',$id)->update($data)){
            return redirect('/myaddress')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        // echo $id;die;
        // 删除
        if(DB::table('address')->where('id','=',$id)->delete()){
            return redirect('/myaddress')->with('success','删除成功!');
        }
        return back()->with('error','删除失败!');
    }
}
