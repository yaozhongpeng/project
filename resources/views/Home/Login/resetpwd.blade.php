@extends('Home.HomePublic.homepublic')
@section('home')
<div class="m">
     <form class="am-form am-form-horizontal" action="/doreset" method="post"> 
      <input type="text" id="code" placeholder="请输入验证码" /> 
      <span id="su"></span>
      <label for="user-new-password" class="am-form-label">新密码</label> 
      <input type="password" name="password" id="user-new-password" placeholder="由数字、字母、下划线组合的6-15位密码" /> 
      <label for="user-new-password" class="am-form-label">确认密码</label> 
      <input type="password" name="repassword" id="user-new-password" placeholder="两次密码一致" /> 
      <input type="hidden" name="id" value="{{$id}}">
      {{csrf_field()}}
      <input type="submit" value="提交">
     </form>
</div>
@endsection 
@section('title','设置新密码')   