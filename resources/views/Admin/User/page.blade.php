<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <!-- ajax 模板赋值start  -->
    <div id="ajaxpage">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">Name</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">Email</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">phone</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">Status</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">添加时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($data as $k=>$v)
      <tr class="{{--@if($k%2==0) odd @else even @endif--}}">
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
    </div>