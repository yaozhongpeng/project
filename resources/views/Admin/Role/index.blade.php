@extends('Admin.AdminPublic.adminpublic')
@section('admin')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 角色列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">角色名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($role as $k=>$v)
       <tr class="@if($k%2==0) odd @else even @endif"> 
        <td class="sorting_1">{{$v->id}}</td> 
        <td>{{$v->name}}</td> 
        <td>
        <span class="btn-group">
          <a href="/adminauth/{{$v->id}}" class="btn btn-info">分配权限</a>
          <form action="/role/{{$v->id}}" method="post" style="display:inline-block;">
            {{csrf_field()}}
            {{method_field("DELETE")}}
            <button class="btn btn-success" type="submit">删除</button>
          </form>
          <a class="btn btn-info" href="/role/{{$v->id}}/edit">修改</a></td> 
       </span>
       </tr>
       @endforeach       
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
        {{$role->render()}}
     </div>
    </div> 
   </div> 
  </div>
@endsection
@section('title','后台角色列表')