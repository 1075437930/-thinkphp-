<?php if (!defined('THINK_PATH')) exit(); if(isset($sits)): if(is_array($sits)): foreach($sits as $key=>$row): ?><figure class="jia">
            <img src="__PUBLIC__/Uploads/theimg/<?php echo ($row['img']); ?>">
            <figcaption>
                <a href="__APP__/Theme/theartall/id/<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
                <?php if($row['count'] == 1): ?><button class="subed" vid="<?php echo ($row['id']); ?>">已订阅</button>
                    <?php else: ?>
                    <button class="nosub" vid="<?php echo ($row['id']); ?>">+订阅</button><?php endif; ?>
            </figcaption>
            <div class="clear"></div>
        </figure><?php endforeach; endif; ?>
    <?php else: ?>
   <div class="none">
       暂无相关主题
   </div><?php endif; ?>