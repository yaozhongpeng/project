<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 购物车首页
        $cart = session('cart'); // 获取 session
        // dd($cart);
        $tot = ""; //总金额
        $sum = 0;  //总件数
        $data1=array();
        if(count($cart)){
            foreach ($cart as $k => $v) {
                $good = DB::table('goods')->where('id',$v['id'])->first();
                $data['id']    = $v['id'];           // id
                $data['number']= $v['number'];       // 购买数量
                $data['name']  = $good->name;        // name
                $data['pic']   = $good->pic;         // pic
                $data['price'] = $good->price;       // price
                $data['num'] = $good->num;           // 库存
                $sum += $data['number'];                // 总件数
                $tot += $data['number']*$data['price']; // 总金额
                $data1[] = $data;
            }
        }
        // dd($data1);
        return view('Home.Cart.index',['data'=>$data1,'sum'=>$sum,'tot'=>$tot]);
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

    // 购物车去重操作 $id 当前要购买的商品id
    public function checkExists($id){
        // 获取购物车的数据
        $goods = session('cart');
        // 判断购物车里有没有数据
        if(empty($goods)) return false;
        // 遍历
        foreach($goods as $k=>$v){
            if($v['id'] == $id){
                // 购物车里有当前要购买的商品数据
                return true;
            }
        }
    }

    // 商品详情页加入购物车
    public function store(Request $request)
    {
        // 商品加入购物车
        // dd($request->all());
        $data = $request->except(['_token']);
        // dd($data);
        if(!$this->checkExists($data['id'])){
            $request->session()->push('cart',$data);
        }
        return redirect('/cart');
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
        // 单个删除购物车商品
        // echo $id;die;
        $cart = session('cart');
        // 遍历
        foreach($cart as $k=>$v){
            if($v['id'] == $id){
                // echo $id;
                // 删除当前商品数据
                unset($cart[$k]);
            }
        }
        // 给 session 重新赋值
        session(['cart'=>$cart]);
        return redirect('/cart');
    }

    // 清空购物车
    public function delall(Request $request)
    {
        $request->session()->pull('cart');
        return redirect('/cart');
    }

    // number 减
    public function cartdown(Request $request)
    {
        $id = $request->input('id');
        $info = DB::table('goods')->where('id','=',$id)->first();
        // echo $id;
        // 获取session数据
        $data = session('cart');
        //遍历
        foreach($data as $k=>$v){
            // 判断
            if($v['id'] == $id){
                // 数量减 1
                $data[$k]['number'] -= 1;
                if($data[$k]['number'] <= 1){
                    $data[$k]['number'] = 1;
                }

                session(['cart'=>$data]);
                // echo $data[$k]['number'];
                $data1['number'] = $data[$k]['number'];
                $data1['tot'] = $data[$k]['number'] * $info->price;
                echo json_encode($data1);
            }
        }
    }

    // number 加
    public function cartup(Request $request){
        $id = $request->input('id');
        $info = DB::table('goods')->where('id','=',$id)->first();
        // echo $id;
        $data = session('cart');
        // 遍历
        foreach($data as $k=>$v){
            if($v['id'] == $id){
                // 数量加一
                $data[$k]['number'] += 1;
                $data[$k]['num'] -= 1;
                if($data[$k]['number'] >= $info->num){
                    $data[$k]['number'] = $info->num;
                 }

                if($data[$k]['num'] <= 0){
                     $data[$k]['num'] = 0;
                }
                session(['cart'=>$data]);
                $data1['number'] = $data[$k]['number'];
                $data1['num'] = $data[$k]['num'];
                $data1['tot']=$data[$k]['number'] * $info->price;
                echo json_encode($data1);
            }
        }
    }

    // 勾选商品后,计算总件数和总金额
    public function carttot()
    {
        if(isset($_GET['arr'])){
        // 总计价格
        $sum=0;
        // 总件数
        $nums=0;
        // 遍历 $value1 选中数据 id
        foreach($_GET['arr'] as $value1){
            // 获取购物车的 session 数据
            $data=session("cart");
            // 遍历
            foreach($data as $key=>$value){
                // 判断
                if($value['id'] == $value1){
                    // 获取单价和数量
                    $num = $data[$key]['number'];
                    // 获取商品数据
                    $info = DB::table("goods")->where("id","=",$value1)->first();
                    $price = $info->price;
                    $tot = $num * $price;
                    $sum += $tot;
                    $nums += $num;
                }
            }
        }
        $data2['nums'] = $nums;
        $data2['sum'] = $sum;
        echo json_encode($data2);
        }else{
           // 给总计和总件数赋值为0
           $data2['nums']=0;
           $data2['sum']=0;
           echo json_encode($data2); 
        }
    }
}
