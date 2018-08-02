<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>所有站点</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/sitenologin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        $(function(){
            $('.le li:last-child').css({'border-bottom':'1px solid #DDDDDD'});
            $('.subbut').click(function(){
                $('.tip').show();
                setTimeout(function(){
                    $('.tip').hide()
                },2000);
            });
            $('.le li a').hover(function(){
                $(this).css({'color':'#0AA284'})
            },function(){
                $(this).css({'color':'#333333'})
            })
            $('.le li a').each(function(){
                if("<?php echo ($_GET['id']); ?>"==$(this).attr('uid')){
                    var obj=$(this)
                    $(this).css({'background':'#0AA284','color':'white'})
                    obj.off('hover');
                    obj.hover(function(){
                        $(this).css({'color':'white'})
                    },function(){
                        $(this).css({'color':'white'})
                    })
                }
            })
            if(!"<?php echo isset($_GET['id']);?>"){
                $('.le li a').eq(0).off('hover');
                $('.le li a').eq(0).css({'background':'#0AA284','color':'white'})
                $('.le li a').eq(0).hover(function(){
                    $(this).css({'color':'white'})
                },function(){
                    $(this).css({'color':'white'})
                })
            }
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

    <div class="container">
        <h1>热门站点</h1>
        <article class="mai">
            <section class="sits">
                <div class="row">
                <div class="col-md-6">
                <aside class="le">
                    <ul>
                       <?php if(is_array($clas)): foreach($clas as $key=>$row): ?><li ><a href="__APP__/Site/nologin/id/<?php echo ($row['id']); ?>" uid="<?php echo ($row['id']); ?>" class="ss"> <?php echo ($row['name']); ?></a></li><?php endforeach; endif; ?>
                        <div class="clear"></div>
                    </ul>
                </aside>
                </div>
                <div class="col-md-6">
                    <article class="ri">
                    <?php if(isset($sits)): if(is_array($sits)): foreach($sits as $key=>$row): ?><figure>
                                <img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>">
                                <figcaption>
                                     <a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                                    <button class="subbut">+订阅</button>
                                     <div class="tip">请先登录</div>
                                </figcaption>
                                <div class="clear"></div>
                            </figure><?php endforeach; endif; ?>
                        <?php else: ?>
                        <figure class="no">
                            暂无相关站点
                        </figure><?php endif; ?>
                </article>
                </div>
                </div>
            </section>
        </article>
        <div class="clear"></div>
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