@extends('Member.MemberPublic.memberpublic')
@section('member')
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<div class="panel-body">
    <div class=" form">
        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="/myaddress/{{$address->id}}" novalidate="novalidate">
            <div class="form-group ">
                <label for="curl" class="control-label col-lg-1">姓名</label>
                <div class="col-lg-10">
                    <input class="form-control" id="curl" type="text" name="name" value="{{$address->name}}">
                </div>
            </div>
            <div class="form-group ">
                <label for="curl" class="control-label col-lg-1">电话</label>
                <div class="col-lg-10">
                    <input class="form-control" id="curl" type="text" name="phone" value="{{$address->phone}}">
                </div>
            </div>
            <div class="form-group ">
                <label for="curl" class="control-label col-lg-1">收货城市</label>
                <div class="col-lg-10">
                    <select name="city" id="cid"> 
                      <option value="" class="ss">-请选择-</option>
                    </select>
                </div>
            </div>
            <div class="form-group ">
                <label for="ccomment" class="control-label col-lg-1">详细地址</label>
                <div class="col-lg-10">
                    <textarea class="form-control" id="ccomment" name="zhi" required="" value="{{$address->zhi}}">{{$address->zhi}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-10">
                {{csrf_field()}}
                {{method_field('PUT')}} 
                    <button class="btn btn-primary" type="submit">提交</button>
                    <button class="btn btn-default" type="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
  // alert($);
  //第一级数据
    $.ajax({
      url:'/address',//url地址
      type:'get',//请求方式
      data:{upid:0},
      async:true,//异步处理
      dataType:'json',//返回响应数据类型
      //Ajax 响应成功匿名函数
      success:
      function(data){
        // alert(data);
        //遍历
        for(var i=0;i<data.length;i++){
          $(".ss").attr("disabled",true);
          // alert(data[i].name);
          //存储在option
          option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
          // alert(option);
          // 把带有数据的option内部插入到第一个select
          $("#cid").append(option);
        }
      },
      // Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });

    // 获取其他几级数据 
    // 事件委派 live(事件,事件处理器函数)
    $("select").live("change",function(){
      // 移除元素
      $(this).nextAll("select").remove();
      // alert($(this).val());
      o=$(this);
      // 获取子级的upid
      upid=$(this).val();
      // alert(upid);
      $.ajax({
      url:'/address',// url地址
      type:'get', // 请求方式
      data:{upid:upid},
      async:true, // 异步处理
      dataType:'json', // 返回响应数据类型
      // Ajax 响应成功匿名函数
      success:
      function(data){
        // 创建select
        select=$("<select></select>");
        // 内部插入option
        select.append('<option value="" class="mm">--请选择--</option>');
        // alert(data);
        // 判断
        if(data.length>0){
          // 遍历
          for(var i=0;i<data.length;i++){
            // alert(data[i].name);
            //存储在option
            option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            // alert(option);
            // 把带有数据的option内部插入到创建好的select
            select.append(option);
          }
          //把创建好的select 追加到前一个select后
          o.after(select);
          //禁用其他级别 请选择
          $(".mm").attr("disabled",true);
        }

      },
      //Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });
});
</script>        
@endsection 
@section('title','修改收货地址 - 会员中心')