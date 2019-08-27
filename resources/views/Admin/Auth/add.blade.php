@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>权限添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/auth" method="post"> 
     <div class="mws-form-inline"> 
      
      <!-- <div class="mws-form-row"> 
       <label class="mws-form-label">控制器名称</label> 
       <div class="mws-form-item"> 
        <input type="text" name="mname" class="large"/> 
       </div> 
      </div> --> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">控制器名称</label>
        <div class="mws-form-item"> 
         <select name="mname" id="mname">
         @foreach($arr as $k=>$v)
          <option value="{{$v}}">{{$v}}</option>
         @endforeach
         </select>
         </div> 
      </div>

      <!-- <div class="mws-form-row"> 
       <label class="mws-form-label">方法名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="aname" /> 
       </div> 
      </div> 
     </div> -->
     <div class="mws-form-row"> 
       <label class="mws-form-label">方法名</label> 
       <div class="mws-form-item"> 
        <select name="aname" id="aname">
          <option value="index">列表</option>
          <option value="create">添加</option>
          <option value="edit">修改</option>
          <option value="destroy">删除</option>
         </select> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label">权限名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" id="authname" value="" placeholder="选择控制器和方法,单价这里自动生成权限名称" /> 
       </div> 
      </div> 

     </div> 
     <div class="mws-button-row"> 
      {{csrf_field()}}
      <input type="submit" value="添加权限" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
<script type="text/javascript">
$(document).ready(function(){
  $('#mname').change(function(){  
　     m_text =$(this).children('option:selected').text(); // 文本  
　     m_value = $(this).children('option:selected').val();  // 值  
　    //$('#authname').val(m); // 赋值权限名     
  });  
  $('#aname').change(function(){  
　     a_text =$(this).children('option:selected').text(); // 文本  
　     a_value = $(this).children('option:selected').val();  // 值  
// 　    $('#authname').val(a); // 赋值权限名    
  });  
  $('#authname').click(function(){
    $(this).val(m_value+'-'+a_value+'-'+a_text);
  }); // 赋值权限名  
});  
</script>
</html>
@endsection
@section('title','后台权限添加')