@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m dis">
	<div class="box1">
		<h1>会员中心</h1>
		<h2 onclick="func(1)">个人中心</h2>
		<ul id="u1" style="display:none;">
			<li><a href="/memberinfo">详细资料</a></li>
			<li>头像管理</li>
		</ul>
		<h2 onclick="func(2)">收货地址</h2>
		<ul id="u2" style="display:none;">
			<li><a href="/memberaddress">地址列表</a></li>
			<li>新增地址</li>
		</ul>
	</div>
	<div class="box2">
	       <form action="/member/{{$user_info->user_id}}" method="post">
	       	work:<input type="text" name="work" value="{{$user_info->work}}"><br>
	       	sex:<input type="text" name="sex" value="{{$user_info->sex}}"><br>
	       	{{csrf_field()}}
     		{{method_field('PUT')}}
	       	<input type="submit" value="执行修改">
	       </form>
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
@section('title','修改资料')