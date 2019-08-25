<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 订单列表
    public function index()
    {
        $id = session('user_id');
        // echo $id;die;
        // 全部订单
        $orders = DB::table('orders')->where('user_id','=',$id)->get();
        // dd($orders);
        foreach ($orders as $key => $value) {
            // $order_goods[] = DB::table('order_goods')->where('order_id','=',$value->id)->get();
            $order_goods[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // dd($order_goods);
        // 待付款
        $order0 = DB::table('orders')->where('user_id','=',$id)->where('status','=',0)->get();
        // dd($order0);
        // 待评价
        $order3 = DB::table('orders')->where('user_id','=',$id)->where('status','=',3)->get();
        // 待收货
        $order4 = DB::table('orders')->where('user_id','=',$id)->where('status','=',4)->get();
        // dd($orders);
        // var_dump($orders);die;
        return view('Member.Order.index',[
            'orders'=>$orders,
            'order0'=>$order0,
            'order3'=>$order3,
            'order4'=>$order4,
            'order_goods'=>$order_goods
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
}
