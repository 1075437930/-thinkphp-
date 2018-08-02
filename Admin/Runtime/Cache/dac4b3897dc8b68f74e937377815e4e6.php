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
        span {
              margin-right: 22px;
          }
        span.cn {
            font-weight: bold;
            color: black;
        }
        td{
            text-align: center;
        }
        .cc{
            text-align: center;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;;
            width: 275px;
            display: inline-block;
            height: 43px;

        }
        td{
            vertical-align: middle!important;
            text-align: center;
        }
        table a{
            width: 100px;
            display: inline-block;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;;
        }
        th.text-center.nei {
            width: 210px;
        }
        .re{
            color: red;
        }
    </style>
</head>
<body>
<?php if(is_array($rows)): foreach($rows as $key=>$row): ?><div class="panel panel-danger">
        <div class="panel-heading">
            <span class="cn">站点名</span><span class="re"><?php echo ($row['name']); ?></span><span class="cn">链接</span>
            <span><a href="<?php echo ($row['link']); ?>" target="_blank"><?php echo ($row['link']); ?></a></span>
            <span>此站点下共有<strong style="color:black;font-size: 15px"><?php echo ($row['num']); ?></strong>篇文章</span>
            <a href="__URL__/all/id/<?php echo ($row['id']); ?>" class="pull-right">点击查看站点下的所有文章</a>
        </div>
        <div class="panel-body">
            <table class="table table table-striped table-bordered table-hover table-condensed">
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
            <?php if(is_array($row['art'])): foreach($row['art'] as $key=>$row2): ?><tr>
                    <td><?php echo ($row2['id']); ?></td>
                    <td class="cc"><?php echo ($row2['title']); ?></td>
                    <td><?php echo date('Y-m-d',$row2['time']);?></td>
                    <td><a href="<?php echo ($row2['link']); ?>"><?php echo ($row2['link']); ?></a> </td>
                    <td class="cc"><?php echo htmlspecialchars_decode($row2['content']);?></td>
                    <td><?php echo ($row2['fabnum']); ?></td>
                    <td> <a href="__URL__/aredit/id/<?php echo ($row2['id']); ?>"> <span class="glyphicon glyphicon-wrench"></span></a></td>
                    <td> <a href="__URL__/ardelete/id/<?php echo ($row2['id']); ?>"> <span class="glyphicon glyphicon-remove-sign"></span></a></td>
                </tr><?php endforeach; endif; ?>
            </table>
        </div>
    </div><?php endforeach; endif; ?>
<div class="manu"><?php echo ($show); ?></div>
</body>
</html>