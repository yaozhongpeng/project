@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>权限修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/auth/{{$auth->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">权限名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$auth->name}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">控制器名称</label> 
       <div class="mws-form-item"> 
        <input type="text"  name="mname" class="large" value="{{$auth->mname}}" /> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">方法名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="aname" value="{{$auth->aname}}" /> 
       </div> 
      </div> 
     </div> 
     <div class="mws-button-row"> 
      {{csrf_field()}}
      {{method_field('PUT')}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','后台权限修改')