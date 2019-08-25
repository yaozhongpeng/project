@extends('Home.HomePublic.homepublic')
@section('home')
<div class="m">
<div class="b20"></div>
<div class="nav bd-b"><a href="/homeindex">首页</a> <i>&gt;</i> <a href="/goods/">商城</a> <i>&gt;</i> <a href="/goods/list/4">家用电器</a></div>
</div>
<div class="m m2">
<div class="m2l">
<div class="sort">
<div class="sort-k">分类</div>
<div class="sort-v">
<ul>
@foreach($childcate as $k=>$cc)
<li><a href="/goods/list/{{$cc->id}}">{{$cc->name}}</a> <i>(1)</i><li>
@endforeach
</ul>
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">地区</div>
<div class="sort-v">
<ul>
<li><a href="1">北京</a></li>
<li><a href="2">上海</a></li>
<li><a href="3">天津</a></li>
<li><a href="4">重庆</a></li>
<li><a href="5">河北</a></li>
<li><a href="6">山西</a></li>
<li><a href="7">内蒙古</a></li>
<li><a href="8">辽宁</a></li>
<li><a href="9">吉林</a></li>
<li><a href="10">黑龙江</a></li>
<li><a href="11">江苏</a></li>
<li><a href="12">浙江</a></li>
<li><a href="13">安徽</a></li>
<li><a href="14">福建</a></li>
<li><a href="15">江西</a></li>
<li><a href="16">山东</a></li>
<li><a href="17">河南</a></li>
<li><a href="18">湖北</a></li>
<li><a href="19">湖南</a></li>
<li><a href="20">广东</a></li>
<li><a href="21">广西</a></li>
<li><a href="22">海南</a></li>
<li><a href="23">四川</a></li>
<li><a href="24">贵州</a></li>
<li><a href="25">云南</a></li>
<li><a href="26">西藏</a></li>
<li><a href="27">陕西</a></li>
<li><a href="28">甘肃</a></li>
<li><a href="29">青海</a></li>
<li><a href="30">宁夏</a></li>
<li><a href="31">新疆</a></li>
<li><a href="32">台湾</a></li>
<li><a href="33">香港</a></li>
<li><a href="34">澳门</a></li>
</ul>
</div>
<div class="c_b"></div>
</div>
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
<tr height="30">
<td width="25" align="center"><input type="checkbox" onclick="checkall(this.form);"/></td>
<td>
<input type="submit" value="对比选中" onclick="this.form.action='';" class="tool-btn"/>&nbsp; &nbsp;
<input type="submit" value="批量购买" onclick="this.form.action='';" class="tool-btn"/>
</td>
<td align="right">
<script type="text/javascript">var sh = '';</script>
<input type="checkbox" onclick="Go(sh+'&vip=1');"/>VIP&nbsp;
<select onchange="Go(sh+'&day='+this.value)">
<option value="0">更新时间</option>
<option value="1">1天内</option>
<option value="3">3天内</option>
<option value="7">7天内</option>
<option value="15">15天内</option>
<option value="30">30天内</option>
</select>&nbsp;
<select onchange="Go(sh+'&order='+this.value)">
<option value="0">显示顺序</option>
<option value="2">价格由高到低</option>
<option value="3">价格由低到高</option>
<option value="4">销量由高到低</option>
<option value="5">销量由低到高</option>
<option value="6">评论由低到高</option>
<option value="7">评论由高到低</option>
<option value="8">人气由高到低</option>
<option value="9">人气由低到高</option>
</select>&nbsp;
<img src="static/picture/list_img.gif" width="16" height="16" alt="图片列表" align="absmiddle" class="c_p" onclick="Go(sh+'&list=1');"/>&nbsp;
<img src="static/picture/list_mix_on.gif" width="16" height="16" alt="图文列表" align="absmiddle" class="c_p" onclick="Go(sh+'&list=0');"/>&nbsp;
</td>
</tr>
</table>
</div>
@foreach($goods as $k=>$v)
<div class="list" id="item_1">
<table>
<tr align="center">
<td width="26"><input type="checkbox" id="check_1" name="itemid[]" value="1" onclick="sell_tip(this, 1);"/></td>
<td width="90"><div><a href="/goods/show/{{$v->id}}" target="_blank"><img src="{{$v->pic}}" width="80" height="80" alt="「2019爆款」55寸超薄电视" onmouseover="img_tip(this, this.src);" onmouseout="img_tip(this, '');"/></a></div></td>
<td width="10"> </td>
<td align="left">
<ul>
<li><a href="/goods/show/{{$v->id}}" target="_blank"><strong class="px14">{{$v->name}}</strong></a></li>
<li style="padding:6px 0;"><a href="/goods/show/{{$v->id}}" target="_blank"></a></li>
</ul>
</td>
<td class="list_price">￥<strong>1.00</strong></td>
<td width="120">
<a href="/goods/show/{{$v->id}}" target="_blank" rel="nofollow"><img src="/static/homeSkin/picture/online.png.php" title="点击交谈/留言" alt="" align="absmiddle" onerror="this.src=DTPath+'file/image/web-off.gif';"/></a>&nbsp;</td>
<td class="list_count">
成交(0)<br/>
<a href="/goods/show/{{$v->id}}" target="_blank"><span>评价(0)</span></a>
</td>
<td width="120"><a href="" target="_blank"><img src="/static/homeSkin/picture/addcart.gif" title="加入购物车" style="margin-top:10px;border:none;"/></a></td>
</tr>
</table>
</div>
@endforeach
<div class="tool">
<table>
<tr height="30">
<td width="25" align="center">&nbsp;</td>
<td>
<input type="submit" value="对比选中" onclick="this.form.action='';" class="tool-btn"/>&nbsp; &nbsp;
<input type="submit" value="批量购买" onclick="this.form.action='';" class="tool-btn"/>
</td>
<td>&nbsp;</td>
</tr>
</table>
</div>
</form>
</div>
<div class="m2r">
<div class="sponsor"></div>
<div class="head-sub"><strong>搜索排行</strong></div>
<div class="list-rank">
<ul>
</ul></div>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript" src="/static/homeSkin/js/marquee.js"></script>
<script type="text/javascript" src="/static/homeSkin/js/index.js"></script>
@endsection 
@section('title',$cate->name)