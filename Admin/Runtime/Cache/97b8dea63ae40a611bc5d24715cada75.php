<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加站点</title>
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
        <span class="glyphicon glyphicon-home"></span><label for="exampleInputEmail1">站点名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="sitename" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-refresh"></span><label for="exampleInputPassword1">链接</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="link" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-picture"></span><label for="exampleInputPassword1">站点logo</label>
        <input type="file" class="form-control" name="img">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-align-justify"></span><label for="exampleInputPassword1">选择类别</label>
        <select name="class" class="form-control">
            <option disabled>选择</option>
            <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option>
                <?php if(is_array($row['zi'])): foreach($row['zi'] as $key=>$row2): ?><option value="<?php echo ($row2['id']); ?>">&nbsp;&nbsp;&nbsp;|__<?php echo ($row2['name']); ?></option><?php endforeach; endif; endforeach; endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">提交</button>
</form>
</body>
</html>