@extends('Home.HomePublic.homepublic')
@section('home')
<style>
  /*背景层*/
  #popLayer {
      display: none;
      background-color: #B3B3B3;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 10;
      -moz-opacity: 0.8;
      opacity:.70;
      filter: alpha(opacity=70);/* 只支持IE6、7、8、9 */
  }
  /*弹出层*/
  #popBox {
      display: none;
      background-color: #FFFFFF;
      z-index: 11;
      width: 400px;
      height: 350px;
      border:1px solid red;
      position:fixed;
      top:0;
      right:0;
      left:0;
      bottom:0;
      margin:auto;
  }
  #popBox .close{
      text-align: right;
      margin-right: 5px;
      background-color: #F8F8F8;
  } 
  /*关闭按钮*/
  #popBox .close a {
      text-decoration: none;
      color: #2D2C3B;
  }
  .add_sec{display:flex;}
  .add_box{background: rgba(0,100,255,0.7);width:70%;}
  .my_add_box{background: rgba(0,255,255,0.7);width:30%;}
  .add_ul{border:1px dashed red;}
</style>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/cart.css"/>
<div class="b20"></div>
<script type="text/javascript">var errimg = '/static/homeSkin/image/nopic50.gif';</script>
<div class="m">
<div class="nav">
<a href="/homeindex">首页</a> <i>&gt;</i> <a href="/goods">商城</a> <i>&gt;</i> 提交订单
</div>
<!-- <form> -->
<div class="b20 bd-t"></div>
<div>
<div class="f_r" style="padding:10px 0 0 0;"><a href="/cart" class="b">返回购物车</a></div>
<img src="/static/homeSkin/images/buy_1.gif" width="160" height="30"/> 
</div>
<div class="b20"></div>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th width="50">图片</th>
<th>商品</th>
<th width="60">库存</th>
<th width="60">单价</th>
<th width="100">数量</th>
<th width="90">快递</th>
<th width="80">运费</th>
<th width="100">小计</th>
</tr>
@if(count($d))
@foreach($d as $k=>$v)
<tr align="center">
<td><a href="/goods/show/{{$v['id']}}" target="_blank"><img src="{{$v['pic']}}" width="50" onerror="this.src=errimg;"/></a></td>
<td align="left" style="line-height:24px;color:#666666;">
<a href="/goods/show/{{$v['id']}}" target="_blank" class="b">{{$v['name']}}</a><br/>
<div style="padding:3px 0 3px 0;">备注：<input type="text" size="20" style="border:#CCCCCC 1px solid;" maxlength="100" title="限100字以内"/></div>
</td>
<td>1</td>
<td><span class="f_b">{{$v['price']}}</span></td>
<td>&nbsp;</td>
<td>
<select>
<option value="">联系卖家</option>
</select>
</td>
<td><span class="f_price" id="fee_16-2-0-0-0">0.00</span></td>
<td><span class="f_price" id="total_16-2-0-0-0" total-11="1">{{$v['num']*$v['price']}}</span></td>
</tr>
@endforeach
@else
<p>没有结算商品,请添加</p>
@endif
</table>
<div class="b20"></div>
<table cellpadding="10" cellspacing="0" width="100%" border="1">
<tr>
<td class="f_gray">提示：实际的运费可能因为收货地址的不同而有差异，具体以提交之后系统计算或与卖家协商为准</td>
<td class="t_r" width="300">共 <span class="f_red" id="total_good">2</span> 种商品，总价：</td>
<td class="t_r" width="100"><span id="total_price">{{$tot}}</span></td>
<td width="10"></td>
</tr>
<tr>
<td></td>
<td class="t_r">优惠：</td>
<td class="t_r"><span id="total_discount"></span></td>
<td></td>
</tr>
<tr>
<td></td>
<td class="t_r">实付：</td>
<td class="t_r"><span class="f_red f_b px16" id="total_amount"></span></td>
<td></td>
</tr>
<!-- 提交订单 start -->
<tr align="right">
  <td></td><td></td>
  <td>
  <form action="/order/create" method="post">
    <input type="hidden" name="address_id" value="">
    {{csrf_field()}}
    <input type="submit" value="提交订单"/>
  </form>  
  </td>
