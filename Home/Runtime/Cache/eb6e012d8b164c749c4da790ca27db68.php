<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人设置</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/settings.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
    <script>
        $(function(){
            $('.info ul li a').hover(function(){
                $(this).css({'color':'#0AA284'})
            },function(){
                $(this).css({'color':'#606060'})
            });

            if(!"<?php echo ($_GET['change']); ?>"){
                $('.dyli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.dyli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });

                $('.typ').click(function(){
                    $('.upload input[type=file]').click();
                })

                $('.upload input[type=file]').change(function(){
                    $('.typ input[type=text]').val($(this).val());
                    if($(this).val()==''){
                        $('.typ input[type=text]').val('未选择任何图片')
                    }
                });

                $('.er input[type=submit]').click(function(){
                    if($('.upload input[type=file]').val()==''){
                        $('.upload .error').css({'display':'block'});
                        return false;

                    }
                })

                $('.upload .form-group.er input[type=button]').click(function(){
                    $('.upload').hide();
                    $('.modal').hide();
                })

                $('.info-con figure').click(function(){
                    $('.upload').show();
                    $('.modal').show();
                })
            }

            if("<?php echo ($_GET['change']); ?>"=="modifymailbox"){
                $('.theli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.theli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });

            }
            if("<?php echo ($_GET['change']); ?>"=='modifypassword'){
                $('.collli').css({'border-bottom':'1px solid #0AA284'}).find('a').css({'color':'#0AA284'})
                $('.collli').find('a').hover(function(){
                    $(this).css({'color':'#0AA284'})
                },function(){
                    $(this).css({'color':'#0AA284'})
                });
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
        <article>
            <?php if(!isset($_GET['change'])): ?><h1>账号信息</h1><?php endif; ?>
            <?php if($_GET['change'] == 'modifymailbox'): ?><h1>修改邮箱</h1><?php endif; ?>
            <?php if($_GET['change'] == 'modifypassword'): ?><h1>修改密码</h1><?php endif; ?>
            <section  class="info">
                <ul>
                    <li class="dyli"><a href="__APP__/Person/settings/id/<?php echo ($_GET['id']); ?>">账号信息</a> </li>
                    <li class="theli"><a href="__APP__/Person/settings/id/<?php echo ($_GET['id']); ?>/change/modifymailbox">修改邮箱</a> </li>
                    <li class="collli"><a href="__APP__/Person/settings/id/<?php echo ($_GET['id']); ?>/change/modifypassword">修改密码</a> </li>
                    <div class="clear"></div>
                </ul>
                <div class="info-con">
                    <?php if(!isset($_GET['change'])): ?><figure>
                            <?php if(!empty($user['img'])): ?><img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>"/>
                                <?php else: ?>
                                <img src="/kt/Public/Images/man.jpg"/><?php endif; ?>
                            <figcaption></figcaption>
                            <div class="font">上传头像</div>
                        </figure>
                        <?php if($tip == 'nouser'): ?><div class="uploaderror">用户名不能为空</div><?php endif; ?>
                        <?php if($tip == 'success'): ?><div class="success">更新成功</div><?php endif; ?>
                        <?php if($tip == 'uploaderror'): ?><div class="uploaderror"><?php echo ($error); ?></div><?php endif; ?>
                        <?php if($tip == 'uploadsuccess'): ?><div class="uploadsuccess">上传成功</div><?php endif; ?>
                        <p><span>邮箱:</span><span><?php echo ($user['email']); ?></span></p>
                        <form action="__URL__/settings/id/<?php echo ($_GET['id']); ?>" method="post">
                            <div class="form-group">
                                <label>用户名:</label>
                                <input type="text" name="user" value="<?php echo ($_SESSION['username']); ?>">
                            </div>
                            <p><span>注册时间</span><?php echo date('Y-m-d H:i',$user['registrtime']);?></p>
                            <input type="hidden" value="<?php echo ($_GET['id']); ?>" name="id">
                            <div class="form-group">
                            <input type="submit" value="提交">
                            </div>
                        </form>
                        <div class="upload">
                            <h2>上传头像</h2>
                            <form action="__URL__/settings/id/<?php echo ($_GET['id']); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group fi">
                                    <input type="file" name="img">
                                    <div class="typ">
                                        <div class="btn">选择本地图片</div>
                                        <input type="text" disabled>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo ($_GET['id']); ?>" name="id">
                                <div class="error">请选择上传文件</div>
                                <div class="form-group er">
                                    <input type="submit" value="上传">
                                    <input type="button" value="取消">
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal"></div><?php endif; ?>
                    <?php if($_GET['change'] == 'modifymailbox'): if($_GET['tip'] == 'noemail'): ?><div class="uploaderror">邮箱不能为空</div><?php endif; ?>
                        <?php if($_GET['tip'] == 'emailerror'): ?><div class="uploaderror">邮箱格式不正确</div><?php endif; ?>
                        <?php if($_GET['tip'] == 'success'): ?><div class="uploadsuccess">修改成功</div><?php endif; ?>
                        <form action="<?php echo U('modifymail');?>" method="post" class="modifymailbox">
                            <div class="form-group first">
                                <label>当前邮箱:</label>
                                <span><?php echo ($user['email']); ?></span>
                            </div>
                            <div class="form-group">
                                <label>新邮箱:</label>
                                <input type="text" name="email">
                            </div>
                            <input type="hidden" value="<?php echo ($_SESSION['user_id']); ?>" name="id">
                            <div class="form-group">
                                <input type="submit" value="提交">
                            </div>
                        </form><?php endif; ?>
                    <?php if($_GET['change'] == 'modifypassword'): if($_GET['tip'] == 'error'): ?><div class="uploaderror">当前密码不正确</div><?php endif; ?>
                        <?php if($_GET['tip'] == 'errorlength'): ?><div class="uploaderror">新密码必须在7~10个字符之间</div><?php endif; ?>
                        <?php if($_GET['tip'] == 'nosame'): ?><div class="uploaderror">两次密码不一致</div><?php endif; ?>
                        <?php if($_GET['tip'] == 'success'): ?><div class="uploadsuccess">密码修改成功</div><?php endif; ?>
                        <form action="<?php echo U('modifypassword');?>" method="post">
                            <div class="form-group">
                                <label>当前密码</label>
                                <input type="password" name="password">
                            </div>
                            <div class="form-group new">
                                <label class="new">新密码</label>
                                <input type="password" name="newpassword">
                            </div>
                            <input type="hidden" name="id" value="<?php echo ($_SESSION['user_id']); ?>">
                            <div class="form-group">
                                <label>确认密码</label>
                                <input type="password" name="repassword">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="提交">
                            </div>
                        </form><?php endif; ?>
                </div>
                <div class="Separate"></div>
            </section>
        </article>
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