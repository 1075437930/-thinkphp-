<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看活动</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        td {
            vertical-align: middle!important;
            text-align: center;
        }
        td.nei {
            line-height: 21px!important;
            width: 164px;
        }
        .li a{
            display: inline-block;
            width: 100px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<table class="table table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th class="text-center">活动</th>
        <th class="text-center">活动内容</th>
        <th class="text-center">活动链接</th>
        <th class="text-center">活动时间</th>
        <th class="text-center">活动品牌</th>
        <th class="text-center">活动类别</th>
        <th class="text-center">活动地点</th>
        <th class="text-center">修改</th>
        <th class="text-center">删除</th>
    </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><tr>
            <td>
                <?php echo ($row['title']); ?>
            </td>
            <td class="nei">
                <?php echo ($row['content']); ?>
            </td>
            <td class="li">
                <a href="<?php echo ($row['link']); ?>"><?php echo ($row['link']); ?></a>
            </td>
            <td>
                <?php echo date('Y-m-d H:i',$row['start']);?>至<?php echo date('H:i',$row['end']);?>
            </td>
            <td>
                <?php echo ($row['bn']); ?>
            </td>
            <td>
                <?php echo ($row['cn']); ?>
            </td>
            <td>
                <?php echo ($row['tn']); ?>&nbsp;&nbsp;&nbsp;<?php echo ($row['info']); ?>
            </td>
            <td> <a href="__URL__/edit/id/<?php echo ($row['id']); ?>"> <span class="glyphicon glyphicon-wrench"></span></a></td>
            <td> <a href="__URL__/delete/id/<?php echo ($row['id']); ?>"> <span class="glyphicon glyphicon-remove-sign"></span></a></td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="8" class="manu"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
</html>