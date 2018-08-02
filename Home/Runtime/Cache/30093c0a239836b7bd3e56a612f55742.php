<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/login.css" rel="stylesheet">
    <link href="../Public/Css/register.css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script src="../Public/Js/register.js"></script>
    <script>
        if("<?php echo ($_GET['error']); ?>"){
            $('.error1').html("<?php echo ($_GET['error']); ?>").show();
        }
    </script>
</head>
<body>
    <header>
    <div class="to">
        <nav class="to-le">
            <ul>
                <li><a href="<?php echo U('Index/index');?>" class="ind" >资讯网</a> </li>
                <?php if(MODULE_NAME == 'Article'): ?><li><a href="<?php echo U('Article/index');?>" style="color: #16A085">文章</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Article/index');?>">文章</a> </li><?php endif; ?>
                <?php if(MODULE_NAME == 'Site'): ?><li><a href="<?php echo U('Site/index');?>" style="color: #16A085">站点</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Site/index');?>">站点</a> </li><?php endif; ?>
                <?php if(MODULE_NAME == 'Theme'): ?><li><a href="<?php echo U('Theme/index');?>" style="color: #16A085">主题</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Theme/index');?>" >主题</a> </li><?php endif; ?>
                <?php if(MODULE_NAME == 'Activity'): ?><li><a href="<?php echo U('Activity/index');?>" style="color: #16A085">活动</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Activity/index');?>" >活动</a> </li><?php endif; ?>
                <?php if(MODULE_NAME == 'Course'): ?><li><a href="<?php echo U('Course/index');?>" style="color: #16A085">公开课</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Course/index');?>" >公开课</a> </li><?php endif; ?>
            </ul>
            <form action="<?php echo U('Search/index');?>" method="get">
                <input type="text" placeholder="搜索" name="artkey">
            </form>
        </nav>
        <?php if($_SESSION['user_id'] == ''): ?><a href="<?php echo U('Login/login');?>" class="lo">登录</a>
            <?php else: ?>
            <div class="to-ri">
                    <?php if($_SESSION['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg" class="head" width="60px" height="40px">
                        <?php else: ?>
                        <img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>" width="60px" height="40px" alt="" class="head"><?php endif; ?>
                    <span><?php echo ($_SESSION['username']); ?></span>
                    <i class="arrow"></i>

                <ul class="drop-down">
                    <li><a href="__APP__/Person/myindex/id/<?php echo ($_SESSION['user_id']); ?>/name/<?php echo ($_SESSION['username']); ?>">我的主页</a> </li>
                    <li><a href="__APP__/Person/mycoll/id/<?php echo ($_SESSION['user_id']); ?>">我的收藏</a></li>
                    <li><a href="__APP__/Person/settings/id/<?php echo ($_SESSION['user_id']); ?>">个人设置</a></li>
                    <li><a href="__APP__/Person/message/id/<?php echo ($_SESSION['user_id']); ?>">消息通知</a></li>
                    <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
                </ul>
            </div><?php endif; ?>
        <div class="clear"></div>
    </div>
    <div class="backtop"></div>
</header>
    <div class="content">
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
</body>
</html>