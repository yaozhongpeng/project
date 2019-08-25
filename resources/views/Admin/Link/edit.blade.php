@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改友情链接</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminlink/{{$link->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">链接关键词</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="keywords" value="{{$link->keywords}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">链接网址</label> 
       <div class="mws-form-item"> 
        <input type="text" name="link" value="{{$link->link}}">
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <input type="text" name="status" value="{{$link->status}}">
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field('PUT')}}
      <input type="submit" value="修改友情链接" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section('title','修改友情链接')