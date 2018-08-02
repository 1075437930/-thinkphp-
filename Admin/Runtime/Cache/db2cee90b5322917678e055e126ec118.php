<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看此主题下的所有文章</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        td{
            text-align: center;
            vertical-align: middle!important;
        }
        td.nei {
            line-height: 21px!important;
            width: 164px;
        }
        .xb{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;

        }
        .lia{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 162px;
            display: inline-block;
        }
    </style>
</head>
<body>
<table class="table table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th class="text-center xb">文章标题</th>
        <th class="text-center">原文链接</th>
        <th class="text-center xb">文章内容</th>
        <th class="text-center xb">从属站点</th>
        <th class="text-center">添加时间</th>
        <th class="text-center">点赞数</th>
        <th class="text-center">修改</th>
        <th class="text-center">删除</th>
    </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr>
            <td class="nei"><?php echo ($row['title']); ?></td>
            <td><a href="<?php echo ($row['link']); ?>" target="_blank" class="lia"> <?php echo ($row['link']); ?></a></td>
            <td class="nei"><?php echo ($row['content']); ?></td>
            <td><?php echo ($row['sit']); ?></td>
            <td><?php echo date("Y-m-d",$row['time']);?></td>
            <td><?php echo ($row['fab']); ?></td>
            <td><a href="__URL__/edit/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-wrench"></span></a> </td>
            <td><a href="__URL__/delete/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="7" class="manu"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
</html>