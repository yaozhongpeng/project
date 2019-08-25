@extends('Home.HomePublic.homepublic')
@section('home')
<div class="m0">
<div class="m">
<div class="im0">
<div class="im0l">
<ul>
@foreach($cates as $k=>$v)
@if($k < 16)
<li class="cate-{{$k}}"><i>&gt;</i>
<a href="/goods/list/{{$v->id}}" target="_blank"><strong>{{$v->name}}</strong></a> 
<div>
	@foreach($v->suv as $k1=>$v1)
	<dl>
	<dt><a href="/goods/list/{{$v1->id}}" target="_blank"><b>{{$v1->name}}</b></a></dt>
		<dd>
			@foreach($v1->suv as $k2=>$v2)
			@if($k2>0)<em>|</em>@endif <a href="/goods/list/{{$v2->id}}">{{$v2->name}}</a>
			@endforeach
		</dd>
	</dl>
	@endforeach
</div>
</li>
@endif
@endforeach
</ul>
</div>
<div class="im0m">
<div><script type="text/javascript" src="/static/homeSkin/js/slide.js"></script><div id="slide_a14" class="slide" style="width:660px;height:300px;">
<a href="" target="_blank"><img src="/static/homeSkin/picture/player_1.jpg" width="660" height="300" alt=""/></a>
<a href="" target="_blank"><img src="/static/homeSkin/picture/player_2.jpg" width="660" height="300" alt=""/></a>
</div>
<script type="text/javascript">new dslide('slide_a14');</script>
</div>
<div class="im0mall">
<div id="itrade">
<div class="tab-head">
<ul id="trade-h">
<li id="trade-h-1" onmouseover="Tb(this);" class="on"><span>推荐</span></li>
<li id="trade-h-2" onmouseover="Tb(this);"><span>上新</span></li>
<li id="trade-h-3" onmouseover="Tb(this);"><span>人气</span></li>
<li id="trade-h-4" onmouseover="Tb(this);"><span>热销</span></li>
<li id="trade-h-5" onmouseover="Tb(this);"><span>热评</span></li>
</ul>
</div>
<div id="trade-b-1" class="im0t-mall" style="display:;"></div>
<div id="trade-b-2" class="im0t-mall" style="display:none;"><div>
<a href="http://localhost/dt/mall/show.php?itemid=1" target="_blank"><img src="/static/homeSkin/picture/162707571.jpg.thumb.jpg" width="100" height="100" alt=""/></a>
<b>￥1.00</b>
<p><a href="http://localhost/dt/mall/show.php?itemid=1" title="「2019爆款」55寸超薄电视" target="_blank">「2019爆款」55寸超薄电视</a></p>
</div>
</div>
<div id="trade-b-3" class="im0t-mall" style="display:none;"><div>
<a href="http://localhost/dt/mall/show.php?itemid=1" target="_blank"><img src="/static/homeSkin/picture/162707571.jpg.thumb.jpg" width="100" height="100" alt=""/></a>
<b>￥1.00</b>
<p><a href="http://localhost/dt/mall/show.php?itemid=1" title="「2019爆款」55寸超薄电视" target="_blank">「2019爆款」55寸超薄电视</a></p>
</div>
</div>
<div id="trade-b-4" class="im0t-mall" style="display:none;"><div>
<a href="http://localhost/dt/mall/show.php?itemid=1" target="_blank"><img src="/static/homeSkin/picture/162707571.jpg.thumb.jpg" width="100" height="100" alt=""/></a>
<b>￥1.00</b>
<p><a href="http://localhost/dt/mall/show.php?itemid=1" title="「2019爆款」55寸超薄电视" target="_blank">「2019爆款」55寸超薄电视</a></p>
</div>
</div>
<div id="trade-b-5" class="im0t-mall" style="display:none;"><div>
<a href="http://localhost/dt/mall/show.php?itemid=1" target="_blank"><img src="/static/homeSkin/picture/162707571.jpg.thumb.jpg" width="100" height="100" alt=""/></a>
<b>￥1.00</b>
<p><a href="http://localhost/dt/mall/show.php?itemid=1" title="「2019爆款」55寸超薄电视" target="_blank">「2019爆款」55寸超薄电视</a></p>
</div>
</div>
</div>
</div>
</div>
<div class="im0r">
<div class="im0u">
<div class="user-info" style="background:#FFFFFF;">
<script type="text/javascript">
var destoon_uname = get_cookie('username');
document.write('<a href="http://localhost/dt/member/avatar.php"><img src="'+DTPath+'api/avatar/show.php?size=large&reload=1564974363&username='+destoon_uname+'"/></a>');
document.write('<ul>');
if(get_cookie('auth')) {
document.write('<li><em><a href="http://localhost/dt/member/logout.php">退出</a></em><a href="http://localhost/dt/member/"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
if(destoon_uname) {
document.write('<li><em><a href="http://localhost/dt/member/login.php">登录</a></em><a href="http://localhost/dt/member/"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
document.write('<li><em><a href="http://localhost/dt/member/register.php">注册</a></em><a href="http://localhost/dt/member/login.php"><strong>Hi,请登录</strong></a></li>');
}
}
document.write('<li><a href="http://localhost/dt/member/my.php?mid=16&action=add" class="b">会员中心</a><i>|</i><a href="http://localhost/dt/member/my.php?mid=16" class="b">我的订单</a><i>|</i><a href="http://localhost/dt/member/my.php?mid=16&job=answer" class="b">商户后台</a></li>');
document.write('</ul>');
</script>
</div>
<div>
<div class="ian-h">
<ul id="ian-h">
<li id="ian-h-1" onmouseover="Tb(this);" class="on"><a href="http://localhost/dt/announce/" target="_blank"><span>网站动态</span></a></li>
</ul>
</div>
<div id="ian-b-1" class="ian-b" style="display:;">
<ul>
</ul>
</div>
</div>
<div class="im0g">
<a href="http://localhost/dt/member/cart.php" target="_blank"><div><em><script type="text/javascript">document.write(get_cart());</script></em><img src="/static/homeSkin/picture/grid-cart.png"/><br/>购物车</div></a>
<a href="http://localhost/dt/member/coupon.php" target="_blank"><div><img src="/static/homeSkin/picture/grid-coupon.png"/><br/>优惠券</div></a>
<a href="http://localhost/dt/member/favorite.php" target="_blank"><div><img src="/static/homeSkin/picture/grid-favorite.png"/><br/>商品关注</div></a>
<a href="http://localhost/dt/mall/view.php" target="_blank"><div><img src="/static/homeSkin/picture/grid-view.png"/><br/>浏览历史</div></a>
</div>
</div>
<div class="im0t">&nbsp;</div>
</div>
<div class="c_b"></div>
</div>
</div>
</div>
<div class="m">
<div class="b20"></div>
<div class="im-b im-b-mall">
<div class="im-l">
<a href="/goods/4"><p>家用电器</p></a>
<ul>
<li><a href="/goods/list/5" target="_blank">电视</a></li>
<li><a href="/goods/list/6" target="_blank">空调</a></li>
<li><a href="/goods/list/7" target="_blank">洗衣机</a></li>
<li><a href="/goods/list/8" target="_blank">冰箱</a></li>
<li><a href="/goods/list/9" target="_blank">厨卫大电</a></li>
<li><a href="/goods/list/10" target="_blank">厨房小电</a></li>
<li><a href="/goods/list/11" target="_blank">生活电器</a></li>
<li><a href="/goods/list/12" target="_blank">个护健康</a></li>
<li><a href="/goods/list/13" target="_blank">视听影音</a></li>
</ul>
</div>
<div class="im-r im-r-mall">
	@foreach($goods as $k=>$g)
	<div>
	<a href="http://localhost/dt/mall/show.php?itemid=2" target="_blank"><img src="{{$g->pic}}" width="134" height="134" alt=""/></a>
	<b>{{$g->price}}</b>
	<p><a href="http://localhost/dt/mall/show.php?itemid=2" title="超薄电视2" target="_blank">{{$g->name}}</a></p>
	</div>
	@endforeach
</div>
</div>
</div>
</div>
<script type="text/javascript" src="/static/homeSkin/js/index.js"></script>
@endsection 
@section('title','商品首页')