@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改轮播图</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminimg/{{$img->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">标题</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{$img->name}}" /> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="small" name="thumb" value="{{$img->thumb}}" /> 
        <img src="{{$img->thumb}}"><br>
        <span>{{$img->thumb}}</span>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="status" value="{{$img->status}}" /> 
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field('PUT')}} 
      <input type="submit" value="修改" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section('title','修改轮播图')