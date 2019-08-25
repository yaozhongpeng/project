@extends('Home.HomePublic.homepublic')
@section('home')
<script type="text/javascript">var module_id= 16,item_id=1,content_id='content',img_max_width=1000;</script>
<div class="m">
<div class="b20"></div>
<div class="nav"><div><img src="/static/homeSkin/picture/ico-like.png" class="share" title="加入收藏" onclick="SendFav(16, 1);"/><img src="/static/homeSkin/picture/ico-share.png" class="share" title="分享好友" onclick="Dshare(16, 1);"/></div><a href="/homeindex">首页</a> <i>&gt;</i> <a href="/goods">商城</a> <i>&gt;</i> <a href="/goods/list/1">家用电器</a> <i>&gt;</i> <a href="/goods/list/19">电视</a> <i>&gt;</i> <a href="/goods/list/28">超薄电视</a></div>
<div class="b20 bd-t"></div>
</div>
<div class="m">
<!-- form start -->
<form action="/cart" method="post">
<table width="100%">
<tr>
<td valign="top">
<table width="100%">
<tr>
<td colspan="3"><h1 class="title_trade" id="title">{{$good->name}}</h1></td>
</tr>
<tr>
<td width="330" valign="top">
<div id="mid_pos"></div>
<div id="mid_div" onmouseover="SAlbum();" onmouseout="HAlbum();" onclick="PAlbum(Dd('mid_pic'));">
<img src="{{$good->pic}}" width="320" height="240" id="mid_pic"/><span id="zoomer"></span>
</div>
<div class="b10"></div>
<div>
<img src="{{$good->pic}}" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(0, '{{$good->pic}}');" class="ab_on" id="t_0"/><img src="/static/homeSkin/picture/nopic60.gif" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(1, 'http://localhost/dt/skin/default/image/nopic320.gif');" class="ab_im" id="t_1"/><img src="/static/homeSkin/picture/nopic60.gif" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(2, 'http://localhost/dt/skin/default/image/nopic320.gif');" class="ab_im" id="t_2"/></div>
<div class="b10"></div>
<div onclick="PAlbum(Dd('mid_pic'));" class="c_b t_c c_p"><img src="/static/homeSkin/picture/ico_zoom.gif" width="16" height="16" align="absmiddle"/> 点击图片查看原图</div>
<div class="b10"></div>
</td>
<td width="16">&nbsp;</td>
<td valign="top">
<div id="big_div" style="display:none;"><img src="" id="big_pic"/></div>

<table width="100%" cellpadding="5" cellspacing="5">
<tr>
<td>单价：</td>
<td class="f_price">￥<span class="px16">{{$good->price}}</span></td>
</tr>
<tr>
<td>品牌：</td>
<td>未填写</td>
</tr>
<tr>
<td>销量：</td>
<td><a href="#order" onclick="Mshow('order');" class="b">累计 <span class="f_orange">0</span> 件</a></td>
</tr>
<tr>
<td>评价：</td>
<td><a href="#comment" onclick="Mshow('comment');" class="b">已有 <span class="f_orange">0</span> 条评价</a></td>
</tr>
<tr>
<td>人气：</td>
<td>已有 <span class="f_orange"><span id="hits">3</span></span> 人关注</td>
</tr>
<tr>
<td width="50">更新：</td>
<td>2019-08-03</td>
</tr>
<tr>
<td>数量：</td>
<td class="f_gray">
	<img src="/static/homeSkin/picture/arrow_l.gif" width="16" height="8" alt="减少" class="c_p" onclick="Malter('-', 1, {{$good->num}});"/> 
	<input type="text" value="1" size="4" class="cc_inp" name="number" id="amount" onkeyup="Malter('', 1, {{$good->num}});"/> 
	<img src="/static/homeSkin/picture/arrow_r.gif" width="16" height="8" alt="增加" class="c_p" onclick="Malter('+', 1, {{$good->num}});"/>件 库存{{$good->num}}件
