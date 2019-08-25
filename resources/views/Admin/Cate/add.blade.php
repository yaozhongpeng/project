@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加分类</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincate" method="post"> 
     <div class="mws-form-inline">
      <div class="mws-form-row"> 
       <label class="mws-form-label">所属分类</label> 
       <div class="mws-form-item"> 
        <select name="pid">
          <option value="0">--选择--</option>
          @foreach($cates as $v)
          <option value="{{$v->id}}">{{$v->name}}</option>
          @endforeach
        </select>
        &nbsp;<span>添加顶级分类,无需选择</span>
       </div> 
      </div>
      {{--联动 start --}}
      <!-- <div class="mws-form-row"> 
       <label class="mws-form-label">所属分类</label> 
       <div class="mws-form-item"> 
        <select name="upid" id="sid">
          <option value="0">--请选择--</option> -->
          {{--@foreach($c as $c_0)--}}
          <!-- <option value="{{--$c_0->id--}}">{{--$c_0->name--}}</option> -->
          {{--@endforeach--}}
        <!-- </select> -->
        <!-- &nbsp;<span>添加顶级分类,无需选择</span> -->
       <!-- </div>  -->
      <!-- </div>  -->
      {{--联动 end --}}
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" /> 
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
@endsection 
@section('title','添加分类')