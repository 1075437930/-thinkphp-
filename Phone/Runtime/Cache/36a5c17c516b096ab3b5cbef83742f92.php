<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章详细内容</title>
    <link rel="stylesheet" href="../Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Css/header.css">
    <link href="../Public/Css/artinfo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script>
        var addfab="<?php echo U('addfab');?>";
        var userid="<?php echo ($_SESSION['user_id']); ?>";
        var id="<?php echo ($_GET['id']); ?>";
        var collhand="<?php echo U('collhand');?>";
        var addcomment="<?php echo U('addcomment');?>";
        var addreplay="<?php echo U('addreplay');?>";
        var subhand="<?php echo U('subhand');?>";
    </script>
    <script src="../Public/Js/artinfo.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="__APP__/Index/index"><strong class="text-black">资讯网</strong></a>
        </div>
        <li class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(MODULE_NAME == 'Article'): ?><li class="active"><a href="<?php echo U('Article/index');?>" style="color: #16A085">文章</a> </li>
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
            <form class="navbar-form navbar-left form-inline" action="<?php echo U('Search/index');?>" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索" name="artkey">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <?php if(!isset($_SESSION['user_id'])): ?><a href="__APP__/Login/login">登录</a>
                    <?php else: ?>
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if($_SESSION['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg" class="head" width="60px" height="40px">
                        <?php else: ?>
                        <img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>" width="60px" height="40px" alt="" class="head"><?php endif; ?>
                        <span><?php echo ($_SESSION['username']); ?></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="__APP__/Person/myindex/id/<?php echo ($_SESSION['user_id']); ?>/name/<?php echo ($_SESSION['username']); ?>">我的主页</a> </li>
                        <li><a href="__APP__/Person/mycoll/id/<?php echo ($_SESSION['user_id']); ?>">我的收藏</a></li>
                        <li><a href="__APP__/Person/settings/id/<?php echo ($_SESSION['user_id']); ?>">个人设置</a></li>
                        <li><a href="__APP__/Person/message/id/<?php echo ($_SESSION['user_id']); ?>">消息通知</a></li>
                        <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
                    </ul><?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="backtop"></div>

    <div class="container">
        <div class="row">
        <div class="col-md-9">
        <article>
            <section class="art">
                <h1><?php echo ($art[0]['title']); ?></h1>
                <div class="info">
                    <p><span>时间</span> <span class="time"><?php echo date('Y-m-d H:i:s',$art[0]['time']);?></span><img src="../Public/Images/2017-01-11_172408.png"><a href="__APP__/Site/siteartall/id/<?php echo ($art[0]['si']); ?>" class="lin"><?php echo ($art[0]['sn']); ?></a></p>
                    <p><span>原文</span><a href="<?php echo ($art[0]['link']); ?>" class="lin" target="_blank" ><?php echo ($art[0]['link']); ?></a> </p>
                    <p><span>主题</span><a href="__APP__/Theme/theartall/id/<?php echo ($art[0]['ti']); ?>" class="zlin"><?php echo ($art[0]['tn']); ?></a> </p>
                </div>
                <div class="con">
                   <?php echo htmlspecialchars_decode($art[0]['content']);?>
                </div>
                <?php if($isfab == 1): ?><div class="fabulous" style="background-position:-6px -7px;"></div>
                    <?php else: ?>
                    <div class="fabulous" style="background-position:-6px -87px;"></div><?php endif; ?>
                <div class="fabtip"></div>
                <div class="share">
                    <div class="row">
                    <div class="col-xs-7">
                    <div class="sha-le">
                        <span>分享</span>
                        <div class="bdsharebuttonbox" data-tag="share_1">
                            <a class="bds_mshare" data-cmd="mshare"></a>
                            <a class="bds_qzone" data-cmd="qzone" href="#"></a>
                            <a class="bds_tsina" data-cmd="tsina"></a>
                            <a class="bds_baidu" data-cmd="baidu"></a>
                            <a class="bds_renren" data-cmd="renren"></a>
                            <a class="bds_tqq" data-cmd="tqq"></a>
                            <a class="bds_more" data-cmd="more">更多</a>
                            <a class="bds_count" data-cmd="count"></a>
                        </div>
                        <script>
                            window._bd_share_config = {
                                common : {
                                    bdText : "<?php echo ($art[0]['title']); ?>",
                                    bdDesc : '',
                                    bdUrl : "<?php echo ($art[0]['link']); ?>",
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
                    </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="sha-ri">
                        <div class="coll">
                            <?php if($iscoll == 1): ?><img src="../Public/Images/2017-01-12_164828.png">
                                <span>已收藏</span>
                                <?php else: ?>
                                <img src="../Public/Images/2017-01-11_180151.png">
                                <span>收藏</span><?php endif; ?>
                        </div>
                        <div class="fabtip"></div>
                    </div>
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </section>
            <section class="recommend">
                 <h1>推荐文章</h1>
                 <?php if(is_array($res)): foreach($res as $key=>$row): ?><p><span><?php echo ($key+1); ?>.</span><a href="__URL__/artinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </p><?php endforeach; endif; ?>
            </section>
            <section class="comment">
                  <h1>我来评几句</h1>
                   <p class="error">评论不能为空</p>
                  <form>
                      <div class="form-group">
                        <textarea name="comment" placeholder="请输入评论内容..."></textarea>
                      </div>
                      <div class="form-group third">
                          <p>已发表评论数(<span><?php echo ($iscommen); ?></span>)</p>
                          <?php if(isset($_SESSION['user_id'])): ?><input type="button" value="发表评论">
                                <?php else: ?>
                                <input type="button" value="登录后评论"><?php endif; ?>
                          <div class="clear"></div>
                      </div>
                  </form>
            </section>
            <section class="comment-info">
                <?php if(is_array($comments)): foreach($comments as $key=>$row): ?><figure>
                          <?php if($row['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg" class="head" >
                              <?php else: ?>
                              <img src="__PUBLIC__/Uploads/headport/<?php echo ($row['img']); ?>"  alt="" class="head"><?php endif; ?>
                          <figcaption>
                              <p><span><?php echo ($row['username']); ?></span><time><?php echo date('m-d H:i',$row['time']);?></time></p>
                              <p class="comment-con"><?php echo ($row['content']); ?></p>
                          </figcaption>
                          <a href="javascript:" class="reply" rename="<?php echo ($row['username']); ?>" reid="<?php echo ($row['id']); ?>">回复</a>
                          <?php if(is_array($row['replays'])): foreach($row['replays'] as $key=>$row2): ?><div class="reps">
                                  <?php if($row2['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg"  >
                                      <?php else: ?>
                                      <img src="__PUBLIC__/Uploads/headport/<?php echo ($row2['img']); ?>"><?php endif; ?>
                                  <div class="reps-co">
                                      <p><span><?php echo ($row2['username']); ?></span><span>回复了他</span><time><?php echo date('m-d H:i',$row2['time']);?></time></p>
                                      <p class="comment-con"><?php echo ($row2['content']); ?></p>
                                  </div>
                              </div><?php endforeach; endif; ?>
                          <div class="clear"></div>
                      </figure><?php endforeach; endif; ?>
                    <div class="re">
                        <form>
                            <h1>回复<span class="direct"></span><span class="close">X</span></h1>
                            <textarea></textarea>
                            <button type="button">确认</button>
                        </form>
                    </div>
            </section>
            <div class="manu"><?php echo ($show); ?></div>
        </article>
        </div>
         <div class="col-md-3">
            <aside>
            <section class="about">
                <h1>相关站点</h1>
                <figure>
                    <img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($art[0]['sm']); ?>">
                    <figcaption>
                        <p><a href="__APP__/Site/siteartall/id/<?php echo ($art[0]['si']); ?>"><?php echo ($art[0]['sn']); ?></a> </p>
                        <?php if($issub == 1): ?><button class="subed">已订阅</button>
                            <?php else: ?>
                            <button class="nosub">+订阅</button><?php endif; ?>
                        <div class="fabtip"></div>
                    </figcaption>
                    <div class="clear"></div>
                </figure>
            </section>
            <section class="recommend hot">
                <h1>热门文章</h1>
                <?php if(is_array($arts)): foreach($arts as $key=>$row): ?><p><span><?php echo ($key+1); ?>.</span><a href="__URL__/artinfo/id/<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></a> </p><?php endforeach; endif; ?>
            </section>
            <section class="adver">
                <?php if(is_array($advers)): foreach($advers as $key=>$row): ?><figure>
                        <a href="<?php echo ($row['link']); ?>" target="_blank"> <img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>"></a>
                    </figure><?php endforeach; endif; ?>
            </section>
        </aside>
         </div>
        </div>
    </div>
    <div class="row footer">
    <div class="col-md-4">
    <span>友情链接</span>
    <a href="http://www.snsiu.com/">行晓网</a>
    <a href="http://www.iterduo.com/">IT耳朵</a>
    <a href="http://www.ibeifeng.com/">北风网</a>
    </div>
</div>
</body>
</html>