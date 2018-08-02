<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加文章</title>
    <link href="../Public/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/page.css" media="all" />
    <link rel="stylesheet" href="__PUBLIC__/Js/kindeditor/themes/default/default.css" />
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script src="../Public/dist/js/bootstrap.min.js"></script>
    <script charset="utf-8" src="__PUBLIC__/Js/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="__PUBLIC__/Js/kindeditor/lang/zh_CN.js"></script>
    <style>
        span.glyphicon {
            margin-right: 10px;
        }
        #content1{
            height: 340px;
        }
    </style>
    <script>
        KindEditor.ready(function(K) {
            K.create('#content1', {
                resizeType : 0,
                themeType : 'default'
            });
        });
    </script>
</head>
<body>
<form role="form" action="__URL__/arinsert" method="post">
    <div class="form-group">
        <span class="glyphicon glyphicon-minus"></span><label for="exampleInputEmail1">文章标题</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-home"></span><label>选择分类-站点</label>
        <select name="site" class="form-control">
            <option disabled>选择</option>
            <option disabled class="text-danger">___________</option>
            <?php if(is_array($rows)): foreach($rows as $key=>$row): ?><option value="" disabled><?php echo ($row['name']); ?></option>
                <?php if(is_array($row['site'])): foreach($row['site'] as $key=>$row2): ?><option value="<?php echo ($row2['id']); ?>" style="color: red">|_ _<?php echo ($row2['name']); ?></option><?php endforeach; endif; ?>
                <?php if(is_array($row['zi'])): foreach($row['zi'] as $key=>$row3): ?><option value="" disabled>&nbsp;&nbsp;&nbsp;<?php echo ($row3['name']); ?></option>
                    <?php if(is_array($row3['site'])): foreach($row3['site'] as $key=>$row4): ?><option value="<?php echo ($row4['id']); ?>" style="color: red">&nbsp;&nbsp;&nbsp;|_ _<?php echo ($row4['name']); ?></option><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
        </select>
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-refresh"></span><label>原文链接</label>
        <input type="text" name="link" class="form-control">
    </div>
    <div class="form-group">
        <span class="glyphicon glyphicon-pencil"></span><label>编辑内容</label>
        <textarea name="content" class="form-control" id="content1">

        </textarea>
    </div>
    <button type="submit" class="btn btn-success">添加</button>
</form>
</body>
</html>