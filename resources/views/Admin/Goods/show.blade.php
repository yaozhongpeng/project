@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<div class="mws-tabs ui-tabs ui-widget ui-widget-content ui-corner-all">

                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-1" aria-labelledby="ui-id-2" aria-selected="true"><a href="#tab-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">评价</a></li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-2" aria-labelledby="ui-id-3" aria-selected="false"><a href="#tab-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Tab 2</a></li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-3" aria-labelledby="ui-id-4" aria-selected="false"><a href="#tab-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">Tab 3</a></li>
                        </ul>
                        
                        <div id="tab-1" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
                            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_1_length" class="dataTables_length"><label>Show <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_filter" id="DataTables_Table_1_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_1"></label></div><table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 167px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 199px;" aria-label="Browser: activate to sort column ascending">User_id</th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Platform(s): activate to sort column ascending">主题</th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 140px;" aria-label="Engine version: activate to sort column ascending">详细</th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 106px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($show as $k=>$v)
                                <tr class="@if($k%2==0) odd @else even @endif">
                                    <td class="  sorting_1">{{$v->id}}</td>
                                    <td class=" ">{{$v->user_id}}</td>
                                    <td class=" ">{{$v->subject}}</td>
                                    <td class=" ">{!!$v->descr!!}</td>
                                    <td class=" ">
                                        <button>详情</button>
                                        <button>修改</button>
                                        <button>删除</button>
                                    </td>
                                </tr>
                        @endforeach     
                        </tbody>
                        </table><div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a><a tabindex="0" class="paginate_button">3</a><a tabindex="0" class="paginate_button">4</a><a tabindex="0" class="paginate_button">5</a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">Next</a><a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">Last</a></div></div>
                        </div>
                        
                        <div id="tab-2" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
                            <p>Praesent eu mauris ac felis molestie dictum. Sed volutpat ullamcorper iaculis. Praesent sed accumsan massa. Donec molestie vulputate massa vitae viverra. Nulla vitae hendrerit urna. Ut sit amet lectus non nunc venenatis vehicula et ut justo. Phasellus varius quam eu felis feugiat non consequat magna fermentum. Pellentesque consequat risus non est aliquam eu consectetur dui laoreet. Aliquam turpis est, aliquam non pellentesque ac, volutpat id nisi.</p>
                        </div>
                        
                        <div id="tab-3" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
                            <p>Suspendisse lacinia euismod ligula. Nullam sed est sem, nec sodales erat. Phasellus ipsum orci, scelerisque non faucibus ac, hendrerit ut massa. Praesent ornare justo non turpis convallis sit amet porta urna adipiscing. Donec ac neque non risus tristique commodo non et neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris tincidunt augue vitae risus lacinia sed tempor ligula dapibus. Proin et turpis lacus, eget convallis risus.</p>
                        </div>
                    </div>
@endsection 
@section('title','后台商品评价列表')