<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>品牌下的所有活动</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/actibrandall.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
</head>
<body>
    <header>
    <div class="to">
        <nav class="to-le">
            <ul>
                <?php if(MODULE_NAME == 'Index'): ?><li><a href="<?php echo U('Index/index');?>" class="ind" style="color: #16A085">首页</a> </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Index/index');?>" class="ind" >首页</a> </li><?php endif; ?>
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
            <form>
                <input type="text" placeholder="搜索">
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
                    <li><a href="">消息通知</a></li>
                    <li><a href="">意见反馈</a></li>
                    <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
                </ul>
            </div><?php endif; ?>
        <div class="clear"></div>
    </div>
    <div class="backtop"></div>
</header>
    <div class="content">
        <article>
            <section class="brand">
                <figure>
                    <img src="__PUBLIC__/Uploads/brand/<?php echo ($brand['img']); ?>"/>
                    <figcaption>
                        <h1><?php echo ($brand['name']); ?></h1>
                        <p><?php echo ($brand['tip']); ?></p>
                    </figcaption>
                    <div class="clear"></div>
                </figure>
            </section>
            <section class="list">
                <h1><span>活动列表</span></h1>
                <?php if(is_array($actis)): foreach($actis as $key=>$row): ?><div class="con">
                        <div class="le">
                            <h2><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h2>
                            <p><span class="dd">地点:</span><span><?php echo ($row['cn']); ?></span><span>-</span><span><?php echo ($row['info']); ?></span></p>
                            <p class="tw"><span class="dd">时间:</span><span><?php echo date('m-d H:i',$row['start']);?></span><span>~</span><span><?php echo date('m-d H:i',$row['end']);?></span></p>
                        </div>
                        <?php if(time() < $row['start']): ?><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" class="ri">报名中</a>
                            <?php else: ?>
                            <?php if(time() >= $row['start'] && time() < $row['end']): ?><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" style="background-color: #FAA732" class="ri">进行中</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" style="background-color: #BBBBBB" class="ri">已结束</a><?php endif; endif; ?>
                        <div class="clear"></div>
                    </div><?php endforeach; endif; ?>
                <div class="inter"></div>
            </section>
        </article>
    </div>
</body>
</html>