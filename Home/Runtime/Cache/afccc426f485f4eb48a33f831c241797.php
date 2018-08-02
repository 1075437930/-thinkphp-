<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动首页</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/actiindex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        var city="<?php echo ($_GET['city']); ?>";
    </script>
    <script src="../Public/Js/actiindex.js"></script>
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
        <h1 class="toh">
            <div class="selectcity">
                <span class="actip">活动</span>
                <div class="drop">
                    <span>
                        <?php if(isset($_GET['name'])): echo ($_GET['name']); ?>
                            <?php else: ?>
                            北京<?php endif; ?>
                    </span><i class="tb"></i>
                    <div class="dropdown">
                        <div class="close">X</div>
                        <?php if(is_array($citys)): foreach($citys as $key=>$row): ?><a href="__APP__/Activity/index/city/<?php echo ($row['id']); ?>/name/<?php echo ($row['name']); ?>"><?php echo ($row['name']); ?></a><?php endforeach; endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="myacti">
                <a href="__APP__/Activity/myacti">我的活动</a>
            </div>
            <div class="clear"></div>
        </h1>
        <article class="acmain">
            <section class="contain">
                <aside>
                    <section class="citys">
                        <h2>城市</h2>
                        <div class="city-con">
                        <?php if(is_array($citys)): foreach($citys as $key=>$row): if(isset($_GET['city'])): if($row['id'] == $_GET['city']): ?><a href="__APP__/Activity/actilist/city/<?php echo ($row['id']); ?>" style="background-color: #0AA284;color: white" uid="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                                    <?php else: ?>
                                    <a href="__APP__/Activity/actilist/city/<?php echo ($row['id']); ?>" uid="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a><?php endif; ?>
                                <?php else: ?>
                                <?php if($row['id'] == $actis[0]['ci']): ?><a href="__APP__/Activity/actilist/city/<?php echo ($row['id']); ?>" style="background-color: #0AA284;color: white" uid="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                                    <?php else: ?>
                                    <a href="__APP__/Activity/actilist/city/<?php echo ($row['id']); ?>" uid="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a><?php endif; endif; endforeach; endif; ?>
                         <a href="__APP__/Activity/actilist/city/all">更多</a>
                        </div>
                        <div class="separate"></div>
                    </section>
                    <section class="citys times">
                        <h2>时间</h2>
                        <div class="times-con">
                            <?php if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/time/underway/city/<?php echo ($_GET['city']); ?>">正在进行</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/time/underway/city/1">正在进行</a><?php endif; ?>
                            <?php if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/time/3day/city/<?php echo ($_GET['city']); ?>">未来三天</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/time/3day/city/1">未来三天</a><?php endif; ?>
                            <?php if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/time/1week/city/<?php echo ($_GET['city']); ?>">未来一周</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/time/1week/city/1">未来一周</a><?php endif; ?>
                            <?php if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/time/1mon/city/<?php echo ($_GET['city']); ?>">未来一月</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/time/1mon/city/1">未来一月</a><?php endif; ?>
                            <?php if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/time/3mon/city/<?php echo ($_GET['city']); ?>">未来三月</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/time/3mon/city/1">未来三月</a><?php endif; ?>
                            <?php if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/time/over/city/<?php echo ($_GET['city']); ?>">已经结束</a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/time/over/city/1">已经结束</a><?php endif; ?>
                        </div>
                        <div class="separate"></div>
                    </section>
                    <section class="citys times">
                    <h2>类型</h2>
                    <div class="times-con">
                        <?php if(is_array($clas)): foreach($clas as $key=>$row): if(isset($_GET['city'])): ?><a href="__APP__/Activity/actilist/class/<?php echo ($row['id']); ?>/city/<?php echo ($_GET['city']); ?>"><?php echo ($row['name']); ?></a>
                                <?php else: ?>
                                <a href="__APP__/Activity/actilist/class/<?php echo ($row['id']); ?>/city/1"><?php echo ($row['name']); ?></a><?php endif; endforeach; endif; ?>
                    </div>
                    <div class="separate"></div>
                   </section>
                    <section class="citys brands">
                        <h2>品牌</h2>
                        <div class="brands-con">
                            <?php if(is_array($brands)): foreach($brands as $key=>$row): ?><figure>
                                <a href="__APP__/Activity/brandall/id/<?php echo ($row['id']); ?>"><img src="__PUBLIC__/Uploads/brand/<?php echo ($row['img']); ?>"></a>
                                </figure><?php endforeach; endif; ?>
                            <div class="clear"></div>
                        </div>
                        <div class="separate"></div>
                    </section>
                </aside>
                <article>
                    <section class="hot">
                        <figure>
                            <div class="x">
                                <?php if(is_array($advers)): foreach($advers as $key=>$row): ?><a href="<?php echo ($row['link']); ?>" target="_blank"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>"/></a><?php endforeach; endif; ?>
                            </div>
                            <ul class="page">

                            </ul>
                            <div class="btn btn-le">&lt;</div>
                            <div class="btn btn-ri">&gt;</div>
                        </figure>
                        <div class="word">
                            <h2>热门活动</h2>
                            <?php if(is_array($hots)): foreach($hots as $key=>$row): ?><p><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>"><span>[<?php echo ($row['cn']); ?>]</span><span><?php echo ($row['title']); ?></span></a> </p><?php endforeach; endif; ?>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <section class="nearfuture">
                            <h1><span>
                                <?php if($count == 0): ?>全国
                                     <?php else: ?>
                                     <?php echo ($actis[0]['cn']); endif; ?>
                                </span>
                                <span class="secon">近期活动</span>
                                <a href="__APP__/Activity/actilist/city/all">更多</a>
                            </h1>
                            <?php if(is_array($actis)): foreach($actis as $key=>$row): ?><div class="con">
                                    <div class="le">
                                        <h2><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </h2>
                                        <p><span class="dd">地点:</span><span><?php echo ($row['cn']); ?></span><span>-</span><span><?php echo ($row['info']); ?></span></p>
                                        <p class="tw"><span class="dd">时间:</span><span><?php echo date('m-d H:i',$row['start']);?></span><span>~</span><span><?php echo date('m-d H:i',$row['end']);?></span></p>
                                    </div>
                                    <?php if(time() < $row['start']): ?><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" class="ri">报名中</a>
                                        <?php else: ?>
                                        <?php if(time() >= $row['start'] && time() < $row['end']): ?><a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" style="background-color: #FAA732" class="ri">进行中</a>
                                            <?php else: ?>
                                            <a href="__APP__/Activity/activinfo/id/<?php echo ($row['id']); ?>" style="background-color: #BBBBBB" class="ri">已结束</a><?php endif; endif; ?>
                                    <div class="clear"></div>
                                </div><?php endforeach; endif; ?>
                            <div class="inter"></div>
                    </section>
                </article>
                <div class="clear"></div>
            </section>
        </article>
    </div>
</body>
</html>