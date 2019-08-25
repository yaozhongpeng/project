@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m">
    <div class=""> 
    </div> 
    <form class="" action="/checkpcode" method="post"> 
        手机号:<input type="text" name="phone" id="phone" placeholder="请输入注册手机号"/><span></span><br>
        验证码:<input type="text" name="pcode" id="pcode" placeholder="请输入收到的验证码"><span></span><a href="javascript:void(0)" id="btn-code">获取验证码</a><br>
        {{csrf_field()}}
        <input type="submit" value="下一步,重置密码">
    </form>
</div>
<script type="text/javascript">
  // alert($);
  o = $(this);
  // 手机号输入框失去焦点事件
  $("input[name='phone']").blur(function(){
    o = $(this); // Ajax 中不能解析$(this),赋值给变量
    p = $(this).val(); // 获取输入手机号
    // alert(p);
    if (p.match(/^\d{11}$/) == null) {
      // alert('手机号格式不正确');
      $(this).next('span').css('color','red').html('手机号格式不正确');
    }else{
      // alert('手机号格式正确');
      // 检测手机号是否唯一
      $.get('/dophone',{phone:p},function(data){
        // alert(data);
        if (data == 1) {
          o.next('span').css('color','green').html('手机号已注册');
          $('#btn-code').attr("disabled",false).html('获取');
        }else if(data == 0){
          o.next('span').css('color','red').html('手机号未注册');
          $('#btn-code').attr("disabled",true).html('手机号不存在无法获取');
        }
      });
    }
  });

  // 获取发送短信按钮
  $("#btn-code").click(function(){
      oo=$(this);
      // 获取输入手机号
      pp = $('#phone').val();
      // alert(pp);
      // Ajax 调用发送短信方法
      $.get('/dophonesendphone',{pp:pp},function(data){
          // alert(data);
          // alert(data.code);
          if(data.code == 000000){
              m = 60;
              // 按钮的倒计时
              mytime = setInterval(function(){
                  m--;
                  // 赋值给按钮
                  oo.html(m);
                  // 禁用按钮
                  oo.attr("disabled",true);
                  // 判断
                  if(m < 1){
                      // 清除定时器
                      clearInterval(mytime);
                      oo.html("发送");
                      oo.attr("disabled",false);
                  }
              },1000);
          }
      },'json');
  });

    // 检测短信验证码
    $('#pcode').blur(function(){
        pp = $(this);
        // 获取输入的验证码
        code = $(this).val();
        $.get('/checkpcode',{code:code},function(data){
            if (data == 1) {
                pp.next('span').css('color','green').html('校验码一致');
            }else if(data == 0){
                pp.next('span').css('color','red').html('校验码不一致');
            }
        });
    });
</script>
@endsection 
@section('title','手机找回密码')