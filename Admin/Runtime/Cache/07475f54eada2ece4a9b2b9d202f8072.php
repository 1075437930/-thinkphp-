<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看分类</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        .shu{
            font-size: 15px;
        }
        td {
            vertical-align: middle!important;
        }
    </style>
</head>
<body>
    <table class="table table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th class="text-center">
                分类
            </th>
            <th class="text-center">
                修改
            </th>
            <th class="text-center">
                删除
            </th>
        </tr>
        <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr>
                <td class="shu"><?php echo ($row['tree']); ?></td>
                <td class="text-center"><a href="__URL__/edit/id/<?php echo ($row['id']); ?>/pid/<?php echo ($row['pid']); ?>"> <span class="glyphicon glyphicon-wrench"></span></a> </td>
                <td class="text-center"><a href="__URL__/delete/id/<?php echo ($row['id']); ?>"> <span class="glyphicon glyphicon-remove-sign"></span></a></td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan="3" class="manu"><?php echo ($show); ?></td>
        </tr>
    </table>
</body>
</html>