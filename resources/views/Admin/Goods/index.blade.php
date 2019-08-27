@extends('Admin.AdminPublic.adminpublic')
@section('admin')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台商品列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/admingoods" method="get">
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

         <div id="DataTables_Table_1_length" class="dataTables_length">
          <label>按
         <select size="1" name="orderType" aria-controls="DataTables_Table_1">
            <option value="id" @if(!empty($request['orderType'])&&$request['orderType']=='id') selected @endif >ID 升序↑</option>
            <option value="price" @if(!empty($request['orderType'])&&$request['orderType']=='price') selected @endif >价格升序↑</option>
          </select>排序</label>
         </div>
     
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
           <label>按{{--$request['kw_type'] or ''--}}
           <select name="kw_type">
             <option value="name" @if(!empty($request['kw_type'])&&$request['kw_type']=='name') selected @endif >商品名称</option>
             <option value="descr" @if(!empty($request['kw_type'])&&$request['kw_type']=='descr') selected @endif >商品内容</option>
            </select>
           <input type="text" aria-controls="DataTables_Table_1" name="kw" value="{{$request['kw'] or ''}}" />
           </label>
           <input type="submit" value="查询">
         </div>
    </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th>ID</th>
        <th>图片</th>
        <th style="width:200px;overflow:hidden;">名称</th>
        <th>分类</th>
        <th>数量</th>
        <th>单价</th>
        <th>操作</th>
       </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($good as $k=>$g)
      <tr class="">
        <td class="sorting_1">{{$g->id}}</td>
        <td align="center"><img src="{{$g->pic}}" width="100" height="100"></td>
        <td><a href="/goods/show/{{$g->id}}" target="_blank">{{$g->name}}</a></td>
        <td><a href="/goods/list/{{$g->cate_id}}" target="_blank">{{$g->cate_id}}</a></td>
        <td>{{$g->num}}</td>
        <td>{{$g->price}}</td>
        <td>
        <span class="btn-group">
          <form action="/admingoods/{{$g->id}}" method="post" style="display:inline-block;">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该用户吗?')";>删除</button>
          </form>
          <a class="btn btn-info" href="/admingoods/{{$g->id}}/edit">修改</a>
          <a class="btn btn-info" href="/admingoodshow/{{$g->id}}">详情</a>
          <a class="btn btn-info" href="/ping/{{$g->id}}">评价</a>
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
             {{$good->appends($request)->render()}}
         </div>
     </div>
    </div> 
   </div> 
  </div>
@endsection 
@section('title','后台商品列表')