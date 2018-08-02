<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章详细内容</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/artinfo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
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
            <section class="art">
                <h1><?php echo ($art[0]['title']); ?></h1>
                <div class="info">
                    <p><span>时间</span> <span><?php echo date('Y-m-d H:i:s',$art[0]['time']);?></span><img src="../Public/Images/2017-01-11_172408.png"><a href="__APP__/Site/siteartall/id/<?php echo ($art[0]['si']); ?>" class="lin"><?php echo ($art[0]['sn']); ?></a></p>
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