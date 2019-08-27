@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改搜索词</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminkw/{{$kw->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">关键词</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="word" value="{{$kw->word}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">goods_id</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="goods_id" value="{{$kw->goods_id}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">级别</label> 
       <div class="mws-form-item"> 
        <select name="level" id="level">
          <option value="0" @if($kw->level == 0) selected @endif >入库</option>
          <option value="1" @if($kw->level == 1) selected @endif >推荐到首页</option>
        </select>
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field('PUT')}}
      <input type="submit" value="修改" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section('title','修改搜索词')