@extends('Home.HomePublic.homepublic')
@section('home')
<div class="m0">
<div class="m">
<div class="im0">
<div class="im0l">
<ul>
@foreach($cate as $k=>$v)
@if($k < 15)
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
<li class="cate-0" style="background:rgba(255,0,0,0.7);color:#FFF;">查看全部分类&gt;&gt;</li>
</ul>
</div>
<div class="im0m">
<div><script type="text/javascript" src="/static/homeSkin/js/slide.js"></script><div id="slide_a14" class="slide" style="width:660px;height:300px;">
@foreach($imgs as $k=>$img)
<a href="/homeindex" target="_blank"><img src="{{$img->thumb}}" width="660" height="300" alt=""/></a>
@endforeach
</div>
<script type="text/javascript">new dslide('slide_a14');</script>
</div>
<div class="im0a">
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a1.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a3.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a4.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a5.jpg" width="116" height="212" alt=""/></a></div>
</div>
</div>
<div class="im0r">
<div class="im0u">
<div class="user-info" style="background:#FFFFFF;">
<img src="/static/homeSkin/images/default.jpg">
@if(session('email'))
	<li><a href="/member/{{session('email')}}"><strong>Hi,{{session('email')}}</strong></a> &nbsp;|&nbsp;
	<li><a href="/mb" class="b">会员中心</a><i>|</i><a href="/homelogin" class="b">发布宝贝</a><i>|</i><a href="/member" class="b">商户后台</a></li>
	<em><a href="/homelogout">退出</a></em></li>	
@else
	<li><em><a href="/homeregister/create">注册</a></em><a href="/homelogin/create"><strong>Hi!亲,请登录</strong></a></li>
	<li><a href="/homemember/" class="b">会员中心</a><i>|</i><a href="/homelogin" class="b">发布信息</a><i>|</i><a href="/homemember/" class="b">商户后台</a></li>
@endif
</div>
<div id="ian">
<div class="ian-h">
<ul id="ian-h">
<li id="ian-h-1" onmouseover="Tb(this);" class="on"><a href="/homearticle" target="_blank"><span>网站动态</span></a></li>
<li id="ian-h-2" onmouseover="Tb(this);"><a href="http://www.php217.com/dt/member/" target="_blank"><span>我是买家</span></a></li>
<li id="ian-h-3" onmouseover="Tb(this);"><a href="http://www.php217.com/dt/member/biz.php" target="_blank"><span>我是卖家</span></a></li>
</ul>
</div>
<div id="ian-b-1" class="ian-b" style="display:;">
<ul>
@foreach($article_top as $k=>$v)
<li><span class="f_r">&nbsp;0{{$k}}-0{{$k}}</span><a href="/homearticle/{{$v->id}}" target="_blank" title="{{$v->title}}">{{$v->title}}</a></li>
@endforeach
</ul>
</div>
<div id="ian-b-2" class="ian-b" style="display:none;">
<a href="http://www.php217.com/dt/sell/"><div>搜索产品</div></a>
<p>&gt;</p>
<a href="http://www.php217.com/dt/member/order.php" target="_blank"><div>我的订单</div></a>
<p>&gt;</p>
<a href="http://www.php217.com/dt/member/my.php?mid=6&action=add" target="_blank"><div>发布求购</div></a>
</div>
<div id="ian-b-3" class="ian-b" style="display:none;">
<a href="http://www.php217.com/dt/member/home.php" target="_blank"><div>完善商铺</div></a>
<p>&gt;</p>
<a href="http://www.php217.com/dt/member/my.php?mid=5&action=add" target="_blank"><div>发布产品</div></a>
<p>&gt;</p>
<a href="http://www.php217.com/dt/member/trade.php" target="_blank"><div>订单管理</div></a>
</div>
</div>
<div class="im0g">
<a href="http://www.php217.com/dt/" target="_blank"><div><em><script type="text/javascript">document.write(get_cart());</script></em><img src="/static/homeSkin/picture/grid-cart.png"/><br/>购物车</div></a><a href="http://www.php217.com/dt/member/grade.php" target="_blank"><div><img src="/static/homeSkin/picture/grid-vip.png"/><br/>付费会员</div></a>
<a href="http://www.php217.com/dt/spread/" target="_blank"><div><img src="/static/homeSkin/picture/grid-spread.png"/><br/>排名推广</div></a>
<a href="http://www.php217.com/dt/ad/" target="_blank"><div><img src="/static/homeSkin/picture/grid-ad.png"/><br/>广告投放</div></a><a href="http://www.php217.com/dt/gift/" target="_blank"><div><img src="/static/homeSkin/picture/grid-gift.png"/><br/>积分换礼</div></a><a href="http://www.php217.com/dt/sitemap/" target="_blank"><div><img src="/static/homeSkin/picture/grid-map.png"/><br/>网站地图</div></a>
<a href="http://www.php217.com/dt/api/" target="_blank"><div><img src="/static/homeSkin/picture/grid-mobile.png"/><br/>手机浏览</div></a></div>
</div>
<div class="im0t">
<div id="itrade">
<div class="tab-head">
<ul id="trade-h">
<li id="trade-h-4" onmouseover="Tb(this);" class="on"><a href="http://www.php217.com/dt/company/" target="_blank"><span>企业</span></a></li>
<li id="trade-h-6" onmouseover="Tb(this);"><a href="http://www.php217.com/dt/buy/" target="_blank"><span>求购</span></a></li><li id="trade-h-7" onmouseover="Tb(this);"><a href="http://www.php217.com/dt/quote/" target="_blank"><span>行情</span></a></li><li id="trade-h-21" onmouseover="Tb(this);"><a href="http://www.php217.com/dt/news/" target="_blank"><span>头条</span></a></li><li id="trade-h-18" onmouseover="Tb(this);"><a href="http://www.php217.com/dt/club/" target="_blank"><span>社区</span></a></li></ul>
</div>
<div id="trade-b-4" class="im0t-list" style="display:;">
<ul>
</ul>
</div>
<div id="trade-b-6" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
<div id="trade-b-7" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
<div id="trade-b-21" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
<div id="trade-b-18" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
</div>
</div>
</div>
<div class="c_b"></div>
</div>
</div>
</div>
<div class="m">
<div class="b10"></div>
<!-- small title start -->
<div class="head-txt">
	<span>
	 <a href="/goods">商城</a> &nbsp;|&nbsp; 
	 <a href="/quote">行情</a> &nbsp;|&nbsp; 
	 <a href="/company">商家</a>
	</span>
	<strong>平台爆款</strong>
