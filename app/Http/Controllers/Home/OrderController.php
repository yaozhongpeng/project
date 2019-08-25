<?php

namespace App\Http\Controllers\Home;

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
    // 把勾选商品存储到 session 结算页做遍历
    public function jiesuan(Request $request)
    {
        // 
        $arr = $_GET['arr'];
        $data = array();
        foreach($arr as $key=>$value){
            //获取购物车的session
            $cart = session("cart");
            //遍历
            foreach($cart as $k=>$v){
                // 判断
                if($value == $v['id']){
                    // 把勾选的数量和id存储在$data 数组里
                    $data[$k]['number'] = $cart[$k]['number'];
                    $data[$k]['id'] = $value;
                }
            }
        }
        // 把每勾选一条数据存储在 session 里
        $request->session()->push('goods',$data);
        echo json_encode($data);
    }

    public function insert()
    {
        // 结算视图
        // 获取勾选的商品 id num
        $goods = session("goods");
        $d = [];
        $tot = "";
        // 遍历
        foreach($goods[0] as $key=>$value ){
            //获取商品数据
            $shop = DB::table("goods")->where("id","=",$value['id'])->first();
            $temp['num'] = $value['number'];
            $temp['pic'] = $shop->pic;
            $temp['id'] = $shop->id;
            $temp['name'] = $shop->name;
            $temp['price'] = $shop->price;
            $tot += $value['number']*$shop->price;
            $d[] = $temp;
        }

        // 获取当前用户所有的收货地址
        $address = AddressController::alladdress(session('user_id'));

        return view('Home.Order.index',['d'=>$d,'tot'=> $tot,'address'=>$address]);
    }

    public function index()
    {
        //
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

    // 提交订单,orders,order_goods insert
    public function ordergoodsinsert(Request $request)
    {
        // dd($request->all());
        // 封装订单表数据
        $data = $request->except(['_token']);
        $data['order_num'] = time() + rand(1,10000); // 订单号
        $data['user_id'] = session('user_id');       // 提交订单的用户id
        // dd($data);
        // 订单表入库,同时获取订单 id 作为 order_goods 表的 order_id
        $order_id = DB::table('orders')->insertGetId($data);

        if($order_id){
            // 获取购买商品数据
            $goods = session('goods');
            // dd($goods);
            $d = [];
            $tot =""; // 下单总计金额
            //遍历
            foreach($goods[0] as $key=>$value){
                // 封装购买商品数据
                $info=DB::table('goods')->where('id','=',$value['id'])->first();
                $ogdata['order_id']   = $order_id;       // 订单id
                $ogdata['goods_id']   = $value['id'];    // 商品id
                $ogdata['goods_name'] = $info->name;     // 商品名字
                $ogdata['num']        = $value['number'];// 商品数量
                $ogdata['pic']        = $info->pic;      // 商品图片
                $tot += $ogdata['num']*$info->price;     // 总金额
                $d[] = $ogdata;                          // 订单详情数据
            }
            // dd($d);
            // 订单详情数据入库
            $res = DB::table('order_goods')->insert($d);
            if ($res) {
                // echo '下单成功';
                // 订单信息,存储到 session
                session(['order_id'=>$order_id]);// 订单id 
                session(['address_id'=>$data['address_id']]); // 地址 id
                session(['tot'=>$tot]); // 付款金额
                
                // 封装调用接口所需数据
                $out_trade_no = $data['order_num']; //订单号
                $subject      = 'paytest';          // 主题
                $total_fee    = '0.01';             // $tot
                $body         = 'buy goods';        // 描述

                // 调用支付宝接口
                pays($out_trade_no,$subject,$total_fee,$body);
            }
        }
    }

    // 支付完毕,跳转
    public function returnurl(Request $request){
        // 修改订单状态,未付款 已付款
        $order_id = session('order_id');
        $address_id = session('address_id');
        $tot = session('tot');
        $data['status'] = 2; // 2 已付款
        DB::table('orders')->where('id','=',$order_id)->update($data);
        // 获取选择的收货地址
        $address = DB::table('address')->where('id','=',$address_id)->first();
        // echo "支付成功";
        // 加载通知界面
        return view('Home.Order.success',['address'=>$address,'tot'=>$tot]);

        // 清除 session    
        $request->session()->pull('cart'); // 购物车
        $request->session()->pull('goods'); // 结算数据
    }
}
