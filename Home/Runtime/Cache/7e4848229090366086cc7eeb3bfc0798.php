<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>资讯网</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link rel="stylesheet" href="../Public/Css/index.css" >
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        $(function(){
            $('.log').click(function(){
                location="<?php echo U('Login/login');?>";
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
            <section class="hot">
                <h1><a href="__APP__/Article/index">热门文章</a></h1>
                <?php if(is_array($arts)): foreach($arts as $key=>$row): ?><div class="item">
                        <h2><a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>" target="_blank"><?php echo ($row['title']); ?></a></h2>
                        <p><span><?php echo ($row['tn']); ?></span><span><?php echo date('m-d H:i',$row['time']);?></span></p>
                    </div><?php endforeach; endif; ?>
                <div class="more">
                    <a href="__APP__/Article/index">查看更多</a>
                </div>
            </section>
            <section class="adver">
                <a href="<?php echo ($advers[0]['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($advers[0]['img']); ?>"  alt="广告" width="100%"></a>
            </section>
            <section class="course">
                <h1><a href="__APP__/Course/index">课程推荐</a></h1>
                <?php if(is_array($courses)): foreach($courses as $key=>$row): ?><figure>
                        <a href="__APP__/Course/courinfo/id/<?php echo ($row['id']); ?>" class="fig"><img src="__PUBLIC__/Uploads/courimg/<?php echo ($row['img']); ?>" alt=""></a>
                        <figcaption><a href="__APP__/Course/courinfo/id/<?php echo ($row['id']); ?>" ><?php echo ($row['title']); ?></a> </figcaption>
                    </figure><?php endforeach; endif; ?>
                <div class="more">
                    <a href="__APP__/Course/index">查看更多</a>
                </div>
                <div class="clear"></div>
            </section>
            <section class="adver">
                <a href="<?php echo ($advers[1]['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($advers[1]['img']); ?>"  alt="广告" width="100%"></a>
            </section>
            <section class="hot">
                <h1><a href="__APP__/Activity/index">近期活动</a></h1>
                <?php if(is_array($acts)): foreach($acts as $key=>$row): ?><div class="item">
                        <h2><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a></h2>
                        <p><span><?php echo ($row['city']); ?>&nbsp;-&nbsp;<?php echo ($row['info']); ?></span><span><?php echo date('m-d H:i',$row['start']);?></span></p>
                    </div><?php endforeach; endif; ?>
                <div class="more">
                    <a href="__APP__/Activity/index">查看更多</a>
                </div>
            </section>
        </article>
        <aside>
            <section class="brief">
                <h1>IT人专属个性阅读社区</h1>
                <p>资讯网以技术为驱动，以聚合挖掘为核心，打造个性推荐和订阅，给你一站式的阅读。 更汇聚优质公开课和线下活动，让信息知识获取更便捷。 万千网友汇聚于此，公诸同好，交流学习。</p>
                <button class="log">登录/注册</button>
            </section>

            <section class="app2">
                <figure>
                    <a href="<?php echo ($advers2[0]['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($advers2[0]['img']); ?>" alt=""></a>
                </figure>
            </section>
            <section class="theme">
                <h1>热门主题</h1>
                <?php if(is_array($thes)): foreach($thes as $key=>$row): ?><figure>
                        <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>" alt=""></a>
                        <figcaption><sapn><?php echo ($row['name']); ?></sapn></figcaption>
                    </figure><?php endforeach; endif; ?>
                <div class="clear"></div>
            </section>
            <section class="adver">
                <a href="<?php echo ($advers2[1]['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($advers2[1]['img']); ?>" alt=""></a>
            </section>
            <section class="theme">
                <h1>新新站点</h1>
                <?php if(is_array($sits)): foreach($sits as $key=>$row): ?><figure>
                        <a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>" alt=""></a>
                    </figure><?php endforeach; endif; ?>
                <div class="clear"></div>
            </section>
            <section class="theme">
                <h1>TA在这里</h1>
                <?php if(is_array($users)): foreach($users as $key=>$row): ?><figure >
                        <a href="__APP__/Person/otherindex/id/<?php echo ($row['id']); ?>/name/<?php echo ($row['username']); ?>">
                            <?php if($row['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg">
                                <?php else: ?>
                                <img src="__PUBLIC__/Uploads/headport/<?php echo ($row['img']); ?>" alt=""><?php endif; ?>
                        </a>
                    </figure><?php endforeach; endif; ?>
                <div class="clear"></div>
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