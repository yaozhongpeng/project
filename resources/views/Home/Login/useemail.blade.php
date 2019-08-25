@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m">   
     <form class="" action="/doemail" method="post"> 
          <input type="text" name="email" placeholder="请输入注册邮箱" /> 
          {{csrf_field()}}
          <input type="submit" value="点击获取邮箱验证" id="huoqu">
          <span id="su"></span>
     </form>
</div>
@endsection 
@section('title','邮箱找回密码')