</td>
</tr>
<tr>
<td colspan="2">
<!-- <img src="/static/homeSkin/picture/btn_tobuy.gif" alt="立即购买" class="c_p" onclick="BuyNow();"/> -->
&nbsp;
<!-- <img src="/static/homeSkin/picture/btn_addcart.gif" alt="加入购物车" class="c_p" onclick="AddCart();"/> -->
<input type="hidden" name="num" value="{{$good->num}}">
<input type="hidden" name="id" value="{{$good->id}}">
<a href="/hide/create" class="b">收藏此宝贝</a>&nbsp;&nbsp;&nbsp;&nbsp;
{{csrf_field()}}
<button type="submit">加入购物车</button>
</td>
</tr>
</table>
</td>
</tr>
</table>
</form>
<!-- form end -->
</td>
<td width="16">&nbsp;</td>
<td width="300" valign="top">
<div class="contact_head">基本资料信息</div>
<div class="contact_body" id="contact"><ul>
<li class="f_b t_c" style="font-size:14px;"><a href="http://localhost/dt/company/guest.php" target="_blank"></a></li>
<li style="padding-top:3px;">
<span>联系人</span>&nbsp;
<a href="http://localhost/dt/member/chat.php?touser=admin&mid=16&itemid=1" target="_blank" rel="nofollow"><img src="static/picture/online.png.php" title="点击交谈/留言" alt="" align="absmiddle" onerror="this.src=DTPath+'file/image/web-off.gif';"/></a>&nbsp;&nbsp;&nbsp;<strong class="f_red">未注册</strong>
</li>
<li><span>地区</span>全国</li>
</li>
</ul>
</div>
</div>
</td>
</tr>
</table>
</div>
<div class="m">
<div class="b10">&nbsp;</div>
<div class="mall_tab">
<ul>
<li class="mall_tab_2" id="t_detail"><a href="#detail" onclick="Mshow('detail');">商品详情</a></li>
<li class="mall_tab_1" id="t_comment"><a href="#comment" onclick="Mshow('comment');">评价(0)</a></li>
<li class="mall_tab_1" id="t_order"><a href="#order" onclick="Mshow('order');">成交记录(0)</a></li>
</ul>
</div>
<div class="mall_c" style="display:;" id="c_detail">
<div class="content c_b" id="content">{!!$good->descr!!}<br type="_moz" /></div>
</div>
<div class="mall_c" style="display:none;" id="c_comment">
<table border="1">
<tr>
	<th>评论等级</th>	
	<th>买家ID</th>	
	<th>主题</th>	
	<th>详细评论</th>	
</tr>
@foreach($ping as $k=>$v)
<tr>
	<td>{{$v->p_level}}</td>	
	<td>{{$v->user_id}}</td>	
	<td>{{$v->subject}}</td>	
	<td>{!!$v->descr!!}</td>	
</tr>
@endforeach	
</table>
<center>1好评,2中评,3差评...</center>
</div>
<div class="mall_c" style="display:none;" id="c_order">
<center>正在载入交易记录...</center>
</div>
</div>
<script type="text/javascript" src="/static/homeSkin/js/album.js"></script>
<script type="text/javascript" src="/static/homeSkin/js/content.js"></script><script type="text/javascript">
// var mallurl = 'http://localhost/dt/mall/';
// var mallmid = 16;
// var mallid = 1;
// var n_c = 0;
// var n_o = 0;
// var c_c = Dd('c_comment').innerHTML;
// var c_o = Dd('c_order').innerHTML;
// var s_s = {'1':0,'2':0,'3':0};
// var m_l = {
// no_comment:'暂无评论',
// no_order:'暂无交易',
// no_goods:'商品不存在或已下架',
// no_self:'不能添加自己的商品',
// lastone:''
// };
</script>
<script type="text/javascript" src="/static/homeSkin/js/mall.js"></script>
<script type="text/javascript">
if(window.location.href.indexOf('#') != -1) {
var t = window.location.href.split('#');
try {Mshow(t[1]);} catch(e) {}
}
</script> 
@endsection 
@section('title',$good->name)