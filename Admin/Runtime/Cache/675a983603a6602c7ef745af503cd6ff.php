<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
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
<form role="form" action="__URL__/insert" method="post">
    <div class="form-group">
        <span class="glyphicon glyphicon-align-left"></span><label for="exampleInputEmail1">分类名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="class">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-list"></span><label >选择父级分类</label>
        <select name="fclass" class="form-control">
            <option disabled>选择</option>
            <option value="0" class="text-danger">顶级分类</option>
            <option disabled>----------</option>
            <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['tree']); ?></option><?php endforeach; endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">提交</button>
</form>
</body>
</html>