</div>
<!-- small title end -->
<!-- block star -->
<div class="im-b im-b-mall">
<div class="im-l">
<a href="/goods"><p>热门分类</p></a>
<ul>
@foreach($cate as $k=>$v)
<li><a href="/goods/list/{{$v->id}}" target="_blank">{{$v->name}}</a></li>
@endforeach
</ul>
</div>
<!-- right statr -->
<div class="im-r im-r-mall">
	@foreach($goods as $g)
	<div>
		<a href="/goods/show/{{$g->id}}" target="_blank"><img src="{{$g->pic}}" alt="" width="134" height="134"></a>
		<b>￥{{$g->price}}</b>
		<p><a href="/goods/show/{{$g->id}}" target="_blank">{{$g->name}}</a></p>
	</div>
	@endforeach
</div>
<!-- right end -->
</div>
<!-- block end -->
@foreach($cate as $k=>$v)
<!-- small title start -->
<div class="head-txt">
	<span>
	@foreach($v->suv as $k1=>$v1)
	<a href="/goods/list/{{$v1->id}}">{{$v1->name}}</a> &nbsp;|&nbsp;
	@endforeach  
	<a href="/goods/list/{{$v->id}}">更多<i>&gt;</i></a>
	</span>
	<strong><i style="color:red;">{{$k+1}}F</i>&nbsp;<a href="/goods/list/{{$v->id}}">{{$v->name}}</a></strong>
</div>
<!-- small title end -->
<!-- block start -->
<div class="im-b im-b-sell">
	<div class="im-l">
	<a href="#"><p>{{$v->name}}</p></a>
		<ul>
		@foreach($v->suv as $k1=>$v1)
			<li><a href="http://www.php217.com/dt/sell/list.php?catid=1" target="_blank">{{$v1->name}}</a></li>
		@endforeach
		</ul>
	</div>
	<div class="im-r im-r-sell">
	@foreach($good as $s)
    @foreach($s as $ss)
    @if($ss->cid == $v->id)
	<div>
		<a href="/goods/show/{{$ss->sid}}" target="_blank"><img src="{{$ss->pic}}" width="134" height="134"></a>
		<b>￥{{$ss->price}}</b>
		<p><a href="/goods/show/{{$ss->sid}}" target="_blank">{{$ss->sname}}</a></p>
	</div>
	@endif
    @endforeach
	@endforeach
	</div>
