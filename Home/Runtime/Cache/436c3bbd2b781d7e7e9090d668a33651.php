<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动详情</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link rel="stylesheet" href="../Public/Css/activinfo.css">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        var subhand="<?php echo U('subhand');?>";
        var id="<?php echo ($_GET['id']); ?>";
    </script>
    <script src="../Public/Js/activinfo.js"></script>
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
    <script>
        window._bd_share_config = {
            common : {
                bdText : "<?php echo ($acti[0]['title']); ?>",
                bdDesc : '',
                bdUrl : "<?php echo ($acti[0]['link']); ?>",
                bdPic : ''
            },
            share : [{
                "bdSize" : 16
            }],
            slide : [{
                bdImg : 0,
                bdPos : "left",
                bdTop : 100
            }],
            selectShare : [{
                "bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
            }]
        }
        with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
    </script>
    <div class="content">
        <article>
            <section class="top">
                <figure>
                    <figcaption>
                        <h1><?php echo ($acti[0]['title']); ?></h1>
                        <p><span>时间:</span><time><?php echo date('m-d H:i',$acti[0]['start']);?></time><span>~</span><time><?php echo date('m-d H:i',$acti[0]['end']);?></time>
                        </p>
                        <p><span>地点:</span><span><?php echo ($acti[0]['tn']); ?></span><span>-</span><span><?php echo ($acti[0]['info']); ?></span>
                        </p>
                        <p><span>标签:</span><a href="__APP__/Activity/classall/id/<?php echo ($acti[0]['ci']); ?>" class="bq"><?php echo ($acti[0]['cn']); ?></a>
                        </p>
                    </figcaption>
                    <div class="clear"></div>
                </figure>
                <div class="interval"></div>
            </section>
            <section class="study">
                <div>
                    <a href="<?php echo ($acti[0]['link']); ?>" target="_blank"><span>去官网报名</span></a>
                    <?php if($count == 1): ?><button type="button">已关注</button>
                        <?php else: ?>
                        <button type="button">+关注</button><?php endif; ?>
                    <div class="tip"></div>
                </div>
                <div class="clear"></div>
            </section>
            <section class="info">
                <h1>活动内容</h1>
                <div class="con">
                    <?php echo htmlspecialchars_decode($acti[0]['content']);?>
                </div>
                <div class="interval spacing"></div>
            </section>
            <section class="recommend">
                <h1>同城活动</h1>
                <?php if(is_array($actis)): foreach($actis as $key=>$row): ?><p><span><?php echo ($key+1); ?>.</span><a href="__URL__/activinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </p><?php endforeach; endif; ?>
            </section>
        </article>
        <aside>
            <section class="adver">
                <?php if(is_array($advers)): foreach($advers as $key=>$row): ?><figure>
                        <a href="<?php echo ($row['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>" > </a>
                    </figure><?php endforeach; endif; ?>
                <div class="interval"></div>
            </section>
        </aside>
        <div class="clear"></div>
    </div>

</body>
</html>