@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改订单</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminorder/{{$data->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">订单号</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="order_num" value="{{$data->order_num}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">买家ID</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="user_id" value="{{$data->user_id}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">收货地址ID</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="address_id" value="{{$data->address_id}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="status" value="{{$data->status}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <select name="status" id="status">
          <option value="0">未付款</option>
          <option value="1">禁用</option>
          <option value="2">已付款</option>
          <option value="3">待收货</option>
          <option value="4">待评价</option>
          <option value="5">已完成</option>
          <option value="6">售后中</option>
        </select>
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field('PUT')}}
      <input type="submit" value="修改订单" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection 
@section('title','修改订单')