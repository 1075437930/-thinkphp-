<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加用户</title>
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
<form role="form" action="__URL__/insert" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <span class="glyphicon glyphicon-user"></span><label for="exampleInputEmail1">用户名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="user" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-lock"></span><label for="exampleInputPassword1">密码</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-briefcase"></span><label for="exampleInputPassword1">权限</label>
        <input type="text" class="form-control" value="管理员" name="admin" disabled>
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-envelope"></span><label for="exampleInputPassword1">邮箱</label>
    <input type="text" class="form-control" value="134@qq.com"  name="email">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-upload"></span><label for="exampleInputPassword1">上传头像</label>
        <input type="file" class="form-control" name="img">
    </div>
    <button type="submit" class="btn btn-primary">添加</button>
    <button type="reset" class="btn btn-danger">重置</button>
</form>
</body>
</html>