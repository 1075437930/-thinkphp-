<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动列表</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/actilist.css" rel="stylesheet">
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
            <section class="search">
                <form action="<?php echo U('actilist');?>" method="post">
                    <div class="form-group">
                        <label>城市</label>
                        <select name="city">
                            <?php if($_GET['city'] != 'all' || $_POST['city'] != 'all'): ?><option value="all">所有城市</option>
                                <?php if(is_array($citys)): foreach($citys as $key=>$row): if($row['id'] == $_GET['city'] || $row['id'] == $_POST['city']): ?><option selected value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option>
                                        <?php else: ?>
                                        <option  value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endif; endforeach; endif; ?>
                                <?php else: ?>
                                <option selected value="all">所有城市</option>
                                <?php if(is_array($citys)): foreach($citys as $key=>$row): ?><option  value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endforeach; endif; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>类型</label>
                        <select name="class">
                            <?php if($_GET['city'] || $_POST['city']): ?><option value="all">所有类型</option>
                                <?php if(is_array($clas)): foreach($clas as $key=>$row): if($row['id'] == $_GET['class'] || $row['id'] == $_POST['class']): ?><option selected value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option>
                                        <?php else: ?>
                                        <option  value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endif; endforeach; endif; ?>
                                <?php else: ?>
                                <option selected value="all">所有类型</option>
                                <?php if(is_array($clas)): foreach($clas as $key=>$row): ?><option  value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endforeach; endif; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>日期范围</label>
                        <select name="time">
                            <?php if($_GET['time'] || $_POST['time']): if($_GET['time'] == 'underway' || $_POST['time'] == 'underway'): ?><option selected value="underway">正在进行</option>
                                    <?php else: ?>
                                    <option  value="underway">正在进行</option><?php endif; ?>
                                <?php if($_GET['time'] == '3day' || $_POST['time'] == '3day'): ?><option selected value="3day">未来三天</option>
                                    <?php else: ?>
                                    <option  value="3day">未来三天</option><?php endif; ?>
                                <?php if($_GET['time'] == '1week' || $_POST['time'] == '1week'): ?><option selected value="1week">未来一周</option>
                                    <?php else: ?>
                                    <option  value="1week">未来一周</option><?php endif; ?>
                                <?php if($_GET['time'] == '1mon' || $_POST['time'] == '1mon'): ?><option selected value="1mon">未来一月</option>
                                    <?php else: ?>
                                    <option  value="1mon">未来一月</option><?php endif; ?>
                                <?php if($_GET['time'] == '3mon' || $_POST['time'] == '3mon'): ?><option selected value="3mon">未来三月</option>
                                    <?php else: ?>
                                    <option  value="3mon">未来三月</option><?php endif; ?>
                                <?php if($_GET['time'] == 'over'|| $_POST['time'] == 'over'): ?><option selected value="over">已经结束</option>
                                    <?php else: ?>
                                    <option  value="over">已经结束</option><?php endif; ?>
                                <?php else: ?>
                                <option value="underway">正在进行</option>
                                <option value="3day">未来三天</option>
                                <option value="1week">未来一周</option>
                                <option value="1mon">未来一月</option>
                                <option selected value="3mon">未来三月</option>
                                <option value="over">已经结束</option><?php endif; ?>
                        </select>
                    </div>
                    <input type="submit" value="搜索">
                    <div class="clear"></div>
                </form>
            </section>
            <section class="list">
                <?php if(!empty($actis)): if(is_array($actis)): foreach($actis as $key=>$row): ?><div class="con">
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
                    <?php else: ?>
                    <div class="no">
                        没有更多活动了哦
                    </div><?php endif; ?>
            </section>
        </article>
        <aside>
            <section>
                <?php if(is_array($advers)): foreach($advers as $key=>$row): ?><figure>
                        <a href="<?php echo ($row['link']); ?>"><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>"/></a>
                    </figure><?php endforeach; endif; ?>
            </section>
        </aside>
        <div class="clear"></div>
    </div>
</body>
</html>