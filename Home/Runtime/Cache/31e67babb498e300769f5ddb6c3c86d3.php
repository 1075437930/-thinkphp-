<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>站点</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/siteindex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        var findsite="<?php echo U('findsite');?>";
        var arlist="<?php echo U('arlist');?>";
        var subhand="<?php echo U('subhand');?>";
    </script>
    <script src="../Public/Js/siteindex.js"></script>
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
        <aside>
            <section class="search">
                <form action="<?php echo U('Search/index');?>" method="get">
                    <input type="text" placeholder="搜索站点" name="sitkey">
                </form>
            </section>
            <section class="sites">
                <div class="drop"><i></i><span>订阅发现</span></div>
                <ul class="dt">
                    <li uid="13"><img src="../Public/Images/1.png"><span>新新推荐</span></li>
                    <li uid="14"><img src="../Public/Images/10000000.png"><span>业界科技</span></li>
                    <li uid="15"><img src="../Public/Images/10000099.png"><span>移动互联</span></li>
                    <li uid="16"><img src="../Public/Images/45.png"><span>创业投资</span></li>
                    <li uid="17"><img src="../Public/Images/10000045.png"><span>手机数码</span></li>
                    <li uid="18"><img src="../Public/Images/10000084.png"><span>产品设计</span></li>
                    <li uid="19"><img src="../Public/Images/10450034.jpg"><span>营销推广</span></li>
                    <li uid="20"><img src="../Public/Images/11000133.png"><span>企业应用</span></li>
                    <li uid="21"><img src="../Public/Images/11000060.png"><span>技术综合</span></li>
                    <li uid="22"><img src="../Public/Images/11000079.png"><span>前端开发</span></li>
                    <li uid="23"><img src="../Public/Images/11000077.png"><span>移动开发</span></li>
                    <li uid="24"><img src="../Public/Images/11000148.png"><span>后端技术</span></li>
                    <li uid=""><img src="../Public/Images/2017-01-18_152842.png" class="arr"><span>程序设计</span></li>
                        <ul class="dd">
                            <li uid="27"><img src="../Public/Images/11010000.png"><span>C/C++</span></li>
                            <li uid="28"><img src="../Public/Images/11000072.png"><span>Java</span></li>
                            <li uid="29"><img src="../Public/Images/11050000.png"><span>.Net</span></li>
                            <li uid="30"><img src="../Public/Images/11120000.png"><span>PHP</span></li>
                            <li uid="31"><img src="../Public/Images/11130000.png"><span>Python</span></li>
                            <li uid="32"><img src="../Public/Images/11140000.png"><span>Ruby</span></li>
                            <li uid="33"><img src="../Public/Images/11000151.png"><span>编程</span></li>
                        </ul>
                    <li uid=""><img src="../Public/Images/2017-01-18_152842.png" class="arr"><span>技术纵横</span></li>
                        <ul class="dd">
                            <li uid="34"><img src="../Public/Images/11000084.png"><span>测试技术</span></li>
                            <li uid="35"><img src="../Public/Images/11000086.png"><span>安全技术</span></li>
                            <li uid="36"><img src="../Public/Images/11000062.png"><span>信息检索</span></li>
                            <li uid="37"><img src="../Public/Images/11000115.png"><span>网络技术</span></li>
                        </ul>
                </ul>
            </section>
            <section class="mysite">
                <div class="drop"><i class="my"></i><span>我的站点</span></div>
                <ul class="dropdown">
                    <?php if(is_array($mys)): foreach($mys as $key=>$row): ?><li sid="<?php echo ($row['id']); ?>" na="<?php echo ($row['name']); ?>"><img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>"><span><?php echo ($row['name']); ?></span></li><?php endforeach; endif; ?>
                </ul>
            </section>
        </aside>
        <article>
            <section>
                <?php if(!empty($mys)): if(is_array($mys)): foreach($mys as $key=>$row): ?><figure>
                            <img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>">
                            <figcaption>
                                <a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                            </figcaption>
                            <div class="clear"></div>
                        </figure><?php endforeach; endif; ?>
                    <?php else: ?>
                    <div class="none">
                        你还没有订阅站点,去订阅发现频道看看吧
                    </div><?php endif; ?>
                <div class="clear"></div>
            </section>
        </article>
    </div>
</body>
</html>