<?php if (!defined('THINK_PATH')) exit();?><figure>
    <?php if($_SESSION['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg" class="head" width="60px" height="40px">
        <?php else: ?>
        <img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>" width="60px" height="40px" alt="" class="head"><?php endif; ?>
    <figcaption>
        <p><span><?php echo ($_SESSION['username']); ?></span><time><?php echo date('m-d H:i',time());?></time></p>
        <p class="comment-con"><?php echo ($_POST['content']); ?></p>
    </figcaption>
    <div class="clear"></div>
</figure>