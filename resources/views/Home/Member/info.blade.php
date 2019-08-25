@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m dis">
	<div class="box1">
		<h1>会员中心</h1>
		<h2 onclick="func(1)">个人中心</h2>
		<ul id="u1" style="display:none;">
			<li><a href="/memberinfo/{{$info->user_id}}">详细资料</a></li>
			<li>头像管理</li>
		</ul>
		<h2 onclick="func(2)">收货地址</h2>
		<ul id="u2" style="display:none;">
			<li><a href="/memberaddress/{{$info->user_id}}">地址列表</a></li>
			<li>新增地址</li>
		</ul>
	</div>
	<div class="box2">
		<table border="1"> 
	      <thead> 
	       <tr>
	        <th>ID</th>
	        <th>兴趣</th>
	        <th>性别</th>
	        <th>操作</th>
	       </tr> 
	      </thead> 
	      <tbody>
	      @if(count($info))
	        <tr> 
	        <td>{{$info->user_id}}</td> 
	        <td>{{$info->work}}</td> 
	        <td>{{$info->sex}}</td> 
	        <td><a href="/member/{{$info->user_id}}/edit">修改</a></td> 
	       </tr>
	      @else
	      <tr> 
	        <td colspan="3" align="center"><b style="color:#FF0000">没有详情数据</b></td> 
	       </tr>
	      @endif
	       </tbody>
	     </table>
     </div>
</div>
<script type="text/javascript">
	function func(id){
		var ul = document.getElementById('u'+id);
		// alert(ul);
		if (ul.style.display == 'none') {
			ul.style.display = 'block';
		}else{
			ul.style.display = 'none';
		}
	}
</script>
@endsection 
@section('title','会员中心首页')