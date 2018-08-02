<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        p{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <?php if(is_array($clas)): foreach($clas as $key=>$row): ?><p><?php echo ($row['name']); ?></p>
        <?php if(is_array($row['sits'])): foreach($row['sits'] as $key=>$row2): ?><ul>
                <li><?php echo ($row2['name']); ?></li>
            </ul><?php endforeach; endif; ?>
        <div><?php echo ($row['show']); ?></div><?php endforeach; endif; ?>
    <div><?php echo ($show1); ?></div>
</body>
</html>