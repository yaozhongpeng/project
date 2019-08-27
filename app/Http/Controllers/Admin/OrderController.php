<?php
// 后台订单管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Order; // 导入模型类

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 后台订单列表
        $orders = Order::paginate(10);
        // $res = DB::table('orders')->where('id','=',7)->first();
        // dd($res->status);
        return view('Admin.Order.index',['orders'=>$orders]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 修改订单
        // 获取修改数据
        // $status = $this->getStatusAttribute();
        // $order = new order();
        // $status = $order->getStatusAttribute();
        // dd($status);
        $data = DB::table('orders')->where('id','=',$id)->first();
        return view('Admin.Order.edit',['data'=>$data]);
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
        // dd($request->all());
        // echo $id;die;
        // 获取修改数据
        $data = $request->except(['_token','_method']);
        // dd($data);
        if(DB::table('orders')->where('id','=',$id)->update($data)){
            return redirect('/adminorder')->with('success','修改订单成功');
        }else{
            return back()->with('error','修改订单失败');
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
        // 删除订单
        if (DB::table('orders')->where('id','=',$id)->delete()) {
            return redirect('/adminorder')->with('success','删除订单成功!');
        }
        return redirect('/adminorder')->with('error','删除订单失败!');
    }

    // 订单详情
    public function orderinfo($id)
    {
        // echo $id;die;
        $orderinfo = Order::find($id)->info;
        // dd($orderinfo);
        return view('Admin.Order.info',['orderinfo'=>$orderinfo]);
    }

    // 该订单状态 status
    public function adminstatus(Request $request)
    {

        $id = $request->input('id');
        $op = $request->input('op');
        $data['status'] = $op;

        $d = DB::table('orders')->where('id','=',$id)->update($data);

        $res = DB::table('orders')->where('id','=',$id)->first();

        if ($res->status == $op) {
            echo $op;
        } 
    }
}