</tr>
<!-- 提交订单 end -->
</table>
<div class="b20"></div>
<div><img src="/static/homeSkin/images/buy_2.gif" width="160" height="30"/></div>
<section class="add_sec">
    <!-- address start -->
    <div class="add_box">
      @if(count($address))
      @foreach($address as $k=>$add)
        <ul class="add_ul" id="{{$add->id}}">
          <li>收件人:{{$add->name}}</li>
          <li>电话:  {{$add->phone}}</li>
          <li>地址:  {{$add->zhi}}</li>
        </ul>
      @endforeach
      @else
      <p>还没有收货地址,请添加</p>
      @endif
    </div>
    <!-- address end -->
    <!-- res start -->
    <div class="my_add_box">
      @if(count($address))
      @foreach($address as $k=>$add)
      @if($k == 0)
        <ul>
          收件人:<li id="user_name">{{$add->name}}</li>
          电话:  <li id="user_phone">{{$add->phone}}</li>
          地址:  <li id="user_zhi">{{$add->zhi}}</li>
        </ul>
      @endif
      @endforeach
      @else
      <p>还没有收货地址,请添加</p>
      @endif  
    </div>
    <!-- res end -->
</section>
<!-- 插入地址开始 -->
<!-- <form action="/addressinsert" method="post"> 
  <table cellpadding="16" cellspacing="0" class="tf">
  <tr>
  <td class="tl"><span class="f_red">*</span> 姓名：</td>
  <td><input type="text" id="user-name" name="name" placeholder="收货人" /></td>
   </tr>
  <tr>
  <td class="tl"><span class="f_red">*</span> 手机号码：</td>
  <td><input id="user-phone" placeholder="手机号必填" name="phone" type="text" /></td>
  </tr>
  <tr>
  <td class="tl"><span class="f_red">*</span> 所在城市：</td>
  <td>
    <select id="cid"> 
      <option value="" class="ss">-请选择-</option> 
    </select>
    <input type="hidden" name="city1" id="city1">
  </td>
   </tr>
  <tr>
  <td class="tl"><span class="f_red">*</span> 手机号码：</td>
  <td>
    <textarea class="" rows="3" id="user-intro" placeholder="详细地址" name="zhi"></textarea><small>100字以内写出你的详细地址...</small>
  </td>
  </tr>
  <tr>
  <td class="tl"> </td>
  <td>{{csrf_field()}}
    <input type="submit" id="buttonid1" value="提交">
  </td>
  </tr>
  </table>
</form>  -->
<!-- 插入地址结束 -->
<!-- </form> -->
<!-- 插入地址开始 -->
<!-- <form action="/addressinsert" method="post"> 
姓名<input type="text" id="user-name" name="name" placeholder="收货人" /><br> 
手机<input id="user-phone" placeholder="手机号必填" name="phone" type="text" /><br> 
城市<div id="add">
<select id="cid"> 
          <option value="" class="ss">-请选择-</option> 
       </select>
       </div> <br> 
地址<textarea rows="10" id="user-intro" placeholder="详细地址" name="zhi"></textarea>
       <small>50字以内详细地址</small> 
        <input type="hidden" name="city1" id="city1">
        <input type="submit" id="buttonid1" value="提交"><br> 
</form>  -->
<!-- 插入地址结束 -->
<!-- start -->
  <input type="button" name="popBox" value="新增地址" onclick="popBox()">
  <div id="popLayer"></div>
  <div id="popBox">
    <div class="close">
        <a href="javascript:void(0)" onclick="closeBox()">关闭</a>
    </div>
    <div class="content">
    <!-- 插入地址2开始 -->
      <form action="/addressinsert" method="post"> 
      <table>
        <tr>
          <td>姓名</td>
          <td><input type="text" id="user-name" name="name" placeholder="收货人" /></td>
        </tr>
        <tr>
          <td>电话</td>
          <td><input id="user-phone" placeholder="手机号必填" name="phone" type="text" /></td>
        </tr>
        <tr>
          <td>所在城市</td>
          <td>
            <select id="cid"> 
              <option value="" class="ss">-请选择-</option> 
            </select>
            <input type="hidden" name="city1" id="city1">
          </td>
        </tr>
        <tr>
          <td>详细地址</td>
          <td><textarea rows="3" id="user-intro" placeholder="详细地址" name="zhi"></textarea></td>
        </tr>
        <tr>
          <td>{{csrf_field()}}</td>
          <td><input type="submit" id="buttonid1" value="提交"></td>
        </tr>
      </table>
      </form> 
    <!-- 插入地址2结束 -->
    </div>
  </div>

