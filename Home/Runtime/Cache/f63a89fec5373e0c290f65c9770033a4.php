<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>所有主题</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/thenologin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
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
        <h1>热门主题</h1>
        <article class="mai">
            <section class="sits">
                <aside class="le">
                    <ul>
                       <?php if(is_array($clas)): foreach($clas as $key=>$row): ?><li ><a href="__APP__/Theme/nologin/id/<?php echo ($row['id']); ?>" uid="<?php echo ($row['id']); ?>" class="ss"> <?php echo ($row['name']); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                    <div class="diver"></div>
                </aside>
                <article class="ri">
                    <?php if(isset($thes)): if(is_array($thes)): foreach($thes as $key=>$row): ?><figure>
                                <img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>">
                                <figcaption>
                                     <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                                    <button class="subbut">+订阅</button>
                                     <div class="tip">请先登录</div>
                                </figcaption>
                                <div class="clear"></div>
                            </figure><?php endforeach; endif; ?>
                        <?php else: ?>
                        <figure class="no">
                            暂无相关主题
                        </figure><?php endif; ?>
                </article>
                <div class="clear"></div>
            </section>
        </article>
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