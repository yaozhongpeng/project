@extends('Home.HomePublic.homepublic')
@section('home')
<div class="m">
<div class="b20"></div>
  <table border="1">
  <caption><b>您已付款成功</b></caption>
    <tr>
      <td>付款金额</td>
      <td><em>&yen;{{$tot}}</em></td>
    </tr>
    <tr>
      <td>收件人</td>
      <td>{{$address->name}}</td>
    </tr>
    <tr>
      <td>联系电话</td>
      <td>{{$address->phone}}</td>
    </tr>
    <tr>
      <td>收货地址</td>
      <td>{{$address->zhi}}</td>
    </tr>
    <tr>
      <td colspan="2">友情提示:请认真核对商品相关信息，如有疑问请联系客服</td>
    </tr>
  </table>
<div class="b20"></div>  
</div>
@endsection 
@section('title','结算页')