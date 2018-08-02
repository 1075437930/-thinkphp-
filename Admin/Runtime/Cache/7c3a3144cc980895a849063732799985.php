<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加主题</title>
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
<form role="form" action="__URL__/insert" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <span class="glyphicon glyphicon-certificate"></span><label for="exampleInputEmail1">主题</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-picture"></span><label>图片</label>
        <input type="file" class="form-control" name="img">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-align-justify"></span><label>选择类别</label>
        <select name="class" class="form-control">
            <option disabled>选择</option>
            <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endforeach; endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">提交</button>
</form>
</body>
</html>