<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看文章</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        td {
            vertical-align: middle!important;
            text-align: center;
            line-height: 100px!important;
            height: 100px!important;
        }
        .ri{
            margin-right: 20px;
        }
        .pull-right{
            color:black;
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
            width: 131px;
            display: inline-block;
        }
    </style>
</head>
<body>
<?php if(is_array($rows)): foreach($rows as $key=>$row): ?><div class="panel panel-primary">
        <div class="panel-heading">
            <span class="ri"><?php echo ($row['name']); ?></span>
            <span style="color: black">此主题下共有<?php echo ($row['num']); ?>篇文章</span>
            <a href="__URL__/all/id/<?php echo ($row['id']); ?>" class="pull-right">点击查看此主题下的所有文章</a>
        </div>

        <div class="panel-body">
            <table class="table table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <th class="text-center xb">文章标题</th>
                    <th class="text-center">原文链接</th>
                    <th class="text-center xb">文章内容</th>
                    <th class="text-center ">从属站点</th>
                    <th class="text-center">添加时间</th>
                    <th class="text-center">点赞数</th>
                    <th class="text-center">修改</th>
                    <th class="text-center">删除</th>
                </tr>
                <?php if(is_array($row['art'])): foreach($row['art'] as $key=>$row2): ?><tr>
                        <td><?php echo ($row2['title']); ?></td>
                        <td><a href="<?php echo ($row2['link']); ?>" target="_blank" class="lia"> <?php echo ($row2['link']); ?></a></td>
                        <td class="nei"><?php echo ($row2['content']); ?></td>
                        <td><?php echo ($row2['sit']); ?></td>
                        <td><?php echo date('Y-m-d',$row2['time']);?></td>
                        <td><?php echo ($row2['fab']); ?></td>
                        <td class="a1"><a href="__URL__/edit/id/<?php echo ($row2['id']); ?>"><span class="glyphicon glyphicon-wrench"></span></a> </td>
                        <td class="a1"><a href="__URL__/delete/id/<?php echo ($row2['id']); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                    </tr><?php endforeach; endif; ?>
            </table>
        </div>
    </div><?php endforeach; endif; ?>
<p class="manu text-center"><?php echo ($show); ?></p>
</body>
</html>