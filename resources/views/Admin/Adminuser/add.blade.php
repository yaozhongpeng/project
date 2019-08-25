@extends('Admin.AdminPublic.adminpublic')
@section('admin')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加管理员</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminusers" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">管理员</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="small" name="password" /> 
       </div> 
      </div> 
     <div class="mws-button-row">
     {{csrf_field()}} 
      <input type="submit" value="添 加" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
@endsection 
@section('title','添加管理员')