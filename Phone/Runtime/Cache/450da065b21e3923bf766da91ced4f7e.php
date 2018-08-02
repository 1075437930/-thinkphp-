<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程详细信息</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/courinfo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all"/>
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        $(function () {
            $('section.study button').click(function () {
                var obj = $(this);
                if (obj.html()=='+收藏') {
                    $.ajax({
                        url: "<?php echo U('collhand');?>",
                        type: "get",
                        data: {cour:"<?php echo ($_GET['id']); ?>", fa:1},
                        success: function (data) {
                            if (data == 'no') {
                                $('.tip').html('请先登录').show();
                                setTimeout(function () {
                                    $('.tip').hide()
                                }, 2000)
                            }
                            if (data == 1) {
                                obj.html('已收藏')
                            }
                        }
                    })
                } else {
                    $.ajax({
                        url: "<?php echo U('collhand');?>",
                        type: "get",
                        data: {cour: "<?php echo ($_GET['id']); ?>", fa:0},
                        success: function (data) {
                            if (data == 0) {
                                obj.html('+收藏');
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
    <article>
        <section class="top">

            <figure>
                <div class="row">
                <div class="col-xs-6">
                <figcaption>
                    <h1><?php echo ($cour[0]['title']); ?></h1>
                    <p><span>分类:</span><a href="__APP__/Course/classall/id/<?php echo ($cour[0]['ci']); ?>" class="bp"><?php echo ($cour[0]['cn']); ?></a>
                    </p>
                    <p><span>来源:</span><a href="__APP__/Course/brall/id/<?php echo ($cour[0]['bi']); ?>" class="ly"><?php echo ($cour[0]['bn']); ?></a>
                    </p>
                </figcaption>
                </div>
                <div class="col-xs-6">
                <img src="__PUBLIC__/Uploads/courimg/<?php echo ($cour[0]['img']); ?>" class="courimg">
                </div>
                </div>
                <div class="clear"></div>
            </figure>
            <div class="interval"></div>
        </section>
        <section class="study">
            <div>
                <a href="<?php echo ($cour[0]['link']); ?>" target="_blank"><img src="../Public/Images/2017-01-15_160310.png"><span>去学习</span></a>
                <?php if($count == 1): ?><button type="button">已收藏</button>
                    <?php else: ?>
                    <button type="button">+收藏</button><?php endif; ?>
                <div class="tip"></div>
            </div>
            <div class="clear"></div>
        </section>
        <section class="info">
            <h1>内容简介</h1>
            <div class="con">
                <?php echo htmlspecialchars_decode($cour[0]['content']);?>
            </div>
            <div class="interval spacing"></div>
        </section>
    </article>
    </div>
    <div class="col-md-3">
        <aside>
        <section class="about">
            <h1>课程来源</h1>
            <figure>
                <img src="__PUBLIC__/Uploads/brand/<?php echo ($cour[0]['bm']); ?>">
                <figcaption>
                    <a href="__APP__/Course/brall/id/<?php echo ($cour[0]['bi']); ?>"><?php echo ($cour[0]['bn']); ?></a>
                </figcaption>
                <div class="clear"></div>
            </figure>
        </section>
        <section class="new">
            <h1>最新课程</h1>
            <?php if(is_array($news)): foreach($news as $key=>$row): ?><figure>
                    <a href="__APP__/Course/courinfo/id/<?php echo ($row['id']); ?>">
                        <img src="__PUBLIC__/Uploads/courimg/<?php echo ($row['img']); ?>">
                        <figcaption>
                            <?php echo ($row['title']); ?>
                        </figcaption>
                    </a>
                </figure><?php endforeach; endif; ?>
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