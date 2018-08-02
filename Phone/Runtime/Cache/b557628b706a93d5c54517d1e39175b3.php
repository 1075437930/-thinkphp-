<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的主页</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/myindex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        $(function(){
            $('.info ul li a').hover(function(){
                $(this).css({'color':'#0AA284'})
            },function(){
                $(this).css({'color':'#606060'})
            });
            if(!"<?php echo ($_GET['change']); ?>"){
                $('.dyli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.dyli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });
            }

            if("<?php echo ($_GET['change']); ?>"=='theme'){
                $('.theli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.theli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });
            }

            if("<?php echo ($_GET['change']); ?>"=='collection'){
                $('.collli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.collli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });
            }

            if("<?php echo ($_GET['change']); ?>"=='fabulous'){
                $('.fabli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.fabli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });
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
        <section class="tou">
            <?php if(!empty($user['img'])): ?><img src="__PUBLIC__/Uploads/headport/<?php echo ($user['img']); ?>"/>
                <?php else: ?>
                <img src="/kt/Public/Images/man.jpg"/><?php endif; ?>
            <p><?php echo ($user['username']); ?></p>
        </section>
        <section  class="info">
            <ul>
                <li class="dyli"><a href="__APP__/Person/myindex/id/<?php echo ($_GET['id']); ?>/name/<?php echo ($_GET['name']); ?>">动态</a> </li>
                <li class="theli"><a href="__APP__/Person/myindex/id/<?php echo ($_GET['id']); ?>/name/<?php echo ($_GET['name']); ?>/change/theme">主题</a> </li>
                <li class="collli"><a href="__APP__/Person/myindex/id/<?php echo ($_GET['id']); ?>/name/<?php echo ($_GET['name']); ?>/change/collection">收藏</a> </li>
                <li class="fabli"><a href="__APP__/Person/myindex/id/<?php echo ($_GET['id']); ?>/name/<?php echo ($_GET['name']); ?>/change/fabulous">点赞</a> </li>
                <div class="clear"></div>
            </ul>
            <div class="info-con">
                <?php if(!isset($_GET['change'])): if(!empty($dys)): if(is_array($dys)): foreach($dys as $key=>$row): ?><div class="dynamic">
                                <div class="dynamic-le">
                                    <p><?php echo ($row['tip']); ?></p>
                                    <a href="<?php echo ($row['link']); ?>"><?php echo ($row['sn']); ?></a>
                                </div>
                                <time><?php echo date('m-d H:i',$row['time']);?></time>
                                <div class="clear"></div>
                            </div><?php endforeach; endif; ?>
                        <?php else: ?>
                        <div class="no">
                            没有任何动态~~~
                        </div><?php endif; endif; ?>
                <?php if($_GET['change'] == 'theme'): ?><div class="thecon">
                        <?php if(!empty($thes)): if(is_array($thes)): foreach($thes as $key=>$row): ?><figure>
                                    <a href="__APP__/Theme/theartall/id/<?php echo ($row['ti']); ?>"><img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>"/></a>
                                    <figcaption> <a href="__APP__/Theme/theartall/id/<?php echo ($row['ti']); ?>"> <?php echo ($row['tn']); ?></a></figcaption>
                                </figure><?php endforeach; endif; ?>
                            <?php else: ?>
                            <div class="no">
                                没有订阅任何主题
                            </div><?php endif; ?>
                        <div class="clear"></div>
                    </div><?php endif; ?>
                <?php if($_GET['change'] == 'collection'): ?><div class="collcon">
                        <?php if(!empty($colls)): if(is_array($colls)): foreach($colls as $key=>$row): ?><div class="piece">
                                    <div class="the-le">
                                        <a href="__APP__/Article/artinfo/id/<?php echo ($row['ai']); ?>"><p class="tit"><?php echo ($row['an']); ?></p><p class="con"><?php echo ($row['content']); ?></p></a>
                                        <div class="clear"></div>
                                    </div>
                                    <span class="the-ri"><?php echo date('m-d H:i',$row['tt']);?></span>
                                    <div class="clear"></div>
                                </div><?php endforeach; endif; ?>
                            <div class="manu"><?php echo ($show); ?></div>
                            <?php else: ?>
                            <div class="no">
                                没有收藏的文章
                            </div><?php endif; ?>
                    </div><?php endif; ?>
                <?php if($_GET['change'] == 'fabulous'): ?><div class="fabcon">
                        <?php if(!empty($fabs)): if(is_array($fabs)): foreach($fabs as $key=>$row): ?><div class="piece">
                                    <div class="the-le">
                                        <a href="__APP__/Article/artinfo/id/<?php echo ($row['si']); ?>"><span class="tit"><?php echo ($row['sn']); ?></span></a>
                                        <div class="clear"></div>
                                    </div>
                                    <span class="the-ri"><?php echo date('m-d H:i',$row['tt']);?></span>
                                    <div class="clear"></div>
                                </div><?php endforeach; endif; ?>
                            <div class="manu"><?php echo ($show); ?></div>
                            <?php else: ?>
                            <div class="no">
                                没有赞过文章
                            </div><?php endif; ?>
                    </div><?php endif; ?>
                <div class="separate"></div>
            </div>
        </section>
    </article>
</div>
</body>
</html>