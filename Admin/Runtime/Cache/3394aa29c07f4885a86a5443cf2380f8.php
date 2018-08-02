<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看广告</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        td {
            vertical-align: middle!important;
        }
        .lia{
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            width: 100px;
            display: inline-block;
        }
    </style>
</head>
<body>
<table class="table table-striped table-bordered table-hover table-condensed text-center" >
    <tr>
        <th  class="text-center">
            ID
        </th>
        <th  class="text-center">
            广告链接
        </th>
        <th  class="text-center">
            广告图片
        </th>
        <th  class="text-center">
            广告添加时间
        </th>
        <th  class="text-center">
            广告放置位置
        </th>

        <th  class="text-center">
            修改
        </th>
        <th  class="text-center">
            删除
        </th>
    </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr>
            <td><?php echo ($row['id']); ?></td>
            <td><a href="<?php echo ($row['link']); ?>" class="lia"><?php echo ($row['link']); ?></a> </td>
            <td><img src="__PUBLIC__/Uploads/adverimg/<?php echo ($row['img']); ?>"> </td>
            <td><?php echo date('Y-m-d H:i',$row['time']);?></td>
            <td><?php echo ($row['pos']); ?></td>
            <td><a href="__URL__/edit/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-wrench"></span></a> </td>
            <td><a href="__URL__/delete/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a> </td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="7" class="manu"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
</html>