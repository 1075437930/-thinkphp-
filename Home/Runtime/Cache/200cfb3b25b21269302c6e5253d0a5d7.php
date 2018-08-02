<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主题下的所有文章</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/theartall.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        $(function(){
            $('.ingo button').click(function(){
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
        <section class="site-top">
            <img src="__PUBLIC__/Uploads/theimg/<?php echo ($the['img']); ?>">
            <div class="ingo">
                <h1 class="na"><a href="<?php echo ($the['link']); ?>" target="_blank"><?php echo ($the['name']); ?></a> </h1>
                <?php if($issub == 1): ?><button class="subed">已订阅</button>
                    <?php else: ?>
                    <button class="nosub">+订阅</button><?php endif; ?>
            </div>
            <div class="clear"></div>
        </section>
        <section class="arts">
            <?php if(isset($arts)): if(is_array($arts)): foreach($arts as $key=>$row): ?><figure>
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
                        <img class="arr" src="../Public/Images/2017-01-12_185718.png">
                        <i class="poin"></i>
                        <img src="<?php echo ($row['img']); ?>" class="pic">
                        <div class="clear"></div>
                    </figure><?php endforeach; endif; ?>
                <?php else: ?>
                <div class="empt"><img src="../Public/Images/212.jpg"><span>此主题下暂无收录文章</span></div><?php endif; ?>
        </section>
        <div class="manu"><?php echo ($show); ?></div>
    </article>
    <aside>
        <section>
            <h1>相关主题</h1>
            <?php if(is_array($thes)): foreach($thes as $key=>$row): ?><div class="about">
                    <img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>">
                    <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                </div><?php endforeach; endif; ?>
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