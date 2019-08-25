<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/static/adminSkin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/static/adminSkin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/static/adminSkin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/static/adminSkin/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/static/adminSkin/css/mws-theme.css" media="screen">

<title>JBW - 管理员登录</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>登录</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/adminlogin" method="post">
                @if(session('error'))
                    <p style="color:red;text-align: center;">{{session('error')}}</p>
                @endif
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="name" class="mws-login-username required" placeholder="用户名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="password" class="mws-login-password required" placeholder="密码">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">我已阅读</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        {{csrf_field()}}
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/static/adminSkin//js/libs/jquery-1.8.3.min.js"></script>
    <script src="/static/adminSkin//js/libs/jquery.placeholder.min.js"></script>
    <script src="/static/adminSkin//custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/static/adminSkin//jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/static/adminSkin//plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/static/adminSkin//js/core/login.js"></script>

</body>
</html>
