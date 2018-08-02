<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改主题</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        form{
            width: 50%;
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
        <span class="glyphicon glyphicon-certificate"></span><label for="exampleInputEmail1">主题</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo ($_GET['name']); ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
    <div class="form-group">
        <span class="glyphicon glyphicon-picture"></span><label>主题图片</label><br>
        <img src="__PUBLIC__/Uploads/theimg/<?php echo ($img); ?>" class="img-thumbnail">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-circle-arrow-up"></span><label>上传新图</label>
        <input type="file" class="form-control" name="img">
        (如果不需要改变图片就不用上传)
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-align-justify"></span><label>选择类别</label>
        <select name="class" class="form-control">
            <option disabled>选择</option>
            <?php if(is_array($rows)): foreach($rows as $key=>$row): if($row['id'] == $_GET['class']): ?><option value="<?php echo ($row['id']); ?>" selected><?php echo ($row['name']); ?></option>
                    <?php else: ?>
                    <option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endif; endforeach; endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">修改</button>
</form>
</body>
</html>