@extends("Admin.AdminPublic.adminpublic")
@section("admin")
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 用户列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/adminuser" method="get">
         <div id="DataTables_Table_1_length" class="dataTables_length">
          <label>每页{{$request['pageSize'] or '5'}}
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
           <label>按{{$request['kw_type'] or ''}}
           <select name="kw_type">
             <option value="name"  @if(!empty($request['kw_type'])&&$request['kw_type']=='name') selected @endif >姓名</option>
             <option value="email" @if(!empty($request['kw_type'])&&$request['kw_type']=='email') selected @endif >邮箱</option>
             <option value="status"@if(!empty($request['kw_type'])&&$request['kw_type']=='status') selected @endif >状态</option>
           </select>
           <input type="text" aria-controls="DataTables_Table_1" name="kw" value="{{$request['kw'] or ''}}" />
           </label>
           <input type="submit" value="查询">
         </div>
    </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">Name</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">Email</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">Status</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">添加时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($user as $k=>$v)
      <tr class="@if($k%2==0) odd @else even @endif">
        <td class="sorting_1">{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->email}}</td>
        <td>{{$v->status}}</td>
        <td>{{$v->created_at}}</td>
        <td>{{$v->updated_at}}</td>
        <td>
          <form action="/adminuser/{{$v->id}}" method="post">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该用户吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/userinfo/{{$v->id}}">详情</a>
          <a class="btn btn-info" href="/useraddress/{{$v->id}}">地址</a><br>
          <a class="btn btn-info" href="/adminuser/{{$v->id}}/edit">修改</a>
        </td>
      </tr>
      @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
     {{$user->firstItem()}} to {{$user->lastItem()}} of {{$rows}} <br>
     当前的url:  {{Request::getRequestUri()}} 当前页码:{{$user->currentPage()}}
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
         <div class="dataTables_paginate paging_full_numbers" id="pages">
             {{$user->appends($request)->render()}}
         </div>
     </div>
    </div> 
   </div> 
  </div>
@endsection 
@section("title",'用户列表')