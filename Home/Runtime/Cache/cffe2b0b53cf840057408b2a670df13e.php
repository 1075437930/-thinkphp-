<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程详细信息</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/courinfo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all"/>
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
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
    <article>
        <section class="top">
            <figure>
                <figcaption>
                    <h1><?php echo ($cour[0]['title']); ?></h1>
                    <p><span>分类:</span><a href="__APP__/Course/classall/id/<?php echo ($cour[0]['ci']); ?>" class="bp"><?php echo ($cour[0]['cn']); ?></a>
                    </p>
                    <p><span>来源:</span><a href="__APP__/Course/brall/id/<?php echo ($cour[0]['bi']); ?>" class="ly"><?php echo ($cour[0]['bn']); ?></a>
                    </p>
                </figcaption>
                <img src="__PUBLIC__/Uploads/courimg/<?php echo ($cour[0]['img']); ?>">
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
    <div class="clear"></div>
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