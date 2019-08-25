@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m m1">
<div class="m1l">
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th>编号</th>
<th width="120">图片</th>
<th>标题</th>
<th width="120">作者</th>
</tr>
@foreach($a as $k=>$v)
<tr align="center" class="@if($k%2==0) on @else  @endif">
<td>{{$v->id}}</td>
<td class="f_gray"><img src="{{$v->thumb}}" width="100" height="100"></td>
<td class="px14"><a href="/homearticle/{{$v->id}}">{{$v->title}}</a></td>
<td class="f_gray">{{$v->editor}}</td>
</tr>
@endforeach
</table>
<table>
	<tr><td>{{$a->render()}}</td></tr>
</table>
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
<script type="text/javascript">$(function(){$('#type_0').attr('class', 'side_on');});</script>
@endsection 
@section('title','公告列表')