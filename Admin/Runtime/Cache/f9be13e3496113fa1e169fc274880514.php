<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加品牌</title>
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
<form role="form" action="__URL__/insertbr" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <span class="glyphicon glyphicon-stop"></span><label for="exampleInputEmail1">品牌名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-tag"></span><label for="exampleInputEmail1">品牌说明</label>
        <input type="text" class="form-control" name="tip" >
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-circle-arrow-up"></span><label for="exampleInputEmail1">上传品牌logo</label>
        <input type="file" class="form-control" name="img" >
    </div>
    <button type="submit" class="btn btn-primary">添加</button>
</form>
</body>
</html>