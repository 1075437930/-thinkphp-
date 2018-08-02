<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看站点</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        td {
            vertical-align: middle!important;
        }
    </style>
</head>
<body>
<table class="table table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">站点名</th>
        <th class="text-center">链接</th>
        <th class="text-center">logo</th>
        <th class="text-center">所属类别</th>
        <th class="text-center">文章数</th>
        <th class="text-center">订阅数</th>
        <th class="text-center">修改</th>
        <th class="text-center">删除</th>
    </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr class="text-center">
            <td><?php echo ($row['id']); ?></td>
            <td><?php echo ($row['name']); ?></td>
            <td><a href="<?php echo ($row['link']); ?>" target="_blank"><?php echo ($row['link']); ?></a> </td>
            <td><img src="__PUBLIC__/Uploads/sitelogo/<?php echo ($row['img']); ?>" width="100px" height="30px"></td>
            <td><?php echo ($row['class']); ?></td>
            <td><?php echo ($row['num']); ?></td>
            <td><?php echo ($row['subnum']); ?></td>
            <td> <a href="__URL__/edit/id/<?php echo ($row['id']); ?>/name/<?php echo ($row['name']); ?>/class/<?php echo ($row['class_id']); ?>"> <span class="glyphicon glyphicon-wrench"></span></a></td>
            <td> <a href="__URL__/delete/id/<?php echo ($row['id']); ?>"> <span class="glyphicon glyphicon-remove-sign"></span></a></td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="9" class="manu"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
</html>