</div>
<!-- block end -->
@endforeach
</div>
<div class="m">
<div class="head-txt">
<span>
<a href="/news/">更多<i>&gt;</i></a>
</span>
<strong>资讯中心</strong>
</div>
<div class="in-b">
<div class="in-l">
<div>
<p><a href="" target="_blank">资讯标题</a></p>
<a href="" target="_blank"><img src="/static/homeSkin/picture/a1.jpg" alt="" width="160" height="120"></a>
</div>
<div>
<p><a href="http://www.php217.com/dt/special/" target="_blank">「专题」</a> <a href="http://www.php217.com/dt/special/show.php?itemid=2" target="_blank">专题1</a></p>
<a href="http://www.php217.com/dt/special/show.php?itemid=2" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" width="160" height="120"></a>
</div>

</div>
<div class="in-m">
<h2><a href="http://www.php217.com/dt/news/show.php?itemid=1" target="_blank"><span>资讯标题</span></a></h2>
<div class="list-txt">
<ul>
@foreach($news as $k=>$n)
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=1" target="_blank">{{$n->name}}</a></li>
@endforeach
</ul>
</div>
<div class="b20 bd-t"></div>
<div class="list-txt">
<ul>
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=3" target="_blank" title="标题1标题1">标题1标题1</a></li>
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=3" target="_blank" title="标题1标题1">标题1标题2</a></li>
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=3" target="_blank" title="标题1标题1">标题1标题3</a></li>
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=3" target="_blank" title="标题1标题1">标题1标题4</a></li>
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=3" target="_blank" title="标题1标题1">标题1标题5</a></li>
<li><span class="f_r">&nbsp;08-16</span><a href="http://www.php217.com/dt/news/show.php?itemid=3" target="_blank" title="标题1标题1">标题1标题6</a></li>
</ul>
</div>
</div>
<div class="in-r">
<div class="head-txt">
<span><a href="/video/" target="_blank">更多<i>&gt;</i></a></span><strong>视频</strong>
</div>
<div class="in-video">
	<div>
	<a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="136" height="102"></a>
	<p><a href="/" target="_blank">短视频标题</a></p>
	</div>
	<div>
	<a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="136" height="102"></a>
	<p><a href="/" target="_blank">短视频标题</a></p>
	</div>
	<div>
	<a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="136" height="102"></a>
	<p><a href="/" target="_blank">短视频标题</a></p>
	</div>
</div>
<div class="head-txt">
<span><a href="/photo/" target="_blank">更多<i>&gt;</i></a></span><strong>图库</strong>
</div>
<div class="in-photo">
<div>
<a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="136" height="102"></a>
<p><a href="/" target="_blank">大图1</a></p>
</div>
<div>
<a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="136" height="102"></a>
<p><a href="/" target="_blank">大图2</a></p>
</div>
<div>
<a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="136" height="102"></a>
<p><a href="/" target="_blank">大图3</a></p>
</div>
</div>
<div class="c_b"></div>
</div>
</div>
<div class="m">
<div class="head-txt">
<span>
 <a href="/know/">知道</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/exhibit/">展会</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/brand/">品牌</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/job/">人才</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/down/">下载</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/club/">商圈</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/ad/">广告</a> &nbsp;|&nbsp; <a href="http://www.php217.com/dt/spread/">推广</a>
