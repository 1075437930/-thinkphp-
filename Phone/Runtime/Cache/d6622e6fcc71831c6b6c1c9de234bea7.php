<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>站点下所有文章</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/siteartall.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        $(function(){
            $('.sub').click(function(){
                obj=$(this);
                if(obj.html()=='+订阅'){
                    $.ajax({
                        url:"<?php echo U('subhand');?>",
                        type:"get",
                        data:{sub:1,article:"<?php echo ($_GET['id']); ?>"},
                        success:function(data){
                            if(data==1){
                                obj.html('已订阅').removeClass('nosub').addClass('subed')
                            }
                        }
                    })
                }else {
                    $.ajax({
                        url:"<?php echo U('subhand');?>",
                        type:"get",
                        data:{sub:0,article:"<?php echo ($_GET['id']); ?>"},
                        success:function(data){
                            if(data==0){
                                obj.html('+订阅').removeClass('subed').addClass('nosub')
                            }
                        }
                    })
                }
            })
        })
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
            <section>
                <div class="row">
                    <div class="col-xs-4 sitelogo">
                    <img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($site['img']); ?>">
                    </div>
                    <div class="col-xs-6">
                         <h1 class="na"><a href="<?php echo ($site['link']); ?>" target="_blank"><?php echo ($site['name']); ?></a> </h1>
                         <?php if($issub == 1): ?><button class="subed sub">已订阅</button>
                            <?php else: ?>
                             <button class="nosub sub">+订阅</button><?php endif; ?>
                     </div>
                </div>
            </section>
            <section class="arts">
                <?php if(isset($arts)): if(is_array($arts)): foreach($arts as $key=>$row): ?><figure>
                        <div class="row">
                            <div class="col-xs-7">
                            <figcaption>
                                <h2><a href="<?php echo ($row['link']); ?>" target="_blank"><?php echo ($row['title']); ?></a></h2>
                                <div class="con">
                                    <?php echo ($row['content']); ?>
                                </div>
                                <p>
                                    <a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>" class="inside">[站内阅读]</a>
                                    <div class="clear"></div>
                                </p>
                                <p><i class="clock"></i><time><?php echo date('m-d H:i',$row['time']);?></time></p>
                            </figcaption>
                            </div>
                            <img class="arr" src="../Public/Images/2017-01-12_185718.png">
                            <i class="poin"></i>
                            <div class="col-xs-5">
                            <img src="<?php echo ($row['img']); ?>" class="pic">
                            </div>
                        </div>
                    </figure><?php endforeach; endif; ?>
                    <?php else: ?>
                    <div class="empt"><img src="../Public/Images/212.jpg"><span>此站点下暂无收录文章</span></div><?php endif; ?>
            </section>
            <div class="manu"><?php echo ($show); ?></div>
        </div>
        <div class="col-md-3">
            <aside>
            <section>
                <h1>相关站点</h1>
                <?php if(is_array($sites)): foreach($sites as $key=>$row): ?><div class="about">
                        <img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>">
                        <a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                    </div><?php endforeach; endif; ?>
            </section>
        </aside>
        </div>
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
</body>
</html>