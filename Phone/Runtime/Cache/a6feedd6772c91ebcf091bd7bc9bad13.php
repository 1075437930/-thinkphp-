<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>标签下的所有活动</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link rel="stylesheet" href="../Public/Css/acticlassall.css">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
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

    <div class="container">
        <article>
            <h1><span>标签"</span><span><?php echo ($actis[0]['cn']); ?></span><span>"的活动</span></h1>
            <?php if(is_array($actis)): foreach($actis as $key=>$row): ?><div class="con">
                    <div class="row">
                        <div class="col-xs-9">
                        <div class="le">
                            <h2><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h2>
                            <p><span class="dd">地点:</span><span><?php echo ($row['tn']); ?></span><span>-</span><span><?php echo ($row['info']); ?></span></p>
                            <p class="tw"><span class="dd">时间:</span><span><?php echo date('m-d H:i',$row['start']);?></span><span>~</span><span><?php echo date('m-d H:i',$row['end']);?></span></p>
                        </div>
                        </div>
                        <div class="col-xs-3">
                         <?php if(time() < $row['start']): ?><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" class="ri">报名中</a>
                             <?php else: ?>
                             <?php if(time() >= $row['start'] && time() < $row['end']): ?><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" style="background-color: #FAA732" class="ri">进行中</a>
                                 <?php else: ?>
                                 <a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" style="background-color: #BBBBBB" class="ri">已结束</a><?php endif; endif; ?>
                        </div>
                    </div>
                </div><?php endforeach; endif; ?>
            <div class="inter"></div>
            <div class="manu"><?php echo ($show); ?></div>
        </article>
    </div>
</body>
</html>