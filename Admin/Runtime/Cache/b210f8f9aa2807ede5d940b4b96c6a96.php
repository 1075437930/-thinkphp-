<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看课程</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        td.nei {
            line-height: 21px!important;
            width: 164px;
        }
        .lia{
            overflow: hidden;
            display: inline-block;
            width: 200px;
        }
        td {
            vertical-align: middle!important;
            text-align: center;
        }

    </style>
</head>
<body>
<table class="table table-striped table-bordered table-hover table-condensed text-center" >
    <tr>
        <th  class="text-center">
            课程名
        </th>
        <th  class="text-center">
            课程链接
        </th>
        <th  class="text-center">
            课程图片
        </th>
        <th  class="text-center">
            课程简介
        </th>
        <th  class="text-center">
            所属品牌
        </th>
        <th  class="text-center">
            所属类别
        </th>
        <th  class="text-center">
            修改
        </th>
        <th  class="text-center">
            删除
        </th>
    </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr>
            <td class="nei"><?php echo ($row['title']); ?></td>
            <td class="li"><a href="<?php echo ($row['link']); ?>" target="_blank" class="lia"><?php echo ($row['link']); ?></a></td>
            <td><img src="__PUBLIC__/Uploads/courimg/<?php echo ($row['img']); ?>" height="100px"></td>
            <td class="nei"><?php echo ($row['content']); ?></td>
            <td><?php echo ($row['bn']); ?></td>
            <td><?php echo ($row['cn']); ?></td>
            <td><a href="__URL__/edit/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-wrench"></span></a> </td>
            <td><a href="__URL__/delete/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a> </td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="8" class="manu" style="line-height: 20px!important;"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
</html>