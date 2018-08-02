<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
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
            <h1 class="tit">
                <span>搜索</span>
                <form action="__URL__/index" method="GET">
                    <input type="text" name="key">
                    <select name="type">
                        <?php if(isset($_GET['artkey']) or $_GET['type'] == 'art'): ?><option value="art" selected>文章</option>
                            <?php else: ?>
                            <option value="art">文章</option><?php endif; ?>
                        <?php if(isset($_GET['thekey']) or $_GET['type'] == 'the'): ?><option value="the" selected>主题</option>
                            <?php else: ?>
                            <option value="the">主题</option><?php endif; ?>
                        <?php if(isset($_GET['sitkey']) or $_GET['type'] == 'sit'): ?><option value="sit" selected>站点</option>
                            <?php else: ?>
                            <option value="sit">站点</option><?php endif; ?>
                    </select>
                    <input type="submit" value="">
                </form>
                <div class="clear"></div>
            </h1>
            <section>
                <div class="tol">
                    <?php if($_GET['artkey'] or $_GET['type'] == 'art'): ?><div class="con">
                            <?php if(!empty($arts)): if(is_array($arts)): foreach($arts as $key=>$row): ?><figure>
                                        <figcaption>
                                            <h1><a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h1>
                                            <div class="artcon">
                                                <?php echo ($row['content']); ?>
                                            </div>
                                            <p><i class="s-tb"></i><span><?php echo ($row['sn']); ?> </span><i class="clock"></i><time><?php echo date('m-d H:i',$row['time']);?></time></p>
                                        </figcaption>
                                        <?php echo ($row['img']); ?>
                                        <div class="clear"></div>
                                    </figure><?php endforeach; endif; ?>
                                <div class="manu"><?php echo ($show); ?></div>
                                <?php else: ?>
                                <div class="no">没有查到相关文章</div><?php endif; ?>
                        </div><?php endif; ?>
                    <?php if($_GET['thekey'] or $_GET['type'] == 'the'): ?><div class="thecon">
                            <?php if(!empty($thes)): ?><div class="tip">相近主题如下</div>
                                <?php if(is_array($thes)): foreach($thes as $key=>$row): ?><figure>
                                        <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>"></a>
                                        <figcaption><a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a></figcaption>
                                    </figure><?php endforeach; endif; ?>
                                <?php else: ?>
                                <div class="tip">没有找到与<span><?php echo ($_GET['thekey']); echo ($_GET['key']); ?></span>相近的主题</div><?php endif; ?>
                            <div class="Separate"></div>
                            <div class="clear"></div>
                        </div><?php endif; ?>
                    <?php if($_GET['sitkey'] or $_GET['type'] == 'sit'): ?><div class="thecon">
                            <?php if(!empty($sits)): ?><div class="tip">相近主题如下</div>
                                <?php if(is_array($sits)): foreach($sits as $key=>$row): ?><figure>
                                        <a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>"></a>
                                        <figcaption><a href="__APP__/Site/siteartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a></figcaption>
                                    </figure><?php endforeach; endif; ?>
                                <?php else: ?>
                                <div class="tip">没有找到与<span><?php echo ($_GET['sitkey']); echo ($_GET['key']); ?></span>相近的站点</div><?php endif; ?>
                            <div class="Separate"></div>
                            <div class="clear"></div>
                        </div><?php endif; ?>
                </div>
            </section>
        </article>
    </div>
</body>
</html>