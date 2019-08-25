@extends('Admin.AdminPublic.adminpublic')
@section('admin')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 轮播图列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/adminuser" method="get">
         <div id="DataTables_Table_1_length" class="dataTables_length">
          
         </div>
     
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
           
         </div>
    </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">name</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">img</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">status</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($imgs as $k=>$v)
      <tr class="">
        <td class="sorting_1">{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td><img src="{{$v->thumb}}"></td>
        <td>{{$v->status}}</td>
        <td>
          <form action="/adminimg/{{$v->id}}" method="post">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该图片吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/adminimg/{{$v->id}}/edit">修改</a>
        </td>
      </tr>
      @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">     
     当前的url:  {{Request::getRequestUri()}}
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
         <div class="dataTables_paginate paging_full_numbers" id="pages">
             {{$imgs->render()}}
         </div>
     </div>
    </div> 
   </div> 
  </div>
@endsection 
@section('title','轮播图列表')