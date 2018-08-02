<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link rel="stylesheet" href="../Public/Css/loginindex.css">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script>
        var login="<?php echo U('Login/login');?>";
        var error1="<?php echo ($_GET['error1']); ?>";
        var error2="<?php echo ($_GET['error2']); ?>"
    </script>
    <script src="../Public/Js/loginindex.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><strong class="text-black">资讯网</strong></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">文章<span class="sr-only">(current)</span></a></li>
                <li><a href="#">站点</a></li>
                <li><a href="#">主题</a></li>
                <li><a href="#">活动</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
            <ul class="nav navbar-nav">
                <li><a href="">登录</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <p class="introduction">
                资讯网是专注于科技领域的个性阅读社区，希望能为来到这里的IT人提供一站式的个性阅读空间。
                我们没有小编，纯凭技术从每时每刻产生的众多的科技资讯、技术文章、产品设计等内容中，
                利用智能算法，经过层层过滤筛选，准实时地推荐给你最感兴趣的内容
        </p>
        <div class="btn-box">
                <button class="btn">注册新用户</button>
                <button class="btn">随便看看</button>
        </div>
        <div class="log-box">
            <h1>登录</h1>
            <form method="post" action="__URL__/indexcheck">
                <p class="error1"></p>
                <div class="form-group">
                    <input type="text" name="user" placeholder="用户名" class="auth">

                </div>
                <p class="err"><img src="../Public/Images/2017-01-10_002144.png">用户名不能为空</p>
                <div class="form-group">
                    <input type="password" name="password" placeholder="密码" class="auth">

                </div>
                <p class="err"><img src="../Public/Images/2017-01-10_002144.png">密码不能为空</p>
                <div class="form-group">
                    <input type="checkbox" name="rem" value="1" checked>
                    <img src="../Public/Images/2017-01-07_203526.png" class="bimg">
                    <span>记住我</span>
                </div>
                <div class="form-group">
                    <input type="submit" value="登录">
                </div>
            </form>
        </div>
    </div>
</body>
</html>