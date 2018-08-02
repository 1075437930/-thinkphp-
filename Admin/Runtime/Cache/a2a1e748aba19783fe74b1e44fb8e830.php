<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看站点下的所有文章</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        .cc{
            text-align: center;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;;
            width: 275px;
            display: inline-block;
            height: 43px;
            vertical-align: middle;
        }
        td{
            vertical-align: middle!important;
            text-align: center;
        }
        a{
            width: 100px;
            display: inline-block;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;;
        }
        th.text-center.nei {
            width: 210px;
        }
    </style>
</head>
<body>
<table class="table table table-striped table-bordered table-hover" >
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center nei">文章标题</th>
            <th class="text-center">添加时间</th>
            <th class="text-center">原文链接</th>
            <th class="text-center nei">文章内容</th>
            <th class="text-center">点赞数</th>
            <th class="text-center">修改</th>
            <th class="text-center">删除</th>
        </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr>
            <td><?php echo ($row['id']); ?></td>
            <td class="cc"><?php echo ($row['title']); ?></td>
            <td><?php echo date('Y-m-d',$row['time']);?></td>
            <td><a href="<?php echo ($row['link']); ?>"><?php echo ($row['link']); ?></a> </td>
            <td class="cc"><?php echo htmlspecialchars_decode($row['content']);?></td>
            <td><?php echo ($row['fabnum']); ?></td>
            <td> <a href="__URL__/aredit/id/<?php echo ($row['id']); ?>"> <span class="glyphicon glyphicon-wrench"></span></a></td>
            <td> <a href="__URL__/ardelete/id/<?php echo ($row['id']); ?>"> <span class="glyphicon glyphicon-remove-sign"></span></a></td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td class="manu" colspan="8"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
</html>