<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改广告</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        form{
            width: 70%;
            margin: 0 auto;
        }
        span.glyphicon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<form role="form" action="__URL__/update" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <span class="glyphicon glyphicon-link"></span><label for="exampleInputEmail1">广告链接</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="link" value="<?php echo ($row['link']); ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
    <div class="form-group">
        <span class="glyphicon glyphicon-circle-arrow-up"></span><label for="exampleInputEmail1">上传广告图片</label><br>
        <img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>" class="img-thumbnail">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-circle-arrow-up"></span><label for="exampleInputEmail1">上传广告图片</label>
        <input type="file" name="img" class="form-control">
        (如果不要改变广告图，无需上传)
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-inbox"></span><label for="exampleInputEmail1">选择放置位置</label>
        <select name="pos" class="form-control">
            <option disabled>选择</option>
            <?php if($row['pos'] == '前台首页左侧'): ?><option value="前台首页左侧" selected>前台首页左侧</option>
                <?php else: ?>
                <option value="前台首页左侧">前台首页左侧</option><?php endif; ?>
            <?php if($row['pos'] == '前台首页右侧'): ?><option value="前台首页右侧" selected>前台首页右侧</option>
                <?php else: ?>
                <option value="前台首页右侧">前台首页右侧</option><?php endif; ?>
            <?php if($row['pos'] == '文章区'): ?><option value="文章区" selected>文章区</option>
                <?php else: ?>
                <option value="文章区">文章区</option><?php endif; ?>
            <?php if($row['pos'] == '活动区'): ?><option value="活动区" selected>活动区</option>
                <?php else: ?>
                <option value="活动区">活动区</option><?php endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-danger">修改</button>
</form>
</body>
</html>