</span>
<strong>企业服务</strong>
</div>
<div class="ic-b">
<div class="ic-l">
<div class="ic-brand">
<a href="/brand/" target="_blank"><i>品牌</i></a>
<div id="brands">
<p><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="150" height="50"></a><b><a href="http://www.php217.com/dt/brand/show.php?itemid=1" target="_blank">京东</a></b></p>
<p><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="150" height="50"></a><b><a href="http://www.php217.com/dt/brand/show.php?itemid=1" target="_blank">京东</a></b></p>
<p><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="150" height="50"></a><b><a href="http://www.php217.com/dt/brand/show.php?itemid=1" target="_blank">京东</a></b></p>
<p><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="150" height="50"></a><b><a href="http://www.php217.com/dt/brand/show.php?itemid=1" target="_blank">京东</a></b></p>
<p><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="150" height="50"></a><b><a href="http://www.php217.com/dt/brand/show.php?itemid=1" target="_blank">京东</a></b></p>
<p><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" alt="" width="150" height="50"></a><b><a href="http://www.php217.com/dt/brand/show.php?itemid=1" target="_blank">京东</a></b></p>
</div>
</div>
</div>
<div class="ic-m">
<div class="head-txt">
<span><a href="/exhibit/" target="_blank">更多<i>&gt;</i></a></span><strong>展会</strong>
</div>
<div class="list-txt">
<ul>
<li title="展会1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com" target="_blank">展会1</a></li>
<li title="展会1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com" target="_blank">展会1</a></li>
<li title="展会1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com" target="_blank">展会1</a></li>
<li title="展会1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com" target="_blank">展会1</a></li>
<li title="展会1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com" target="_blank">展会1</a></li>
</ul>
</div>
<div class="head-txt">
<span><a href="/dt/job/" target="_blank">更多<i>&gt;</i></a></span><strong>招聘</strong>
</div>
<div class="list-txt">
<ul>
<li title="诚聘PHP开发人员"><span class="f_r">北京</span><a href="http://www.php217.om" target="_blank">诚聘PHP开发人员</a></li>
<li title="诚聘PHP开发人员"><span class="f_r">北京</span><a href="http://www.php217.om" target="_blank">诚聘前端工程师</a></li>
<li title="诚聘PHP开发人员"><span class="f_r">北京</span><a href="http://www.php217.om" target="_blank">诚聘美工</a></li>
<li title="诚聘PHP开发人员"><span class="f_r">北京</span><a href="http://www.php217.om" target="_blank">诚聘发单员</a></li>
<li title="诚聘PHP开发人员"><span class="f_r">北京</span><a href="http://www.php217.om" target="_blank">诚聘外勤</a></li>
<li title="诚聘PHP开发人员"><span class="f_r">北京</span><a href="http://www.php217.om" target="_blank">诚聘架构师</a></li>
</ul>
</div>
</div>
<div class="ic-r">
<div class="head-txt">
<span><a href="/dt/know/" target="_blank">更多<i>&gt;</i></a></span><strong>问答</strong>
</div>
<div class="list-txt">
<ul>
<li title="知道1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com/dt/exhibit/show.php?itemid=1" target="_blank">知道1</a></li>
<li title="知道1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com/dt/exhibit/show.php?itemid=1" target="_blank">问题1</a></li>
<li title="知道1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com/dt/exhibit/show.php?itemid=1" target="_blank">知道1</a></li>
<li title="知道1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com/dt/exhibit/show.php?itemid=1" target="_blank">问题2</a></li>
<li title="知道1 2019年08月01日"><span class="f_r"></span><a href="http://www.php217.com/dt/exhibit/show.php?itemid=1" target="_blank">知道1</a></li>
</ul>
</div>
<div class="head-txt">
<span><a href="/down/" target="_blank">更多<i>&gt;</i></a></span><strong>下载</strong>
</div>
<div class="ic-down">
	<div>
	<a href="http://www.php217.com/dt/down/show.php?itemid=2" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" width="136" height="102"></a>
	<p><a href="http://www.php217.com/dt/down/show.php?itemid=2" target="_blank">app2</a></p>
	</div>
	<div>
	<a href="http://www.php217.com/dt/down/show.php?itemid=2" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" width="136" height="102"></a>
	<p><a href="http://www.php217.com/dt/down/show.php?itemid=2" target="_blank">app2</a></p>
	</div>
	<div>
	<a href="http://www.php217.com/dt/down/show.php?itemid=2" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" width="136" height="102"></a>
	<p><a href="http://www.php217.com/dt/down/show.php?itemid=2" target="_blank">app2</a></p>
	</div>
</div>
<div class="c_b"></div>
</div>
</div>
<div class="m">
<div class="ic-club">
<div class="ic-club-h">
<span>
<a href="/club/">更多<i>&gt;</i></a>
</span>
<a href="/club/" target="_blank"><strong>商圈</strong></a>
</div>
<div class="ic-club-b">
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a1.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈1</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a2.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈2</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a3.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈3</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a4.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈4</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a5.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈5</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a1.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈6</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a2.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈7</a></p>
	<span>0主题 0粉丝</span>
	</div>
	<div>
	<a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank"><img src="/static/homeSkin/picture/a2.jpg"></a>
	<p><a href="http://www.php217.com/dt/club/list.php?catid=184" target="_blank">美妆圈8</a></p>
	<span>0主题 0粉丝</span>
	</div>
</div>
</div>
</div>
<div class="m">
<div class="head-txt">
<span>
<a href="/applylink/create">申请链接</a> &nbsp;|&nbsp;
<a href="/link/">更多<i>&gt;</i></a>
</span>
<div class="px16">友情链接</div>
</div>
<div class="ilink">
<ul>
@foreach($links as $k=>$v)
<li><a href="{{$v->link}}">{{$v->keywords}}</a></li>
@endforeach
</ul>
<div class="c_b"></div>
</div>
<div class="ilink">
<ul>
</ul>
<div class="c_b"></div>
</div>
</div>
<script type="text/javascript" src="/static/homeSkin/js/marquee.js"></script>
<script type="text/javascript" src="/static/homeSkin/js/index.js"></script>
@endsection 
@section('title','商城首页')