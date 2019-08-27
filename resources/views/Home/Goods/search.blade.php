@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m">
<div class="nav bd-b"><a href="/homeindex">首页</a> <i>&gt;</i> <a href="/goods">商城</a> </div>
</div>
<div class="m m2">
<div class="m2l">
<form action="/search" method="get" id="fsearch">
<input type="hidden" name="list" id="list" value="0"/>
<div class="sort">
<div class="sort-k">关键词</div>
<div class="sort-v">
<input type="text" size="50" name="kw" value="电视"/> &nbsp;
<input type="radio" name="fields" value="0" id="fd_0" checked/><label for="fd_0"> 智能</label> &nbsp;
<input type="radio" name="fields" value="1" id="fd_1"/><label for="fd_1"> 标题</label> &nbsp;
<input type="radio" name="fields" value="3" id="fd_3"/><label for="fd_3"> 公司</label> &nbsp;
<input type="radio" name="fields" value="4" id="fd_4"/><label for="fd_4"> 品牌</label> &nbsp;
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">行业</div>
<div class="sort-v">
<input name="catid" id="catid_1" type="hidden" value="0"/><span id="load_category_1"><select onchange="load_category(this.value, 1);" ><option value="0">不限分类</option><option value="4">家用电器</option><option value="114">手机 / 运营商 / 数码</option><option value="115">电脑 / 办公</option><option value="116">家居 / 家具 / 家装 / 厨具</option><option value="117">男装 / 女装 / 童装 / 内衣</option><option value="118">美妆 / 个护清洁 / 宠物</option><option value="119">女鞋 / 箱包 / 钟表 / 珠宝</option><option value="120">男鞋 / 运动 / 户外</option><option value="121">房产 / 汽车 / 汽车用品</option><option value="122">母婴 / 玩具乐器</option><option value="123">食品 / 酒类 / 生鲜 / 特产</option><option value="124">艺术 / 礼品鲜花 / 农资绿植</option><option value="125">医药保健 / 计生情趣</option><option value="126">图书 / 文娱 / 电子书</option><option value="127">机票 / 酒店 / 旅游 / 生活</option><option value="128">理财 / 众筹 / 白条 / 保险</option><option value="129">安装 / 维修 / 清洗 / 二手</option><option value="130">工业品</option></select> </span><script type="text/javascript">var category_moduleid = new Array;category_moduleid[1]="16";var category_title = new Array;category_title[1]='不限分类';var category_extend = new Array;category_extend[1]='e16cirLNrNrFNJktj2n7A-S-ahyG6stSQ5pouz1gFSiYQ-E-';var category_catid = new Array;category_catid[1]='0';var category_deep = new Array;category_deep[1]='0';</script><script type="text/javascript" src="/static/memberSkin/dt/file/script/category.js"></script><b>日期</b>
<script type="text/javascript" src="/static/memberSkin/dt/file/script/calendar.js"></script><input type="text" name="fromdate" id="fromdate" value="" size="10" onfocus="ca_show('fromdate', '', 0);" readonly ondblclick="this.value='';"/> 至 <input type="text" name="todate" id="todate" value="" size="10" onfocus="ca_show('todate', '', 0);" readonly ondblclick="this.value='';"/> &nbsp;
<input type="checkbox" name="vip" id="vip" value="1"/>VIP &nbsp;
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">地区</div>
<div class="sort-v">
<input name="areaid" id="areaid_1" type="hidden" value="0"/><span id="load_area_1"><select onchange="load_area(this.value, 1);" ><option value="0">所在地区</option><option value="1">北京</option><option value="2">上海</option><option value="3">天津</option><option value="4">重庆</option><option value="5">河北</option><option value="6">山西</option><option value="7">内蒙古</option><option value="8">辽宁</option><option value="9">吉林</option><option value="10">黑龙江</option><option value="11">江苏</option><option value="12">浙江</option><option value="13">安徽</option><option value="14">福建</option><option value="15">江西</option><option value="16">山东</option><option value="17">河南</option><option value="18">湖北</option><option value="19">湖南</option><option value="20">广东</option><option value="21">广西</option><option value="22">海南</option><option value="23">四川</option><option value="24">贵州</option><option value="25">云南</option><option value="26">西藏</option><option value="27">陕西</option><option value="28">甘肃</option><option value="29">青海</option><option value="30">宁夏</option><option value="31">新疆</option><option value="32">台湾</option><option value="33">香港</option><option value="34">澳门</option></select> </span><script type="text/javascript">var area_title = new Array;area_title[1]='所在地区';var area_extend = new Array;area_extend[1]='97c6kpxJ3-P-zGXmkSRPLPUsjHvTVnY5DelCHQSIa9ePU-E-';var area_areaid = new Array;area_areaid[1]='0';var area_deep = new Array;area_deep[1]='0';</script><script type="text/javascript" src="/static/memberSkin/dt/file/script/area.js"></script><b>价格</b>
<input type="text" size="10" name="minprice" value=""/> ~ <input type="text" size="10" name="maxprice" value=""/>
<b>排序</b>
<select name="order" ><option value="0" selected=selected>结果排序方式</option><option value="1">按相似度排序</option><option value="2">价格由高到低</option><option value="3">价格由低到高</option><option value="4">销量由高到低</option><option value="5">销量由低到高</option><option value="6">评论由低到高</option><option value="7">评论由高到低</option><option value="8">人气由高到低</option><option value="9">人气由低到高</option></select></div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">&nbsp;</div>
<div class="sort-v">
<input type="submit" value="搜 索" class="btn-blue"/>
<input type="button" value="重 搜" class="btn" onclick="Go('/static/memberSkin/dt/mall/search.php');"/>
</div>
<div class="c_b"></div>
</div>
</form>
<form method="post">
<div class="sell_tip" id="sell_tip" style="display:none;" title="双击关闭" ondblclick="Dh(this.id);">
<div>
<p>您可以</p>
<input type="submit" value="对比选中" onclick="this.form.action='';" class="tool-btn"/> 或 
<input type="submit" value="批量购买" onclick="this.form.action='';" class="tool-btn"/>
</div>
</div>
<div class="img_tip" id="img_tip" style="display:none;">&nbsp;</div>
<div class="tool">
<table>
<tr>
<td width="25" align="center" title="全选/反选"><input type="checkbox" onclick="checkall(this.form);"/></td>
<td width="10"> </td>
<td>
<input type="submit" value="对比选中" onclick="this.form.action='';" class="tool-btn"/>&nbsp;
<input type="submit" value="批量购买" onclick="this.form.action='';" class="tool-btn"/>
</td>
<td align="right">
<img src="/static/homeSkin/images/list_img.gif" width="16" height="16" alt="图片列表" align="absmiddle" class="c_p" onclick="Dd('list').value=1;Dd('fsearch').submit();"/>&nbsp;
<img src="/static/homeSkin/images/list_mix_on.gif" width="16" height="16" alt="图文列表" align="absmiddle"/>&nbsp;
</td>
</tr>
</table>
</div>
@foreach($data as $d)
@foreach($data1 as $d1)
@foreach($d1 as $v)
@if($v->gid == $d->goods_id)
<div class="list" id="item_2">
<table>
<tr align="center">
<td width="26"><input type="checkbox" id="check_2" name="itemid[]" value="2" onclick="sell_tip(this, 2);"/></td>
<td width="90"><div><a href="/goods/show/{{$v->gid}}" target="_blank"><img src="{{$v->pic}}" width="80" height="80" alt="{{$v->name}}" onmouseover="img_tip(this, this.src);" onmouseout="img_tip(this, '');"/></a></div></td>
<td width="10"> </td>
<td align="left">
<ul>
<li><a href="/goods/show/{{$v->gid}}" target="_blank"><strong class="px14">{{$v->name}}</strong></a></li>
<li style="padding:6px 0;"><a href="/goods/show/{{$v->gid}}" target="_blank"></a></li>
</ul>
</td>
<td class="list_price">￥<strong>{{$v->price}}</strong></td>
<td width="120">
<a href="/goods/show/{{$v->gid}}" target="_blank" rel="nofollow"><img src="" title="点击交谈/留言" alt="" align="absmiddle" onerror="this.src=DTPath+'file/image/web-off.gif';"/></a>&nbsp;</td>
<td class="list_count">
成交(0)<br/>
<a href="/static/memberSkin/dt/mall/show.php?itemid=2#comment" target="_blank"><span>评价(0)</span></a>
</td>
<td width="120"><a href="/goods/show/{{$v->gid}}" target="_blank"><img src="/static/homeSkin/picture/addcart.gif" title="加入购物车" style="margin-top:10px;border:none;"/></a></td>
</tr>
</table>
</div>
@endif
@endforeach
@endforeach
@endforeach
<div class="tool">
<table>
<tr height="30">
<td width="25"></td>
<td>
<input type="submit" value="对比选中" onclick="this.form.action='';" class="tool-btn"/>&nbsp;
<input type="submit" value="批量购买" onclick="this.form.action='';" class="tool-btn"/>
</td>
<td></td>
</tr>
</table>
</div>
</form>
</div>
<div class="m2r">
<div class="b10"></div>
<div class="head-sub"><strong>相关搜索</strong></div>
<div class="list-txt">
<ul>
<li><a href="">在 <span class="f_red">商品</span> 找 电视</a></li>
<li><a href="">在 <span class="f_red">分类</span> 找 电视</a></li>
<li><a href="">在 <span class="f_red">卖家</span> 找 电视</a></li>
<li><a href="">在 <span class="f_red">资讯</span> 找 电视</a></li>

</div>
<div class="sponsor"></div>
<div class="head-sub"><strong>今日排行</strong></div>
<div class="list-rank">
<ul>
<li title="搜索1次 约2条结果"><span class="f_r">2条</span><em>1</em><a href="">电视</a></li>
</ul></div>
<div class="head-sub"><strong>本周排行</strong></div>
<div class="list-rank">
<ul>
<li title="搜索1次 约2条结果"><span class="f_r">2条</span><em>1</em><a href="">电视</a></li>
</ul></div>
<div class="head-sub"><strong>本月排行</strong></div>
<div class="list-rank">
<ul>
<li title="搜索1次 约2条结果"><span class="f_r">2条</span><em>1</em><a href="">电视</a></li>
</ul></div>
</div>
<div class="c_b"></div>
</div>
@endsection 
@section('title',$word.' - 中文分词搜索')