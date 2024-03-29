<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
 <!--<![endif]-->
 <head> 
  <meta charset="utf-8" /> 
  <!-- Viewport Metatag --> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0" /> 
  <!-- Plugin Stylesheets first to ease overrides --> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/plugins/colorpicker/colorpicker.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/custom-plugins/wizard/wizard.css" media="screen" /> 
  <!-- Required Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/bootstrap/css/bootstrap.min.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/fonts/ptsans/stylesheet.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/fonts/icomoon/style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/mws-style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/icons/icol16.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/icons/icol32.css" media="screen" /> 
  <!-- Demo Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/demo.css" media="screen" /> 
  <!-- jQuery-UI Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/jui/css/jquery.ui.all.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/jui/jquery-ui.custom.css" media="screen" /> 
  <!-- Theme Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/mws-theme.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/themer.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/adminSkin/css/my.css" media="screen" /> 
  <title>@yield('title')</title> 
 </head> 
 <body> 
  <!-- Header --> 
  <div id="mws-header" class="clearfix"> 
   <!-- Logo Container --> 
   <div id="mws-logo-container"> 
    <!-- Logo Wrapper, images put within this wrapper will always be vertically centered --> 
    <div id="mws-logo-wrap"> 
     <img src="/static/adminSkin/images/mws-logo.png" alt="mws admin" />  
    </div>
   </div> 
   <!-- User Tools (notifications, logout, profile, change password) --> 
   <div id="mws-user-tools" class="clearfix">
    <a href="/admin">后台首页</a>&nbsp;&nbsp;
    <a href="/homeindex" target="_blank">前台首页</a> 
    <!-- Notifications --> 
    <div id="mws-user-notif" class="mws-dropdown-menu">
     <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a> 
     <!-- Unread notification count --> 
     <span class="mws-dropdown-notif">35</span> 
     <!-- Notifications dropdown --> 
     <div class="mws-dropdown-box"> 
      <div class="mws-dropdown-content"> 
       <ul class="mws-notifications"> 
        <li class="read"> <a href="#"> <span class="message"> Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore </span> <span class="time"> January 21, 2012 </span> </a> </li> 
        <li class="read"> <a href="#"> <span class="message"> Lorem ipsum dolor sit amet </span> <span class="time"> January 21, 2012 </span> </a> </li> 
        <li class="unread"> <a href="#"> <span class="message"> Lorem ipsum dolor sit amet </span> <span class="time"> January 21, 2012 </span> </a> </li> 
        <li class="unread"> <a href="#"> <span class="message"> Lorem ipsum dolor sit amet </span> <span class="time"> January 21, 2012 </span> </a> </li> 
       </ul> 
       <div class="mws-dropdown-viewall"> 
        <a href="#">View All Notifications</a> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!-- Messages --> 
    <div id="mws-user-message" class="mws-dropdown-menu"> 
     <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a> 
     <!-- Unred messages count --> 
     <span class="mws-dropdown-notif">35</span> 
     <!-- Messages dropdown --> 
     <div class="mws-dropdown-box"> 
      <div class="mws-dropdown-content"> 
       <ul class="mws-messages"> 
        <li class="read"> <a href="#"> <span class="sender">John Doe</span> <span class="message"> Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore </span> <span class="time"> January 21, 2012 </span> </a> </li> 
        <li class="read"> <a href="#"> <span class="sender">John Doe</span> <span class="message"> Lorem ipsum dolor sit amet </span> <span class="time"> January 21, 2012 </span> </a> </li> 
        <li class="unread"> <a href="#"> <span class="sender">John Doe</span> <span class="message"> Lorem ipsum dolor sit amet </span> <span class="time"> January 21, 2012 </span> </a> </li> 
        <li class="unread"> <a href="#"> <span class="sender">John Doe</span> <span class="message"> Lorem ipsum dolor sit amet </span> <span class="time"> January 21, 2012 </span> </a> </li> 
       </ul> 
       <div class="mws-dropdown-viewall"> 
        <a href="#">View All Messages</a> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!-- User Information and functions section --> 
    <div id="mws-user-info" class="mws-inset"> 
     <!-- User Photo --> 
     <div id="mws-user-photo"> 
      <img src="/static/adminSkin/example/profile.jpg" alt="User Photo" /> 
     </div> 
     <!-- Username and Functions --> 
     <div id="mws-user-functions"> 
      <div id="mws-username">
        Hello, {{session('adminname')}} 
      </div> 
      <ul> 
       <li><a href="#">Profile</a></li> 
       <li><a href="#">修改密码</a></li> 
       <li><a href="/adminlogin">退出</a></li> 
      </ul> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- Start Main Wrapper --> 
  <div id="mws-wrapper"> 
   <!-- Necessary markup, do not remove --> 
   <div id="mws-sidebar-stitch"></div> 
   <div id="mws-sidebar-bg"></div> 
   <!-- Sidebar Wrapper --> 
   <div id="mws-sidebar"> 
    <!-- Hidden Nav Collapse Button --> 
    <div id="mws-nav-collapse"> 
     <span></span> 
     <span></span> 
     <span></span> 
    </div> 
    <!-- Searchbox --> 
    <div id="mws-searchbox" class="mws-inset"> 
     <form action="typography.html"> 
      <input type="text" class="mws-search-input" placeholder="Search..." /> 
      <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button> 
     </form> 
    </div> 
    <!-- Main Navigation --> 
    <div id="mws-navigation"> 
     <ul> 
      <li> <a href="#"><i class="icon-add-contact"></i> 管理员管理</a> 
       <ul class="closed"> 
        <li><a href="/adminusers/create">添加管理员</a></li> 
        <li><a href="/adminusers">管理员列表</a></li>  
       </ul> </li>

       <li> <a href="#"><i class="icon-pacman"></i> 角色管理</a> 
       <ul class="closed">
        <li><a href="/role/create">角色添加</a></li> 
        <li><a href="/role">角色列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-cogs"></i> 权限管理</a> 
       <ul class="closed">
        <li><a href="/auth/create">权限添加</a></li> 
        <li><a href="/auth">权限列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-user"></i> 会员模型管理</a> 
       <ul class="closed"> 
        <li><a href="/adminuser/create">会员模型添加</a></li> 
        <li><a href="/adminuser">会员模型列表</a></li> 
       </ul> </li> 

      <li> <a href="#"><i class="icon-th-list"></i> 分类管理</a> 
       <ul class="closed"> 
        <li><a href="/admincate/create">添加分类</a></li> 
        <li><a href="/admincate">分类列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-bullhorn"></i> 公告管理</a> 
       <ul class="closed"> 
        <li><a href="/adminarticle/create">添加公告</a></li> 
        <li><a href="/adminarticle">公告列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-bullhorn"></i> Redis 公告管理</a> 
       <ul class="closed"> 
        <li><a href="/adminarticleredis/create">Redis添加公告</a></li> 
        <li><a href="/adminarticleredis">Redis公告列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-pictures"></i> 轮播图管理</a> 
       <ul class="closed"> 
        <li><a href="/adminimg/create">添加轮播图</a></li> 
        <li><a href="/adminimg">轮播图列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-font"></i> 广告管理</a> 
       <ul class="closed"> 
        <li><a href="/adminad/create">添加广告</a></li> 
        <li><a href="/adminad">广告列表</a></li> 
       </ul> </li>
        
      <li> <a href="#"><i class="icon-folder-closed"></i> 资讯管理</a> 
       <ul class="closed"> 
        <li><a href="/adminnews/create">资讯添加</a></li> 
        <li><a href="/adminnews">资讯列表</a></li> 
       </ul> </li>
        
      <li> <a href="#"><i class="icon-folder-closed"></i> 商品管理</a> 
       <ul class="closed"> 
        <li><a href="/admingoods/create">商品添加</a></li> 
        <li><a href="/admingoods">商品列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-folder-closed"></i> 订单管理</a> 
       <ul class="closed"> 
        <li><a href="/adminorder/create">订单添加</a></li> 
        <li><a href="/adminorder">订单列表</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-folder-closed"></i> 搜索词维护</a> 
       <ul class="closed"> 
        <li><a href="/adminkw">关键词列表</a></li>
        <li><a href="/adminkw/create">关键词添加</a></li> 
       </ul> </li>

       <li> <a href="#"><i class="icon-link"></i> 友情链接管理</a> 
       <ul class="closed"> 
        <li><a href="/adminlink/create">添加友情链接</a></li> 
        <li><a href="/adminlink">友情链接列表</a></li> 
       </ul> </li>

     </ul> 
    </div> 
   </div> 
   <!-- Main Container Start --> 
   <div id="mws-container" class="clearfix"> 
    <div class="container">
    <!-- 校验错误消息提示start -->
    @if (count($errors) > 0)
          <div class="mws-form-message error">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
    @endif
    <!-- 校验错误消息提示end -->
    
    <!-- 成功提示start -->
     @if(session('success'))
        <div class="mws-form-message success">
          {{session('success')}}
        </div>
     @endif
     <!-- 成功提示end -->

     <!-- 失败提示start -->
     @if(session('error'))
        <div class="mws-form-message warning">
          {{session('error')}}
        </div>
     @endif
     <!-- 失败提示end --> 

    <!-- 主题内容start -->
     @section('admin')
     @show
     <!-- 主题内容end -->

     <!-- Panels End --> 
    </div> 
    <!-- footer --> 
    <div id="mws-footer">
      Copyright Your Website 2012. All Rights Reserved. 
    </div> 
   </div> 
   <!-- Main Container End --> 
  </div> 
  <!-- JavaScript Plugins --> 
  <script src="/static/adminSkin/js/libs/jquery-1.8.3.min.js"></script> 
  <script src="/static/adminSkin/js/libs/jquery.mousewheel.min.js"></script> 
  <script src="/static/adminSkin/js/libs/jquery.placeholder.min.js"></script> 
  <script src="/static/adminSkin/custom-plugins/fileinput.js"></script> 
  <!-- jQuery-UI Dependent Scripts --> 
  <script src="/static/adminSkin/jui/js/jquery-ui-1.9.2.min.js"></script> 
  <script src="/static/adminSkin/jui/jquery-ui.custom.min.js"></script> 
  <script src="/static/adminSkin/jui/js/jquery.ui.touch-punch.js"></script> 
  <!-- Plugin Scripts --> 
  <script src="/static/adminSkin/plugins/datatables/jquery.dataTables.min.js"></script> 
  <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]--> 
  <script src="/static/adminSkin/plugins/flot/jquery.flot.min.js"></script> 
  <script src="/static/adminSkin/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script> 
  <script src="/static/adminSkin/plugins/flot/plugins/jquery.flot.pie.min.js"></script> 
  <script src="/static/adminSkin/plugins/flot/plugins/jquery.flot.stack.min.js"></script> 
  <script src="/static/adminSkin/plugins/flot/plugins/jquery.flot.resize.min.js"></script> 
  <script src="/static/adminSkin/plugins/colorpicker/colorpicker-min.js"></script> 
  <script src="/static/adminSkin/plugins/validate/jquery.validate-min.js"></script> 
  <script src="/static/adminSkin/custom-plugins/wizard/wizard.min.js"></script> 
  <!-- Core Script --> 
  <script src="/static/adminSkin/bootstrap/js/bootstrap.min.js"></script> 
  <script src="/static/adminSkin/js/core/mws.js"></script> 
  <!-- Themer Script (Remove if not needed) --> 
  <script src="/static/adminSkin/js/core/themer.js"></script> 
  <!-- Demo Scripts (remove if not needed) --> 
  <script src="/static/adminSkin/js/demo/demo.dashboard.js"></script>  
 </body>
</html>