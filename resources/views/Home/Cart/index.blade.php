@extends('Home.HomePublic.homepublic')
@section('home')
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/cart.css"/>
<div class="b20"></div>
<div class="m">
<div class="nav">
  <div>
    <a href="" onclick="return confirm('确定要吗？');" class="b">Hello</a></div><a href="/homeindex">首页</a> <i>&gt;</i> <a href="/goods">商城</a> <i>&gt;</i> <a href="/cart">购物车</a>
  </div>
  <!-- <form action="" method="post"> -->
    <table cellpadding="16" cellspacing="0" class="tb">
    <tr>
      <th width="20"><input type="checkbox" id="check-all"/></th>
      <th width="50">图片</th>
      <th>商品</th>
      <th width="60">库存</th>
      <th width="60">单价</th>
      <th width="100">数量</th>
      <th width="100">小计</th>
      <th width="60">删除</th>
    </tr>
    @if(count($data))
    @foreach($data as $k=>$v)
     <tr align="center">
      <td>
        <input type="checkbox" id="check_{{$v['id']}}" name="items" value="{{$v['id']}}"/>
      </td>
      <td><a href="/goods/show/{{$v['id']}}" target="_blank"><img src="{{$v['pic']}}" width="50"/></a></td>
      <td align="left" style="line-height:24px;color:#666;">
        <a href="/goods/show/{{$v['id']}}" target="_blank" class="b">{{$v['name']}}</a><br/>
        留言:暂无
      </td>
      <td><span id="num_{{$v['id']}}">{{$v['num']}}</span></td>

      <td>
        <span class="f_b" id="price_{{$v['id']}}">{{$v['price']}}</span>
       </td>

      <td>
        <a href="javascript:void(0)" onclick="down({{$v['id']}})">-</a>
         <input type="text" value="{{$v['number']}}" id="number_{{$v['id']}}" size="3" class="cc_inp" />
        <a href="javascript:void(0)" onclick="up({{$v['id']}})">+</a>
      </td>

      <td>
        <span class="f_price" id="tot_{{$v['id']}}" total-admin="1">{{$v['number']*$v['price']}}</span>
      </td> <!-- 小计 -->
      <td class="c_p">
          <form action="/cart/{{$v['id']}}" method="post">
            {{method_field("DELETE")}}
            {{csrf_field()}}
            <input type="submit" onclick="return confirm('确定删除该商品吗?')"; value="删除">
          </form>
      </td>
    </tr>
    @endforeach
    @else
    <b style="font-size: 40px;color:red;">):你还没有选择任何商品哦</b>
    @endif
    </table>
    <div class="cart-foot">
      <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td>
            <a href="javascript:;" onclick="move_muti();">删除选中</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/delall" onclick="return confirm('确定要清空购物车吗？');">清空购物车</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/homeindex">继续购物</a>
          </td>
          <td><p>已选商品 <span class="f_red f_b px16" id="total_goods">0</span> 件&nbsp;&nbsp;&nbsp;&nbsp;合计： <span class="f_red f_b px16" id="total_money">0</span> 元</p></td>
          <td width="96">{{csrf_field()}}
            <input type="submit" id="jiesuan" value="结算"/>
          </td>
        </tr>
      </table>
    </div>
  <!-- </form> -->
</div>
<div class="b20"></div>
<script type="text/javascript">
  // alert($);
  // number 减
  function down(id){
    // alert(id);
    $.get('/cartdown',{id:id},function(data){
      // alert(data);
      // alert(data.number);
      // alert(data.tot);
      $('#number_'+id).val(data.number); // 购买数量 -
      $('#tot_'+id).html(data.tot);      // 小计金额 -
    },'json');
  }
  // number 加
  function up(id){
    // alert(id);
    $.get('/cartup',{id:id},function(data){
      // alert(data);
      // alert(data.number);
      // alert(data.tot);
      $('#number_'+id).val(data.number); // 购买数量 +
      $('#tot_'+id).html(data.tot);      // 小计金额 +
      // $('#num_'+id).html(data.num);      // 库存     -
    },'json');
  }

  // 选择要购买的商品
  arr = [];
  $("input:checkbox[name='items']").change(function(){
    // alert('sss');
    // 判断
    // alert(typeof($(this).attr("checked")));
    if($(this).prop("checked")){
      id = $(this).val();
      // alert(id);
      // 把勾选的商品id 添加到arr数组里
      arr.push(id);
    }else{
      // 获取没有选中的id
      id1 = $(this).val();
      // alert(id1);
      // 删除没有选中的商品id
      // 找到元素的索引
      Array.prototype.indexOf = function(val) {
        for (var i = 0; i < this.length; i++) {
        if (this[i] == val) return i;
        }
        return -1;
      }
      // 通过元素的索引 利用js固有的函数删除元素
      Array.prototype.remove = function(val) {
        var index = this.indexOf(val);
        if (index > -1) {
        this.splice(index, 1);
        }
      }
      // 移除
      arr.remove(id1);
    }
    // alert(arr);
    console.log(arr);

    // Ajax
    $.get("/carttot",{arr:arr},function(data){
      // alert(data);
      // 给总金额和总件数赋值
      $("#total_goods").html(data.nums);
      $("#total_money").html(data.sum);
    },'json'); 
  }); 

  // 结算
  $("#jiesuan").click(function(){
    if($("input:checkbox[name='items']").is(":checked")){
      // 跳转
      // alert('结算');
      $.get("/jiesuan",{arr:arr},function(data){
        // alert(data);
        if(data){
          // 直接跳转到结算界面
          window.location="/homeorder/insert";
        }
      },'json');
    }else{
      alert("没有选中商品");
    }
  });

</script>
@endsection 
@section('title','购物车')