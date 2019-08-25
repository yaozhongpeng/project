@extends('Admin.AdminPublic.adminpublic')
@section('admin')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改分类</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincate/{{$c->id}}" method="post"> 
     <div class="mws-form-inline">
      <div class="mws-form-row"> 
       <label class="mws-form-label">所属分类</label> 
       <div class="mws-form-item"> 
        <select name="pid">
          <option value="0">--选择--</option>
          @foreach($cate as $cs)
          <option value="{{$cs->id}}" @if($cs->id == $c->pid) selected @endif>{{$cs->name}}</option>
          @endforeach
        </select>
        &nbsp;<span>添加顶级分类,无需选择</span>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{$c->name}}" /> 
       </div> 
      </div> 
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field("PUT")}}
      <input type="submit" value="修 改" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
@endsection 
@section('title','修改分类')