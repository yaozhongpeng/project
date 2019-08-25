@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m dis">
	<div class="box1">
		<h1>会员中心</h1>
		<h2 onclick="func(1)">个人中心+</h2>
		<ul id="u1" style="display:none;">
			<li><a href="/memberinfo/{{$id}}">详细资料</a></li>
	 		<li>头像管理</li>
		</ul>
		<h2 onclick="func(2)">收货地址+</h2>
		<ul id="u2" style="display:none;">
			<li><a href="/memberaddress/{{$id}}">地址列表</a></li>
			<li>新增地址</li>
		</ul>
	</div>
	<div class="box2">
		<table border="1"> 
	      <thead> 
	       <tr>
	        <th>序号</th>
	        <th>收货人</th>
	        <th>电话</th>
	        <th>收货地址</th>
	       </tr> 
	      </thead> 
	      <tbody>
	        @if(count($address))
	        @foreach($address as $k=>$add)
	       <tr class="odd"> 
	        <td>{{$k+1}}</td> 
	        <td>{{$add->name}}</td> 
	        <td>{{$add->phone}}</td> 
	        <td>{{$add->zhi}}</td> 
	       </tr>
	       @endforeach
	       @else
	       <tr class="odd"> 
	        <td colspan="4" align="center">没有数据</td> 
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