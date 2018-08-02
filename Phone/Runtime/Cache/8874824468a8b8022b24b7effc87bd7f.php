<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/search.css" rel="stylesheet">
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

    <div class="content">
        <article>
            <h1 class="tit">
                    <span>搜索</span>
                    <form action="__URL__/index" method="GET" class="sform">
                        <div class="row">
                            <div class="col-xs-8">
                            <input type="text" name="key">
                            </div>
                            <div class="col-xs-2">
                            <select name="type">
                                <?php if(isset($_GET['artkey']) or $_GET['type'] == 'art'): ?><option value="art" selected>文章</option>
                                    <?php else: ?>
                                    <option value="art">文章</option><?php endif; ?>
                                <?php if(isset($_GET['thekey']) or $_GET['type'] == 'the'): ?><option value="the" selected>主题</option>
                                    <?php else: ?>
                                    <option value="the">主题</option><?php endif; ?>
                                <?php if(isset($_GET['sitkey']) or $_GET['type'] == 'sit'): ?><option value="sit" selected>站点</option>
                                    <?php else: ?>
                                    <option value="sit">站点</option><?php endif; ?>
                            </select>
                            </div>
                            <div class="col-xs-2">
                                <input type="submit" value="">
                            </div>
                        </div>
                    </form>
            </h1>
            <section>
                <div class="tol">
                    <?php if($_GET['artkey'] or $_GET['type'] == 'art'): ?><div class="con">
                            <?php if(!empty($arts)): if(is_array($arts)): foreach($arts as $key=>$row): ?><figure>
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <figcaption>
                                                    <h1><a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h1>
                                                    <div class="artcon">
                                                        <?php echo ($row['content']); ?>
                                                    </div>
                                                    <p><i class="s-tb"></i><span><?php echo ($row['sn']); ?> </span><i class="clock"></i><time><?php echo date('m-d H:i',$row['time']);?></time></p>
                                                </figcaption>
                                            </div>
                                            <div class="col-xs-5 artimg">
                                                <?php echo ($row['img']); ?>
                                            </div>
                                        </div>
                                    </figure><?php endforeach; endif; ?>
                                <div class="manu"><?php echo ($show); ?></div>
                                <?php else: ?>
                                <div class="no">没有查到相关文章</div><?php endif; ?>
                        </div><?php endif; ?>
                    <?php if($_GET['thekey'] or $_GET['type'] == 'the'): ?><div class="thecon">
                            <?php if(!empty($thes)): ?><div class="tip">相近主题如下</div>
                                <?php if(is_array($thes)): foreach($thes as $key=>$row): ?><figure>
                                        <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>"></a>
                                        <figcaption><a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a></figcaption>
                                    </figure><?php endforeach; endif; ?>
                                <?php else: ?>
                                <div class="tip">没有找到与<span><?php echo ($_GET['thekey']); echo ($_GET['key']); ?></span>相近的主题</div><?php endif; ?>
                            <div class="Separate"></div>
                            <div class="clear"></div>
                        </div><?php endif; ?>
                    <?php if($_GET['sitkey'] or $_GET['type'] == 'sit'): ?><div class="thecon">
                            <?php if(!empty($sits)): ?><div class="tip">相近站点如下</div>
                                <?php if(is_array($sits)): foreach($sits as $key=>$row): ?><figure>
                                        <a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>"></a>
                                        <figcaption><a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a></figcaption>
                                    </figure><?php endforeach; endif; ?>
                                <?php else: ?>
                                <div class="tip">没有找到与<span><?php echo ($_GET['sitkey']); echo ($_GET['key']); ?></span>相近的站点</div><?php endif; ?>
                            <div class="Separate"></div>
                            <div class="clear"></div>
                        </div><?php endif; ?>
                </div>
            </section>
        </article>
    </div>
</body>
</html>