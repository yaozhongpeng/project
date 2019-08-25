@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加友情链接</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminlink" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">链接关键词</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="keywords" /> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">链接网址</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="link" /> 
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}} 
      <input type="submit" value="添加" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section('title','添加友情链接')