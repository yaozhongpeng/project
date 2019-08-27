@extends('Member.MemberPublic.memberpublic')
@section('member')
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
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
                <a href="#about1" data-toggle="tab">已付款</a>
            </li>
            <li class="">
                <a href="#profile" data-toggle="tab">待收货</a>
            </li>
            <li class="">
                <a href="#contact" data-toggle="tab">待评价</a>
            </li>
            <li class="">
                <a href="#over" data-toggle="tab">已完成</a>
            </li>
            <li class="">
                <a href="#service" data-toggle="tab"><span style="color:red;">售后中</span></a>
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
                            <td>
                            @if($v->status==0)
                            未付款 
                            @elseif($v->status==2)
                            已付款
                            @elseif($v->status==3)
                            待收货
                            @elseif($v->status==4)
                            待评价
                            @elseif($v->status==5)
                            已完成
                            @elseif($v->status==6)
                            售后中
                            @endif
                            </td>
                            <td>
                            xxoo
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>        
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order0 as $k0=>$v0)
                    <tr class="gradeX odd">
                        <td>ID:{{$v0->id}}</td>
                        <td colspan="2">订单号:{{$v0->order_num}}</td>
                        <td>收货地址:{{$v0->address_id}}</td>
                        <td>状态:{{$v0->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods0 as $v1)
                        @foreach($v1 as $v2)
                        @if($v2->ogid == $v0->id)
                        <tr>
                            <td align="center"><img src="{{$v2->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$v2->goods_id}}" target="_blank">{{$v2->goods_name}}</a></td>
                            <td>x {{$v2->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <!-- <a href="/pinglun/create/{{$v2->goods_id}}">评价</a> -->
                                <button>立即付款</button>
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
            <div class="tab-pane" id="about1">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        已付款订单
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>       
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order2 as $k2=>$v2)
                    <tr class="gradeX odd">
                        <td>ID:{{$v2->id}}</td>
                        <td colspan="2">订单号:{{$v2->order_num}}</td>
                        <td>收货地址:{{$v2->address_id}}</td>
                        <td>状态:{{$v2->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods2 as $b)
                        @foreach($b as $c)
                        @if($c->ogid == $v2->id)
                        <tr>
                            <td align="center"><img src="{{$c->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$c->goods_id}}" target="_blank">{{$c->goods_name}}</a></td>
                            <td>x {{$c->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <!-- <a href="/pinglun/create/{{$c->goods_id}}">评价</a> -->
                                <button onclick="return confirm('你确定要骚扰美女掌柜吗?')";>提醒发货</button>
                                <button onclick="return confirm('你确定让美女掌柜伤心吗?')";>取消订单</button>
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>        
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order3 as $k3=>$v3)
                    <tr class="gradeX odd">
                        <td>ID:{{$v3->id}}</td>
                        <td colspan="2">订单号:{{$v3->order_num}}</td>
                        <td>收货地址:{{$v3->address_id}}</td>
                        <td>状态:{{$v3->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods3 as $i)
                        @foreach($i as $j)
                        @if($j->ogid == $v3->id)
                        <tr>
                            <td align="center"><img src="{{$j->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$j->goods_id}}" target="_blank">{{$j->goods_name}}</a></td>
                            <td>x {{$j->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <!-- <a href="/pinglun/create/{{$j->goods_id}}">评价</a> -->
                                <button onclick="return confirm('你确定看吗?别失望哦')";>查看物流</button>
                                <button >确认收货</button>
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>        
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order4 as $k4=>$v4)
                    <tr class="gradeX odd">
                        <td>ID:{{$v4->id}}</td>
                        <td colspan="2">订单号:{{$v4->order_num}}</td>
                        <td>收货地址:{{$v4->address_id}}</td>
                        <td>状态:{{$v4->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods4 as $v1)
                        @foreach($v1 as $v2)
                        @if($v2->ogid == $v4->id)
                        <tr>
                            <td align="center"><img src="{{$v2->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$v2->goods_id}}" target="_blank">{{$v2->goods_name}}</a></td>
                            <td>x {{$v2->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <a href="/pinglun/create/{{$v2->goods_id}}">评价</a>
                                <button onclick="return confirm('你还有空晒单呢?好好敲代码吧')";>晒单</button>
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
            <div class="tab-pane" id="over">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        已完成订单
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>        
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order5 as $k5=>$v5)
                    <tr class="gradeX odd">
                        <td>ID:{{$v5->id}}</td>
                        <td colspan="2">订单号:{{$v5->order_num}}</td>
                        <td>收货地址:{{$v5->address_id}}</td>
                        <td>状态:{{$v5->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods5 as $v1)
                        @foreach($v1 as $v2)
                        @if($v2->ogid == $v5->id)
                        <tr>
                            <td align="center"><img src="{{$v2->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$v2->goods_id}}" target="_blank">{{$v2->goods_name}}</a></td>
                            <td>x {{$v2->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <!-- <a href="/pinglun/create/{{$v2->goods_id}}">评价</a> -->
                                <button onclick="return confirm('你确定申请售后吗?')";>申请售后</button>
                                <button onclick="return confirm('你确定把它卖了吗?')";>卖了换钱</button>
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
            <div class="tab-pane" id="service">
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel">
                    <header class="panel-heading">
                        售后中订单
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 120px;" aria-label="Rendering engine: activate to sort column ascending">近期订单</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 268px;" aria-label="Browser: activate to sort column ascending" colspan="3">订单详情</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">收货人</th>
                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 156px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                        <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" style="width: 107px;" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                    </thead>        
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($order6 as $k6=>$v6)
                    <tr class="gradeX odd">
                        <td>ID:{{$v6->id}}</td>
                        <td colspan="2">订单号:{{$v6->order_num}}</td>
                        <td>收货地址:{{$v6->address_id}}</td>
                        <td>状态:{{$v6->status}}</td>
                        <td>删</td>
                    </tr>
                    <!-- goods start -->
                        @foreach($order_goods6 as $v1)
                        @foreach($v1 as $v2)
                        @if($v2->ogid == $v6->id)
                        <tr>
                            <td align="center"><img src="{{$v2->pic}}" width="60" height="60"></td>
                            <td><a href="/goods/show/{{$v2->goods_id}}" target="_blank">{{$v2->goods_name}}</a></td>
                            <td>x {{$v2->num}}</td>
                            <td>xxoo</td>
                            <td>ooxx</td>
                            <td>
                                <!-- <a href="/pinglun/create/{{$v2->goods_id}}">评价</a> -->
                                <button onclick="return confirm('你忍心骚扰客服小妹吗?')";>售后中...</button>
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
        </div>
    </div>
</section>
<script type="text/javascript">
    alert($);
</script>     
@endsection 
@section('title','订单列表 - 会员中心')