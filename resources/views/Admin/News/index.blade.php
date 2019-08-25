@extends('Admin.AdminPublic.adminpublic')
@section('admin')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 新闻列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/adminnews" method="get">

    </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">title</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">content</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">操作</th>
        </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($news as $k=>$v)
      <tr class="">
        <td class="sorting_1">{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{!!$v->descr!!}</td>
        <td>
        <span class="btn-group">
          <form action="/adminnews/{{$v->id}}" method="post" style="display:inline-block;">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该文章吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/adminnews/{{$v->id}}/edit">修改</a>
        </span>
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
             render()}}
         </div>
     </div>
    </div> 
   </div> 
  </div>
@endsection 
@section('title','新闻列表')