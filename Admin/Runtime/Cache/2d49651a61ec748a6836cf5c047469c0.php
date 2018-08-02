<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <style>
        form{
            width: 50%;
            margin: 0 auto;
        }
        span.glyphicon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<form role="form" action="__URL__/update" method="post">
    <div class="form-group">
        <span class="glyphicon glyphicon-user"></span><label for="exampleInputEmail1">用户名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo ($_GET['name']); ?>" name="user" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-lock"></span><label for="exampleInputPassword1">旧密码</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
    <div class="form-group">
        <label for="exampleInputPassword1">新密码</label>
        <input type="password" class="form-control" name="newpassword">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-envelope"></span><label for="exampleInputPassword1">邮箱</label>
        <input type="text" class="form-control" value="<?php echo ($email); ?>"  name="email">
    </div>
    <button type="submit" class="btn btn-primary">修改</button>
    <button type="reset" class="btn btn-danger">重置</button>
</form>
</body>
</html>