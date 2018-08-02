<?php if (!defined('THINK_PATH')) exit();?><div class="reps">
    <?php if($_SESSION['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg"  >
        <?php else: ?>
        <img src="__PUBLIC__/Uploads/headport/<?php echo ($_SESSION['img']); ?>"><?php endif; ?>
    <div class="reps-co">
        <p><span><?php echo ($_SESSION['username']); ?></span><span>回复了他</span><time><?php echo date('m-d H:i',time());?></time></p>
        <p class="comment-con"><?php echo ($_POST['content']); ?></p>
    </div>
</div>