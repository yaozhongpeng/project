@extends('Member.MemberPublic.memberpublic')
@section('member')
<section class="panel">
    <header class="panel-heading custom-tab ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#home" data-toggle="tab">全部订单</a>
            </li>
            <li class="">
                <a href="#about" data-toggle="tab">待付款</a>
            </li>
            <li class="">
                <a href="#profile" data-toggle="tab">待收货</a>
            </li>
            <li class="">
                <a href="#contact" data-toggle="tab">待评价</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        全部订单
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <!-- <div class="row-fluid">
                            <div class="span6">
                                <div id="dynamic-table_length" class="dataTables_length">
                                    <label>
                                        <select class="form-control" size="1" name="dynamic-table_length" aria-controls="dynamic-table">
                                        <option value="10" selected="selected">10</option>
                                        <option value="25">25</option><option value="50">50</option>
                                        <option value="100">100</option>
                                        </select> records per page
                                    </label>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="dataTables_filter" id="dynamic-table_filter">
                                    <label>
                                        Search: <input type="text" class="form-control" aria-controls="dynamic-table">
                                    </label>
                                </div>
                            </div>
                        </div> -->

                    <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>        
                    <!-- <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">订单号</th>
                        <th rowspan="1" colspan="1">收货地址</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">状态</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">评价</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">操作</th>
                    </tr>
                    </tfoot> -->
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($orders as $k=>$v)
                    <tr class="gradeX odd">
                        <td>ID:{{$v->id}}</td>
                        <td colspan="2">订单号:{{$v->order_num}}</td>
                        <td>收货地址:{{$v->address_id}}</td>
                        <td>状态:{{$v->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods as $v1)
                        @foreach($v1 as $v2)
                        @if($v2->ogid == $v->id)
                        <tr>
                            <td align="center"><img src="{{$v2->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$v2->goods_id}}" target="_blank">{{$v2->goods_name}}</a></td>
                            <td>x {{$v2->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <a href="/pingjia/create/{{$v2->goods_id}}">评价</a>
                                <button>晒单</button>
                            </td>
                        </tr>
                        @endif   
                        @endforeach    
                        @endforeach
                        <!-- goods end  -->
                    @endforeach
                    </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="dynamic-table_info">Showing 1 to 10 of 57 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                    </div>
                    </div>
                    </section>
                  </div>
                </div> 
            </div>
            <div class="tab-pane" id="about">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        待付款订单
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
                        <th rowspan="1" colspan="1">订单号</th>
                        <th rowspan="1" colspan="1">收货地址</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">状态</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">评价</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">操作</th>
                    </tr>
                    </tfoot>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order0 as $k=>$v0)
                    <tr class="gradeX odd">
                        <td class=" ">{{$v0->id}}</td>
                        <td class=" ">{{$v0->order_num}}</td>
                        <td class=" ">{{$v0->address_id}}</td>
                        <td class="center hidden-phone ">{{$v0->status}}</td>
                        <td class="center hidden-phone ">好评</td>
                        <td class="center hidden-phone  sorting_1"><button>操作</button></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <ul>
                                <li>待付款商品</li>
                                <li>待付款商品</li>
                            </ul>
                        </td>
                        <td>立即付款</td>
                    </tr>
                    @endforeach
                    </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="dynamic-table_info">Showing 1 to 10 of 57 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                    </div>
                    </div>
                    </section>
                  </div>
                </div>  
            </div>
            <div class="tab-pane" id="profile">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        待收货订单
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
                        <th rowspan="1" colspan="1">订单号</th>
                        <th rowspan="1" colspan="1">收货地址</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">状态</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">评价</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">操作</th>
                    </tr>
                    </tfoot>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order3 as $k=>$v3)
                    <tr class="gradeX odd">
                        <td class=" ">{{$v3->id}}</td>
                        <td class=" ">{{$v3->order_num}}</td>
                        <td class=" ">{{$v3->address_id}}</td>
                        <td class="center hidden-phone ">{{$v3->status}}</td>
                        <td class="center hidden-phone ">好评</td>
                        <td class="center hidden-phone  sorting_1"><button>确认收货</button></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <ul>
                                <li>待收货商品</li>
                                <li>待收货商品</li>
                            </ul>
                        </td>
                        <td>确认收货</td>
                    </tr>
                    @endforeach
                    </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="dynamic-table_info">Showing 1 to 10 of 57 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                    </div>
                    </div>
                    </section>
                  </div>
                </div>
            </div>
            <div class="tab-pane" id="contact">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        待评价订单
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
                        <th rowspan="1" colspan="1">订单号</th>
                        <th rowspan="1" colspan="1">收货地址</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">状态</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">评价</th>
                        <th class="hidden-phone" rowspan="1" colspan="1">操作</th>
                    </tr>
                    </tfoot>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order4 as $k4=>$v4)
                    <tr class="gradeX odd">
                        <td class=" ">{{$v4->id}}</td>
                        <td class=" ">{{$v4->order_num}}</td>
                        <td class=" ">{{$v4->address_id}}</td>
                        <td class="center hidden-phone ">{{$v4->status}}</td>
                        <td class="center hidden-phone ">好评</td>
                        <td class="center hidden-phone  sorting_1"><a href="/pingjia/create/{{$v4->id}}">操作</a></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <ul>
                                <li>待评价商品</li>
                                <li>待评价商品</li>
                            </ul>
                        </td>
                        <td>立即评价</td>
                    </tr>
                    @endforeach
                    </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="dynamic-table_info">Showing 1 to 10 of 57 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                    </div>
                    </div>
                    </section>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>     
@endsection 
@section('title','订单列表 - 会员中心')