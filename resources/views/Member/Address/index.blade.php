@extends('Member.MemberPublic.memberpublic')
@section('member')
<div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            收货地址管理
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid">
        <!-- <div class="row-fluid"><div class="span6"><div id="dynamic-table_length" class="dataTables_length"><label><select class="form-control" size="1" name="dynamic-table_length" aria-controls="dynamic-table"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="span6"><div class="dataTables_filter" id="dynamic-table_filter"><label>Search: <input type="text" class="form-control" aria-controls="dynamic-table"></label></div></div></div> -->
        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
        <thead>
        <tr role="row">
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 186px;" aria-label="Rendering engine: activate to sort column ascending">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending">订单号</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 243px;" aria-label="Platform(s): activate to sort column ascending">收货地址</th>
            <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
            <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">评价</th>
            <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
        </tr>
        </thead>        
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">ID</th>
            <th rowspan="1" colspan="1">收件人</th>
            <th rowspan="1" colspan="1">电话</th>
            <th class="hidden-phone" rowspan="1" colspan="1">详细地址</th>
            <th class="hidden-phone" rowspan="1" colspan="1">到达城市</th>
            <th class="hidden-phone" rowspan="1" colspan="1">操作</th>
        </tr>
        </tfoot>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($address as $k=>$v)
        <tr class="gradeX odd">
            <td class=" ">{{$v->id}}</td>
            <td class=" ">{{$v->name}}</td>
            <td class=" ">{{$v->phone}}</td>
            <td class="center hidden-phone ">{{$v->zhi}}</td>
            <td class="center hidden-phone ">{{$v->city}}</td>
            <td class="center hidden-phone  sorting_1">
            <a href="/myaddress/{{$v->id}}/edit">修改</a>
            <form action="/myaddress/{{$v->id}}" method="post" style="display:inline-block;">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <button class="btn btn-success" type="submit" onclick="return confirm('确定删除该地址吗?')";>删除</button>
          </form>
            </td>
        </tr>
        @endforeach
        </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="dynamic-table_info">Showing 1 to 10 of 57 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
        </div>
        </div>
        </section>
        </div>
        </div>        
@endsection 
@section('title','地址列表 - 会员中心')