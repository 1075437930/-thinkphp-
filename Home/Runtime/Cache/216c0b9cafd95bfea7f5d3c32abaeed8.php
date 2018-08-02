<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>品牌下的课程</title>
    <link href="../Public/Css/base.css" rel="stylesheet">
    <link href="../Public/Css/brall.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/Js/header.js"></script>
    <script src="__PUBLIC__/Js/html5shiv.js"></script>
</head>
<body>
    <div class="top">
        <figure>
            <img src="__PUBLIC__/Uploads/brand/<?php echo ($brand['img']); ?>">
            <figcaption>
                <?php echo ($brand['name']); ?>
            </figcaption>
        </figure>
        <a href="__APP__/Course/index" class="tz">更多课程</a>
        <div class="clear"></div>
    </div>
    <div class="content">
        <h1><span>课程列表</span></h1>
        <section class="con">
            <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><figure>
                    <a href="__APP__/Course/courinfo/id/<?php echo ($row['id']); ?>">
                    <img src="__PUBLIC__/Uploads/courimg/<?php echo ($row['img']); ?>">
                    <figcaption><?php echo ($row['title']); ?></figcaption>
                    </a>
                </figure><?php endforeach; endif; ?>
            <div class="clear"></div>
        </section>
        <div class="manu"><?php echo ($show); ?></div>
    </div>
</body>
</html>