<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章区</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/artindex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        var change="<?php echo ($_GET['change']); ?>";
    </script>
    <script src="../Public/Js/artindex.js"></script>
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
        <div class="row">
        <div class="col-md-9">
            <ul class="menu1">
                    <li class="comm"><a href="<?php echo U('index');?>">推荐</a> </li>
                    <li class="hot"><a href="<?php echo U('index','change=hot');?>">热门</a> </li>
                    <li class="science"><a href="<?php echo U('index','change=science');?>">科技</a> </li>
                    <li class="Investment"><a href="<?php echo U('index','change=Investment');?>">创投</a> </li>
                    <li class="Digital"><a href="<?php echo U('index','change=Digital');?>">数码</a> </li>
                    <li class="technology"><a href="<?php echo U('index','change=technology');?>">技术</a> </li>
                    <li class="Design"><a href="<?php echo U('index','change=Design');?>">设计</a> </li>
                    <li class="Marketing"><a href="<?php echo U('index','change=Marketing');?>">营销</a> </li>
                    <div class="clear"></div>
            </ul>
            <?php if(is_array($arts)): foreach($arts as $key=>$row): ?><figure>
                    <div class="row">
                        <div class="col-xs-7">
                            <figcaption>
                                <h1><a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h1>
                                <div class="con">
                                    <?php echo ($row['content']); ?>
                                </div>
                                <p><i class="s-tb"></i><span><?php echo ($row['sn']); ?> </span><i class="clock"></i><time><?php echo date('m-d H:i',$row['time']);?></time></p>
                            </figcaption>
                        </div>
                        <div class="col-xs-5">
                           <img src="<?php echo ($row['img']); ?>">
                        </div>
                        <div class="clear"></div>
                    </div>
                </figure><?php endforeach; endif; ?>
            <div class="manu"><?php echo ($show); ?></div>

        </div>
        <div class="col-md-3">
            <?php if(isset($_SESSION['user_id'])): ?><section class="set">

                        <figure>
                            <a href="__APP__/Person/settings/id/<?php echo ($_SESSION['user_id']); ?>">
                                <?php if(!empty($_SESSION['img'])): ?><img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>">
                                    <?php else: ?>
                                    <img src="__PUBLIC__/Images/man.jpg"/><?php endif; ?>
                            </a>
                            <figcaption>
                                <p class="account"><?php echo ($_SESSION['username']); ?></p>
                                <p class="option"><a href="__APP__/Person/mycomment/id/<?php echo ($_SESSION['user_id']); ?>">评论</a><span>|</span><a href="__APP__/Person/mycoll/id/<?php echo ($_SESSION['user_id']); ?>">收藏</a>
                            </figcaption>
                        </figure>
                </section><?php endif; ?>
            <section class="adver">
                <?php if(is_array($advers)): foreach($advers as $key=>$row): ?><figure>
                        <a href="<?php echo ($row['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>"></a>
                    </figure><?php endforeach; endif; ?>
            </section>
        </div>
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