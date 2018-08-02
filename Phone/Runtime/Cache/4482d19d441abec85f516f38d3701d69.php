<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/login.css" rel="stylesheet">
    <link href="../Public/Css/register.css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/register.js"></script>
    <script>
        if("<?php echo ($_GET['error']); ?>"){
            $('.error1').html("<?php echo ($_GET['error']); ?>").show();
        }
    </script>
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
            <a class="navbar-brand" href="__APP__/Index/index"><strong class="text-black">资讯网</strong></a>
        </div>
        <li class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(MODULE_NAME == 'Article'): ?><li class="active"><a href="<?php echo U('Article/index');?>" style="color: #16A085">文章</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Article/index');?>">文章</a> </li><?php endif; ?>
                <?php if(MODULE_NAME == 'Site'): ?><li><a href="<?php echo U('Site/index');?>" style="color: #16A085">站点</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Site/index');?>">站点</a> </li><?php endif; ?>
                <li><a href="#">主题</a></li>
                <li><a href="#">活动</a></li>
            </ul>
            <form class="navbar-form navbar-left form-inline" action="<?php echo U('Search/index');?>" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索" name="artkey">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <?php if(!isset($_SESSION['user_id'])): ?><a href="__APP__/Login/login">登录</a>
                    <?php else: ?>
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if($_SESSION['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg" class="head" width="60px" height="40px">
                        <?php else: ?>
                        <img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>" width="60px" height="40px" alt="" class="head"><?php endif; ?>
                        <span><?php echo ($_SESSION['username']); ?></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="__APP__/Person/myindex/id/<?php echo ($_SESSION['user_id']); ?>/name/<?php echo ($_SESSION['username']); ?>">我的主页</a> </li>
                        <li><a href="__APP__/Person/mycoll/id/<?php echo ($_SESSION['user_id']); ?>">我的收藏</a></li>
                        <li><a href="__APP__/Person/settings/id/<?php echo ($_SESSION['user_id']); ?>">个人设置</a></li>
                        <li><a href="__APP__/Person/message/id/<?php echo ($_SESSION['user_id']); ?>">消息通知</a></li>
                        <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
                    </ul><?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="backtop"></div>

    <div class="container main">
        <div class="row">
            <section>
                <h1>账号信息</h1>
                <p class="error1"></p>
                <form action="__URL__/recheck" method="post">
                    <div class="form-group">
                        <label class="xi">邮箱</label>
                        <input type="text" name="email" class="auth" placeholder="比如：******@163.com163">
                    </div>
                  <p class="err"><img src="../Public/Images/2017-01-10_002144.png">邮箱格式有误</p>
                    <div class="form-group">
                        <label class="by">用户名</label>
                        <input type="text" name="user" class="auth">
                    </div>
                    <p class="err"><img src="../Public/Images/2017-01-10_002144.png">用户名长度需要在7到24个字符间</p>
                    <div class="form-group">
                        <label class="xi">密码</label>
                        <input type="password" name="password" class="auth">
                    </div>
                    <p class="err"><img src="../Public/Images/2017-01-10_002144.png">密码需在6到20字符间</p>
                    <div class="form-group">
                        <label>重复密码</label>
                        <input type="password" name="repassword" class="auth">
                    </div>
                    <p class="err"><img src="../Public/Images/2017-01-10_002144.png">两次密码不一致</p>
                    <div class="form-group">
                        <label class="by">验证码</label>
                        <input type="text" name="verify" class="auth">
                        <img src="__URL__/verify" onclick="this.src='__URL__/verify/'+Math.random()">
                     </div>
                    <p class="err"><img src="../Public/Images/2017-01-10_002144.png">验证码有误</p>
                    <div class="form-group">
                        <input type="submit" value="提交">
                    </div>
                </form>
            </section>

        </div>
        <div class="row footer">
    <div class="col-md-4">
    <span>友情链接</span>
    <a href="http://www.snsiu.com/">行晓网</a>
    <a href="http://www.iterduo.com/">IT耳朵</a>
    <a href="http://www.ibeifeng.com/">北风网</a>
    </div>
</div>
    </div>
</body>
</html>