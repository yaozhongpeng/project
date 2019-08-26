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
        // --------------------------------end--------------------------------
        $orders = DB::table('orders')->where('user_id','=',$id)->get();
        // dd($orders);
        foreach ($orders as $key => $value) {
            $order_goods[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get(); 
            //-----------------------------------
            // $order_goods[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            // ->select('orders.id as oid','order_goods.id as ogid','order_goods.order_id as ogoid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            // ->where('order_goods.order_id','=',$value->id)->get();    
        }

        // foreach ($order_goods as $k => $v) {
        //     foreach ( $v as $i) {
        //      $goods[] = DB::table('order_goods')->join('goods','order_goods.goods_id','=','goods.id')
        //     ->select('goods.price','goods.pic')
        //     ->where('goods.id','=',$i->goods_id)->first();
        //     }
        // }
        // --------------------------------end--------------------------------
        // dd($orders);
        // dd($order_goods);
        // dd($goods);

        // -------------------------------start-------------------------------
        $order0 = DB::table('orders')->where('user_id','=',$id)->where('status','=',0)->get();
        // dd($order0);
        foreach ($order0 as $key => $value) {
            $order_goods0[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // dd($order_goods0);
        // --------------------------------end--------------------------------

        // 已付款
        // -------------------------------start-------------------------------
        $order2 = DB::table('orders')->where('user_id','=',$id)->where('status','=',2)->get();
        foreach ($order2 as $key => $value) {
            $order_goods2[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // --------------------------------end--------------------------------

        // 待收货
        // -------------------------------start-------------------------------
        $order3 = DB::table('orders')->where('user_id','=',$id)->where('status','=',3)->get();
        foreach ($order3 as $key => $value) {
            $order_goods3[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // --------------------------------end--------------------------------

        // 待评价
        // -------------------------------start-------------------------------
        $order4 = DB::table('orders')->where('user_id','=',$id)->where('status','=',4)->get();
        foreach ($order4 as $key => $value) {
            $order_goods4[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // --------------------------------end--------------------------------

        // 已完成
        // -------------------------------start-------------------------------
        $order5 = DB::table('orders')->where('user_id','=',$id)->where('status','=',5)->get();
        foreach ($order5 as $key => $value) {
            $order_goods5[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // --------------------------------end--------------------------------

        // 售后中
        // -------------------------------start-------------------------------
        $order6 = DB::table('orders')->where('user_id','=',$id)->where('status','=',6)->get();
        foreach ($order6 as $key => $value) {
            $order_goods6[] = DB::table('order_goods')->join('orders','order_goods.order_id','=','orders.id')
            ->select('orders.id as oid','order_goods.id as gid','order_goods.order_id as ogid','order_goods.goods_id','order_goods.goods_name','order_goods.num','order_goods.pic')
            ->where('order_goods.order_id','=',$value->id)->get();    
        }
        // --------------------------------end--------------------------------
        // dd($orders);
        // var_dump($orders);die;
        return view('Member.Order.index',[
            'orders'=>$orders,
            'order0'=>$order0,
            'order2'=>$order2,
            'order3'=>$order3,
            'order4'=>$order4,
            'order5'=>$order5,
            'order6'=>$order6,
            'order_goods'=>$order_goods,
            'order_goods0'=>$order_goods0,
            'order_goods2'=>$order_goods2,
            'order_goods3'=>$order_goods3,
            'order_goods4'=>$order_goods4,
            'order_goods5'=>$order_goods5,
            'order_goods6'=>$order_goods6
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
