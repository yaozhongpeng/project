@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m m1">
<div class="m1l">
<h1 class="title">{{$art->title}}</h1>
<div class="info f_gray"><span class="f_r c_p"><span onclick="Print();">[打印]</span></span>发布时间：2019-08-08&nbsp;&nbsp;&nbsp;&nbsp;有效期：不限 至 不限&nbsp;&nbsp;&nbsp;&nbsp;点击：<span id="hits">2</span></div>
<div class="content" id="content">{!!$art->descr!!}</div>
</div>
<div class="m1r side">
<ul>
<li class="side_li" id="type_0"><a href="http://localhost/dt/announce/">公告中心</a></li>
<li class="side_li" id="type_1"><a href="http://localhost/dt/announce/list.php?catid=1">系统公告</a></li>
</ul>
<form action="index.php"><input type="search" name="kw" value="" ondblclick="if(this.value){Go('./');}" placeholder="搜索" title="输入关键词，按回车搜索"/></form>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">$(function(){$('#type_1').attr('class', 'side_on');});</script>
@endsection 
@section('title',$art->title)