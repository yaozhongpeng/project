@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 公告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    
    <form action="/adminarticle" method="get">
         <div id="DataTables_Table_1_length" class="dataTables_length">
          <label>每页{{--$request['pageSize'] or '5'--}}
         <select size="1" name="pageSize" aria-controls="DataTables_Table_1">
            <option value="5"   @if(!empty($request['pageSize'])&&$request['pageSize']==5  ) selected @endif >5  </option>
            <option value="10"  @if(!empty($request['pageSize'])&&$request['pageSize']==10 ) selected @endif >10 </option>
            <option value="15"  @if(!empty($request['pageSize'])&&$request['pageSize']==15 ) selected @endif >15 </option>
            <option value="25"  @if(!empty($request['pageSize'])&&$request['pageSize']==25 ) selected @endif >25 </option>
            <option value="50"  @if(!empty($request['pageSize'])&&$request['pageSize']==50 ) selected @endif >50 </option>
            <option value="100" @if(!empty($request['pageSize'])&&$request['pageSize']==100) selected @endif >100</option>
          </select> 条</label>
         </div>
     
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
           <label>按{{--$request['kw_type'] or ''--}}
           <select name="kw_type">
             <option value="title" @if(!empty($request['kw_type'])&&$request['kw_type']=='title') selected @endif >公告名称</option>
             <option value="descr" @if(!empty($request['kw_type'])&&$request['kw_type']=='descr') selected @endif >公告内容</option>
            </select>
           <input type="text" aria-controls="DataTables_Table_1" name="kw" value="{{$request['kw'] or ''}}" />
           </label>
           <input type="submit" value="查询">
         </div>
    </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th><input type="checkbox" class="allchoose"></th>
        <th>ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">标题</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 179px;">作者</th> 
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 179px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 179px;">内容</th>       
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($articles as $k=>$v)
      <tr class="@if($k%2==0) odd @else even @endif">
        <td><input type="checkbox" value="{{$v->id}}"></td>
        <td class="sorting_1">{{$v->id}}</td>
        <td><a href="/homearticle/{{$v->id}}">{{$v->title}}</a></td>
        <td>{{$v->editor}}</td>
        <td><img src="{{$v->thumb}}"></td>
        <td>{!!$v->descr!!}</td>
        <td>
        <span class="btn-group">
          <form action="/adminarticle/{{$v->id}}" method="post" style="display:inline-block;">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该公告吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/adminarticle/{{$v->id}}/edit">修改</a>
        </span>
        </td>
      </tr>
      @endforeach
      <tr>
        <td><input type="checkbox" class="allchoose"></td>
        <td colspan="7">
          <a href="javascript:void(0)" class="btn btn-success allchoose">全选</a>
          <a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a>
          <a href="javascript:void(0)" class="btn btn-success fchoose">反选</a>
          <a href="javascript:void(0)" class="btn btn-danger del">删除</a>
        </td>
      </tr>
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">     
     当前的url:  {{Request::getRequestUri()}}
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
         <div class="dataTables_paginate paging_full_numbers" id="pages">
             {{$articles->appends($request)->render()}}
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