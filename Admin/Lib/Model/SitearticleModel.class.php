<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3 0003
 * Time: 下午 16:41
 */
class SitearticleModel extends Model{
    protected $_validate=array(
        array("title","require",'标题不能为空'),
        array("link","require","链接不能为空"),
        array("content","require","内容不能为空"),
    );
}