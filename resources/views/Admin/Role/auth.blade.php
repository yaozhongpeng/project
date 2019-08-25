@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>当前角色:{{$role->name}}的权限信息</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/adminuser" method="get">
         <div id="DataTables_Table_1_length" class="dataTables_length">
         </div>
     
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
         </div>
    </form>
     <form class="mws-form" action="/saveauth" method="post">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th><input type="checkbox" class="allchoose"></th>
        <th>ID</th>
        <th>权限名称</th>
        <th>控制器名称</th>
        <th>方法名称</th>
        <th>状态</th>
        <th>操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($auths as $k=>$auth)
      <tr class="@if($k%2==0) odd @else even @endif">
        <td><input type="checkbox" name="nids[]" value="{{$auth->id}}" @if(in_array($auth->id,$nids)) checked @endif></td>
        <td class="sorting_1">{{$auth->id}}</td>
        <td>{{$auth->name}}</td>
        <td>{{$auth->mname}}</td>
        <td>{{$auth->aname}}</td>
        <td>{{$auth->status}}</td>
        <td>
          &nbsp;
        </td>
      </tr>
      @endforeach
      <tr>
        <td><input type="checkbox" class="allchoose"></td>
        <td colspan="7">
          <a href="javascript:void(0)" class="btn btn-success allchoose">全选</a>
          <a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a>
          <a href="javascript:void(0)" class="btn btn-success fchoose">反选</a>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="7">
        <div class="mws-button-row">
          {{csrf_field()}}
          <input type="hidden" name="rid" value="{{$role->id}}">
          <input value="分配权限" class="btn btn-danger" type="submit"> 
          <input value="Reset" class="btn " type="reset"> 
       </div> 
        </td>
      </tr>
      </tbody>
     </table>
     </form>
     <div class="dataTables_info" id="DataTables_Table_1_info">     
     当前的url:  {{Request::getRequestUri()}}
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
         <div class="dataTables_paginate paging_full_numbers" id="pages">

         </div>
     </div>
    </div> 
   </div> 
  </div>
</body>
<script type="text/javascript">
 // alert($);
 // 全选
 $(".allchoose").click(function(){
    $("#DataTables_Table_1").find("tr").each(function(){
      // alert('sss');
      $(this).find(":checkbox").attr("checked",true);
    });
 });

 // 全不选
  $(".nochoose").click(function(){
    $("#DataTables_Table_1").find("tr").each(function(){
      // alert('sss');
      $(this).find(":checkbox").attr("checked",false);
    });
 });
// 反选
$(".fchoose").click(function(){
  $("#DataTables_Table_1").find("tr").each(function(){
      // alert('sss');
      if($(this).find(":checkbox").attr("checked")){
        // 取消选中
        $(this).find(":checkbox").attr("checked",false);
      }else{
        // 选中
        $(this).find(":checkbox").attr("checked",true);

      }
    });
});
// 删除
$(".del").click(function(){
  arr=[];
  // 获取选中的数据id
  $("#DataTables_Table_1").find("tr").each(function(){
    if($(this).find(":checkbox").attr("checked")){
      id=$(this).find(":checkbox").val();
      // alert(id);
      // 把选中数据的id添加到数组里
      arr.push(id);
    }
  });
  // alert(arr);
  // 触发Ajax请求
  $.get("/articledel",{arr:arr},function(data){
    // alert(data);
    if(data==1){
      // 删除选中数据的tr
      // 遍历arr数组 找input 找tr
      for(var i=0;i<arr.length;i++){
        $("input[value="+arr[i]+"]").parents("tr").remove();

      }
      // alert("删除成功");
    }else{
      alert(data);
    }
  });
});
</script>
</html>
@endsection 
@section('title','公告列表')