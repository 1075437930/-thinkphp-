<?php if (!defined('THINK_PATH')) exit();?><ul>
    <?php if(is_array($cas)): foreach($cas as $key=>$row): ?><li><?php echo ($row['name']); ?></li><?php endforeach; endif; ?>
    <div class="clear"></div>
</ul>
<div class="the-con">
    <?php if(is_array($thes)): foreach($thes as $key=>$row): ?><figure>
            <img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>">
            <figcaption>
                <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                <button class="subbut">+订阅</button>
                <div class="tip">请先登录</div>
            </figcaption>
            <div class="clear"></div>
        </figure><?php endforeach; endif; ?>
</div>