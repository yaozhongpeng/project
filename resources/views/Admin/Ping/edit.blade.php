@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改公告</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminarticle/->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">标题</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="title" value="->title}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">内容</label> 
       <div class="mws-form-item"> 
        <textarea rows="10" cols="60" name="descr">->descr}}</textarea>
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field('PUT')}}
      <input type="submit" value="修改公告" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section('title','修改公告')