<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改分类</title>
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
<form role="form" action="__URL__/update" method="post">
    <div class="form-group">
        <span class="glyphicon glyphicon-align-left"></span><label for="exampleInputEmail1">分类名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="class" value="<?php echo ($name); ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
    <div class="form-group">
        <span class="glyphicon glyphicon-list"></span><label >选择父级分类</label>
        <select name="fclass" class="form-control">
            <option disabled>选择</option>
            <option value="0" class="text-danger">顶级分类</option>
            <option disabled>----------</option>
            <?php if(is_array($rows)): foreach($rows as $key=>$row): if($row['id'] == $_GET['pid']): ?><option value="<?php echo ($row['id']); ?>" selected><?php echo ($row['tree']); ?></option>
                    <?php else: ?>
                    <option value="<?php echo ($row['id']); ?>"><?php echo ($row['tree']); ?></option><?php endif; endforeach; endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">修改</button>
</form>
</body>
</html>