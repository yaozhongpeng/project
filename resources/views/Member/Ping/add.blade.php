@extends('Member.MemberPublic.memberpublic')
@section('member')
<script type="text/javascript" charset="utf-8" src="/static/AdminSkin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/AdminSkin/ueditor/ueditor.all.min.js">
</script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加
载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/AdminSkin/ueditor/lang/zh-cn/zh-cn.js">
</script>
<div class="panel-body">
    <div class=" form">
        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="/pingjia" novalidate="novalidate">
            <div class="form-group ">
                <label for="curl" class="control-label col-lg-1">评价等级</label>
                <div class="col-lg-10">
                    <select name="p_level" id="p_level">
                        <option value="1">好评</option>
                        <option value="2">中评</option>
                        <option value="3">差评</option>
                    </select>
                </div>
            </div>
            <div class="form-group ">
            <input type="hidden" name="goods_id" value="{{$id}}">
                <label for="curl" class="control-label col-lg-1">主题</label>
                <div class="col-lg-10">
                    <input class="form-control" id="curl" type="text" name="subject">
                </div>
            </div>
            <div class="form-group ">
                <label for="ccomment" class="control-label col-lg-1">评价内容</label>
                <div class="col-lg-10">
                    <script id="editor" type="text/plain" name="descr" style="width:880px;height:300px;"></script>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-10">{{csrf_field()}} 
                    <button class="btn btn-primary" type="submit">发表评价</button>
                    <button class="btn btn-default" type="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    // 实例化编辑器
    // 建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接
    // 调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>    
@endsection 
@section('title','发表评价 - 会员中心')