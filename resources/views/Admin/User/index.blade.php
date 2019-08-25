@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<body>
<head></head>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <html>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 用户列表 - AJAX分页版</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

    <!-- ajax 模板赋值start  -->
    <div id="ajaxpage">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">Name</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">Email</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">Phone</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">Status</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">添加时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($data as $k=>$v)
      <tr class="@if($k%2==0) odd @else even @endif">
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->email}}</td>
        <td>{{$v->phone}}</td>
        <td>{{$v->status}}</td>
        <td>{{$v->created_at}}</td>
        <td>{{$v->updated_at}}</td>
        <td>
        <span class="btn-group">
          <form action="/adminuser/{{$v->id}}" method="post" style="display:inline-block;">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-warning" type="submit" onclick="return confirm('确定删除该用户吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/adminuser/{{$v->id}}/edit">修改</a>
          <a class="btn btn-warning" href="/userinfo/{{$v->id}}">详情</a>
          <a class="btn btn-info" href="/useraddress/{{$v->id}}">地址</a>
        </span>
        </td>
      </tr>
      @endforeach
      </tbody>
     </table>
     </div>
     <!-- ajax 模板赋值 end  -->
     <div class="dataTables_info" id="DataTables_Table_1_info">     
      当前的url:{{Request::getRequestUri()}} 
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
         <div class="dataTables_paginate paging_full_numbers" id="pages">
          @foreach($pages as $k=>$p)
          <button onclick="page({{$p}})">{{$p}}</button>
          @endforeach
         </div>
     </div>
    </div> 
   </div> 
  </div>
 </body>
<script type="text/javascript">
  // alert($);
  function page(p){
    // alert(p); // 当前页 
    // ajax 请求
    $.get('/adminuser',{page:p},function(data){
      // alert(data);
      $('#ajaxpage').html(data);
    });
  }
</script>
</html>
@endsection 
@section('title','用户列表 - AJAX分页版')