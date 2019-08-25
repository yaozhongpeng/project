@extends('Admin.AdminPublic.adminpublic')
@section('admin') 
<html>
 <head></head>
<script type="text/javascript" charset="utf-8" src="/static/AdminSkin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/AdminSkin/ueditor/ueditor.all.min.js">
</script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加
载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/AdminSkin/ueditor/lang/zh-cn/zh-cn.js">
</script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>后台商品修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admingoods/{{$good->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline">
      <div class="mws-form-row"> 
       <label class="mws-form-label">所属分类</label> 
       <div class="mws-form-item">
       <select name="cate_id">
         <option value="0">--请选择--</option>
         @foreach($cate as $k=>$c)
         <option value="{{$c->id}}" @if($good->cate_id == $c->id) selected @endif >{{$c->name}}</option>
         @endforeach
       </select>  
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{$good->name}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品数量</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="num" value="{{$good->num}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品价格</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="price" value="{{$good->price}}" /> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">商品图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="small" name="pic" value="{{$good->pic}}" />
        <img src="{{$good->pic}}"><br>
        {{$good->pic}} 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label">商品描述</label> 
       <div class="mws-form-item"> 
          <script id="editor" type="text/plain" name="descr" style="width:800px;height:350px;">
            {!!$good->descr!!}
          </script>
       </div> 
      </div>
     <div class="mws-button-row">
     {{csrf_field()}}
     {{method_field('PUT')}}
      <input type="submit" value="修改商品" class="btn btn-danger" /> 
      <input type="reset" value="重 置" class="btn" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
    // 实例化编辑器
    // 建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接
    // 调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
  </script>
</html>
@endsection 
@section('title','后台商品修改')