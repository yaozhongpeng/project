@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head>
 </head>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 友情链接列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/adminlink" method="get">
         <div id="DataTables_Table_1_length" class="dataTables_length">
          <label>每页{{--$request['pageSize'] or '5'--}}
         <select size="1" name="pageSize" aria-controls="DataTables_Table_1">
            <option value="5"  @if(!empty($request['pageSize'])&&$request['pageSize']==5 ) selected @endif >5 </option>
            <option value="10"  @if(!empty($request['pageSize'])&&$request['pageSize']==10 ) selected @endif >10 </option>
            <option value="15"  @if(!empty($request['pageSize'])&&$request['pageSize']==15 ) selected @endif >15 </option>
            <option value="25"  @if(!empty($request['pageSize'])&&$request['pageSize']==25 ) selected @endif >25 </option>
            <option value="50"  @if(!empty($request['pageSize'])&&$request['pageSize']==50 ) selected @endif >50 </option>
            <option value="100" @if(!empty($request['pageSize'])&&$request['pageSize']==100) selected @endif >100</option>
          </select> 条</label>
         </div>
     
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
           <label>按{{--$request['kw_type'] or ''--}}
           <select name="kw_type" id="kw_type">
             <option value="keywords" @if(!empty($request['kw_type'])&&$request['kw_type']=='keywords') selected @endif >链接名称</option>
             <option value="link" @if(!empty($request['kw_type'])&&$request['kw_type']=='link') selected @endif >链接网址</option>
             <option value="status" @if(!empty($request['kw_type'])&&$request['kw_type']=='status') selected @endif >状态</option>
            </select>
           <input type="text" aria-controls="DataTables_Table_1" name="kw" value="{{$request['kw'] or ''}}" />
           </label>
           <input type="submit" onsubmit="kwsearch()" value="查询">
         </div>
    </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">keywords</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">link</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">添加时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($links as $k=>$v)
      <tr class="@if($k%2==0) odd @else even @endif">
        <td class="sorting_1">{{$v->id}}</td>
        <td>{{$v->keywords}}</td>
        <td>{{$v->link}}</td>
        <td>
          <input type="checkbox" name="updown" id="{{$v->id}}" onclick="onoff({{$v->id}})"  @if(($v->status) == '上架中') checked @endif>
        </td>
         <td>{{$v->created_at}}</td>
        <td>{{$v->updated_at}}</td>
        <td>
        <span class="btn-group">
          <form action="/adminlink/{{$v->id}}" method="post" style="display: inline-block">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该用户吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/adminlink/{{$v->id}}/edit">修改</a>
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
             {{$links->appends($request)->render()}}
         </div>
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
   // alert($);
   // 友情链接下架
   function onoff(id){
    // alert(id); // 当前记录
      $.get('/linkup',{lid:id},function(data){
          // alert('data=>'+data+'\nid=>'+id);
          // alert(data);
          if(data == 0){
            this.attr('checked') == false;
          }else if(data == 1){
            this.attr('checked') == true;
          }
      });
   }
   // ajax 关键词查询
   // $(document).ready(function(){
   //  $('#kw_type').change(function(){
   //    var kw = $(this).children('option:selected').val();
   //    alert(kw);
   //  }
   // }
   // function kwsearch(){
   //  get('/adminlink',{kw:kw},function(data){
   //    alert(data);
   //  })
   // }
 </script>
</html>
@endsection 
@section('title','友情链接列表')