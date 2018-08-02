<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主题</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/theindex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        $(function(){
            $('.mysite li').click(function(){
                va=$(this).attr('sid');
                na=$(this).attr('na');
                $.ajax({
                    url: "<?php echo U('arlist');?>",
                    type: "get",
                    data: {'id': va,'na':na},
                    success: function (data) {
                        $('article section').html(data)
                    }
                })
            })
            $(document).on('click','.the-con button',function(){
                obj=$(this);
                vid=obj.attr('vid');
                if(obj.html()=='+订阅'){
                    $.ajax({
                        url:"<?php echo U('subhand');?>",
                        type:"get",
                        data:{sub:1,article:vid},
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
                        data:{sub:0,article:vid},
                        success:function(data){
                            if(data==0){
                                obj.html('+订阅').removeClass('subed').addClass('nosub')
                            }
                        }
                    })
                }
            })

            $('.sites .drop').click(function(){
                $.ajax({
                    url:"<?php echo U('theshow');?>",
                    type:'get',
                    success:function(data){
                        $('article section').html(data)
                        $('article ul li').eq(0).css({'background':'#0AA284','color':'white'})
                    }
                })
            });

            $(document).on('click','article ul li',function(){
                $(this).css({'background':'#0AA284','color':'white'}).siblings().css({'background':'','color':'#333333'});
                va=$(this).attr('uid');
                $.ajax({
                    url: "<?php echo U('findthe');?>",
                    type: "get",
                    data: {'id': va},
                    success: function (data) {
                        $('.the-con').html(data)
                    }
                })
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
        <aside>
            <section class="search">
                <form action="__APP__/Search/index" method="get">
                    <input type="text" placeholder="搜索主题" name="thekey">
                </form>
            </section>
            <section class="sites">
                <div class="drop"><i></i><span>热门主题</span></div>
            </section>
            <section class="mysite">
                <div class="drop"><i class="my"></i><span>我的主题</span></div>
                <ul class="dropdown">
                    <?php if(is_array($mys)): foreach($mys as $key=>$row): ?><li sid="<?php echo ($row['id']); ?>" na="<?php echo ($row['name']); ?>"><img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>"><span><?php echo ($row['name']); ?></span></li><?php endforeach; endif; ?>
                </ul>
            </section>
        </aside>
        <article>
            <section>
                <?php if(!empty($mys)): if(is_array($mys)): foreach($mys as $key=>$row): ?><figure>
                            <img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>">
                            <figcaption>
                                <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                            </figcaption>
                            <div class="clear"></div>
                        </figure><?php endforeach; endif; ?>
                    <?php else: ?>
                    <div class="none">
                        你还没有订阅主题,去热门主题频道看看吧
                    </div><?php endif; ?>
                <div class="clear"></div>
            </section>
        </article>
    </div>
</body>
</html>