<!-- end -->
</div>
<script>
  /*点击弹出按钮*/
  function popBox() {
      var popBox = document.getElementById("popBox");
      var popLayer = document.getElementById("popLayer");
      popBox.style.display = "block";
      popLayer.style.display = "block";
  }; 
  /*点击关闭按钮*/
  function closeBox() {
      var popBox = document.getElementById("popBox");
      var popLayer = document.getElementById("popLayer");
      popBox.style.display = "none";
      popLayer.style.display = "none";
  }
</script>
<script type="text/javascript">
// alert($);
  //第一级数据
    $.ajax({
      url:'/address',//url地址
      type:'get',//请求方式
      data:{upid:0},
      async:true,//异步处理
      dataType:'json',//返回响应数据类型
      //Ajax 响应成功匿名函数
      success:
      function(data){
        // alert(data);
        //遍历
        for(var i=0;i<data.length;i++){
          $(".ss").attr("disabled",true);
          // alert(data[i].name);
          //存储在option
          option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
          // alert(option);
          // 把带有数据的option内部插入到第一个select
          $("#cid").append(option);
        }
      },
      // Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });

    // 获取其他几级数据 
    // 事件委派 live(事件,事件处理器函数)
    $("select").live("change",function(){
      // 移除元素
      $(this).nextAll("select").remove();
      // alert($(this).val());
      o=$(this);
      // 获取子级的upid
      upid=$(this).val();
      // alert(upid);
      $.ajax({
      url:'/address',// url地址
      type:'get', // 请求方式
      data:{upid:upid},
      async:true, // 异步处理
      dataType:'json', // 返回响应数据类型
      // Ajax 响应成功匿名函数
      success:
      function(data){
        // 创建select
        select=$("<select></select>");
        // 内部插入option
        select.append('<option value="" class="mm">--请选择--</option>');
        // alert(data);
        // 判断
        if(data.length>0){
          // 遍历
          for(var i=0;i<data.length;i++){
            // alert(data[i].name);
            //存储在option
            option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            // alert(option);
            // 把带有数据的option内部插入到创建好的select
            select.append(option);
          }
          //把创建好的select 追加到前一个select后
          o.after(select);
          //禁用其他级别 请选择
          $(".mm").attr("disabled",true);
        }

      },
      //Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });
    });

    //获取选中的数据
    $('#buttonid1').click(function(){
    //alert(1);
    arr = [];
    $('#add').children('select').each(function(){
      //获取选中的数据
      sm= $(this).find('option:selected').val();
      // sm= $(this).find('option:selected').html();
      // alert(sm);
      arr.push(sm);
    })
    // alert(arr);
    //把数据赋值给隐藏域进行提交
    $('#city1').val(arr);
  });

  //切换收货地址
  $('.add_ul').click(function(){
    // 获取 id
    address_id = $(this).attr("id");
    // alert(address_id);
    // $(this).css('background','green');
    // 赋值给隐藏域,提交订单使用
    $("input[name='address_id']").val(address_id);
    // ajax
    $.get('/choose',{address_id:address_id},function(data){
      // alert(data);
      $('#user_zhi').html(data.zhi);
      $('#user_name').html(data.name);
      $('#user_phone').html(data.phone);
      $('.my_add_box').css('background-color','rgba(0,255,100,0.7)');
    },'json');
  });

  // 第一个$k==0 赋值给默认提交地址
  // $('#tijiao_add').vall($('#morenadd_id').vall());
</script>
@endsection 
@section('title','结算页')