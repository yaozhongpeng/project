@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>「模型」修改用户</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminuser/{{$user->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">姓名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{$user->name}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="small" name="password" value="{{$user->password}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="status" value="{{$user->status}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="email" value="{{$user->email}}" /> 
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field("PUT")}} 
      <input type="submit" value="确认修改" class="btn btn-danger" /> 
      <input type="reset" value="取 消" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section("title",'添加用户')