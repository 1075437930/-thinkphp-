<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看用户</title>
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
    <table class="table table-striped table-bordered table-hover table-condensed text-center" >
            <tr>
                <th class="text-center">
                    ID
                </th>
                <th  class="text-center">
                    用户名
                </th>
                <th  class="text-center">
                    邮箱
                </th>
                <th  class="text-center">
                    头像
                </th>
                <th  class="text-center">
                    注册时间
                </th>
                <th  class="text-center">
                    权限
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
                    <td><?php echo ($row['username']); ?></td>
                    <td><?php echo ($row['email']); ?></td>
                    <td>
                        <?php if($row['img'] == ''): ?><img src="__PUBLIC__/Images/man.jpg" width="50px">
                            <?php else: ?>
                            <img src="__PUBLIC__/Uploads/headport/<?php echo ($row['img']); ?>" width="50px"><?php endif; ?>
                    </td>
                    <td><?php echo date('Y-m-d',$row['registrtime']);?></td>
                    <td><?php echo ($row['admin']); ?></td>
                    <td><a href="__URL__/edit/id/<?php echo ($row['id']); ?>/name/<?php echo ($row['username']); ?>"><span class="glyphicon glyphicon-wrench"></span></a> </td>
                    <td><a href="__URL__/delete/id/<?php echo ($row['id']); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a> </td>
                </tr><?php endforeach; endif; ?>
            <tr>
               <td colspan="8" class="manu"><?php echo ($show); ?></td>
            </tr>
    </table>
</body>
</html>