<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/login.css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        $(function() {
            $('.log').click(function () {
                location = "<?php echo U('Login/login');?>";
            });
            i = 0;
            $('.bimg').click(function () {
                if (i % 2 == 0) {
                    $(this).attr('src', '/kt/Home/Tpl/Public/Images/2017-01-07_203605.png');
                    $(this).prev().removeAttr('checked');
                } else {
                    $(this).attr('src', '/kt/Home/Tpl/Public/Images/2017-01-07_203526.png');
                    $(this).prev().attr('checked', '');
                }
                i++;
            });

            if ("<?php echo ($_GET['error1']); ?>") {
                $('.error1').html("<?php echo ($_GET['error1']); ?>").show();
            }
            ;

            if ("<?php echo ($_GET['error2']); ?>") {
                $('.error1').html("用户名或密码错误").show();
            }
            ;
            $("input[name=user]").on('input propertychange blur', function () {
                va = $(this).val();
                if (va) {
                    $(this).data('nu', 1);
                    $(this).parent().next().hide();
                } else {
                    $(this).data('nu', 0);
                    $(this).parent().next().show();
                }
            });
            $("input[name=password]").on('input propertychange blur', function () {
                va = $(this).val();
                if (va) {
                    $(this).data('nu', 1);
                    $(this).parent().next().hide();
                } else {
                    $(this).data('nu', 0);
                    $(this).parent().next().show();
                }
            });
            $('form').submit(function () {
                $('.auth').blur();
                tol = 0
                $('.auth').each(function () {
                    tol += $(this).data('nu');
                });
                if (tol != 2) {
                    return false;
                }
            })
            $('input[type=button]').click(function () {
                location = "<?php echo U('register');?>";
            })
        })
    </script>
    <style>
        .error1{
            display: none;
        }
        .err{
            display: none;
        }
    </style>
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
            <h1>登录</h1>
            <form method="post" action="__URL__/check">
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
                    <input type="button" value="注册">
                </div>
            </form>
        </section>
    </div>
    <footer>
    <div class="main">
        <section class="fot-le">
            <p>网站相关</p>
            <ul>
                <li><a href="">关于我们</a> </li>
                <li><a href="">意见反馈</a> </li>
            </ul>
        </section>
        <section class="fot-mi">
            <p>关注我们</p>
            <ul>
                <li><img src="../Public/Images/weibo-32.png"><a href="">资讯网</a> </li>
                <li><img src="../Public/Images/weixin-32.png"><a href="">ccccc</a> </li>
            </ul>
        </section>
        <section class="fot-ri">
            <p>友情链接</p>
            <ul>
                <li><a href="http://www.woshipm.com/" target="_blank"> 人人都是产品经理</a></li>
                <li><a href="http://www.pm265.com/" target="_blank"> PM256</a></li>
                <li><a href="http://www.yidonghua.com/" target="_blank"> 移动信息化</a></li>
                <li><a href="http://www.snsiu.com/" target="_blank"> 行晓网</a></li>
                <li><a href="http://www.qy.com.cn/" target="_blank"> 云主机</a></li>
                <li><a href="http://www.iterduo.com/" target="_blank"> IT耳朵</a></li>
                <li><a href="http://mediamaster.caixin.com/" target="_blank"> 创媒工厂</a></li>
                <li><a href="http://www.managershare.com/" target="_blank"> 经理人分享</a></li>
                <li><a href="http://www.shichangbu.com/" target="_blank"> 市场部网</a></li>
                <li><a href="http://www.ikanchai.com/" target="_blank"> 砍柴网</a></li>
                <li><a href="http://www.ibeifeng.com/" target="_blank"> 北风网</a></li>
                <li><a href="http://www.jiankongbao.com/" target="_blank">云智慧</a></li>
            </ul>
        </section>
        <div class="clear"></div>
    </div>

</footer>
</body>
</html>