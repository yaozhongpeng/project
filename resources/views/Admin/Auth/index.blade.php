@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 权限列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

      <form action="/auth" method="get">
         <div id="DataTables_Table_1_length" class="dataTables_length">
          <label>每页{{--$request['pageSize'] or ''--}}
         <select size="1" name="pageSize" aria-controls="DataTables_Table_1">
            <option value="8"   @if(!empty($request['pageSize'])&&$request['pageSize']==8  ) selected @endif >8  </option>
            <option value="1"   @if(!empty($request['pageSize'])&&$request['pageSize']==1  ) selected @endif >1  </option>
            <option value="2"  @if(!empty($request['pageSize'])&&$request['pageSize']==2 ) selected @endif >2 </option>
            <option value="5"  @if(!empty($request['pageSize'])&&$request['pageSize']==5 ) selected @endif >5 </option>
            <option value="10"  @if(!empty($request['pageSize'])&&$request['pageSize']==10 ) selected @endif >10 </option>
            <option value="20"  @if(!empty($request['pageSize'])&&$request['pageSize']==20 ) selected @endif >20 </option>
            <option value="50" @if(!empty($request['pageSize'])&&$request['pageSize']==50) selected @endif >50</option>
            <option value="100" @if(!empty($request['pageSize'])&&$request['pageSize']==100) selected @endif >100</option>
          </select> 条</label>
         </div>
     
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
           <label>按{{--$request['kw_type'] or ''--}}
           <select name="kw_type">
             <option value="name" @if(!empty($request['kw_type'])&&$request['kw_type']=='name') selected @endif >权限名称</option>
             <option value="mname" @if(!empty($request['kw_type'])&&$request['kw_type']=='mname') selected @endif >控制器名称</option>
             <option value="aname" @if(!empty($request['kw_type'])&&$request['kw_type']=='aname') selected @endif >方法名称</option>
            </select>
           <input type="text" aria-controls="DataTables_Table_1" name="kw" value="{{$request['kw'] or ''}}" />
           </label>
           <input type="submit" value="查询">
         </div>
    </form>

     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">权限名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">控制器</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">方法</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($auth as $row)
       <tr class="odd"> 
        <td class="sorting_1">{{$row->id}}</td> 
        <td>{{$row->name}}</td> 
        <td>{{$row->mname}}</td> 
        <td>{{$row->aname}}</td> 
        <td>
        <span class="btn-group">
          <form action="/auth/{{$row->id}}" method="post" style="display:inline-block;">
            {{csrf_field()}}
            {{method_field("DELETE")}}
            <button class="btn btn-success" type="submit">删除</i></button>
          </form>
          <a class="btn btn-info" href="/auth/{{$row->id}}/edit">修改</i></a></td> 
       </span>
       </tr>
       @endforeach
       
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
        {{$auth->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","后台权限列表")