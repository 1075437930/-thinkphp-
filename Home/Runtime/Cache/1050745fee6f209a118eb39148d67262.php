<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章区</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/artindex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        var change="<?php echo ($_GET['change']); ?>";
    </script>
    <script src="../Public/Js/artindex.js"></script>
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
            <nav class="artna">
                <ul>
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
            </nav>
            <?php if(is_array($arts)): foreach($arts as $key=>$row): ?><figure>
                    <figcaption>
                        <h1><a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h1>
                        <div class="con">
                            <?php echo ($row['content']); ?>
                        </div>
                        <p><i class="s-tb"></i><span><?php echo ($row['sn']); ?> </span><i class="clock"></i><time><?php echo date('m-d H:i',$row['time']);?></time></p>
                    </figcaption>
                    <img src="<?php echo ($row['img']); ?>">
                    <div class="clear"></div>
                </figure><?php endforeach; endif; ?>
            <div class="manu"><?php echo ($show); ?></div>
        </article>
        <aside>
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
                </section>
                <?php else: ?>
                <section class="no">
                    <h1>登录，尽享个性阅读</h1>
                    <div>
                        <span>1.</span>
                        <p>智能学习你的兴趣，给你最精准的推荐。</p>
                        <div class="clear"></div>
                    </div>
                    <div>
                        <span>2.</span>
                        <p>科技、产品、设计、技术、营销，专注而全面的聚合。</p>
                        <div class="clear"></div>
                    </div>
                </section><?php endif; ?>
            <section class="adver">
                <?php if(is_array($advers)): foreach($advers as $key=>$row): ?><figure>
                        <a href="<?php echo ($row['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>"></a>
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