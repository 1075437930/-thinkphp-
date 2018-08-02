<?php if (!defined('THINK_PATH')) exit();?><h1><?php echo ($_GET['na']); ?></h1>
<p class="litip"><span>文章列表</span></p>
<?php if(!empty($thes)): if(is_array($thes)): foreach($thes as $key=>$row): ?><div class="piece">
            <div class="the-le">
                <a href="__APP__/Article/artinfo/id/<?php echo ($row['id']); ?>"><span class="tit"><?php echo ($row['title']); ?></span><?php echo ($row['content']); ?></a>
                <div class="clear"></div>
            </div>
            <span class="the-ri"><?php echo date('m-d H:i',$row['time']);?></span>
            <div class="clear"></div>
        </div><?php endforeach; endif; ?>
    <?php else: ?>
    <div class="no">
        此站点下暂无文章
    </div><?php endif; ?>