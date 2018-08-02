<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/2 0002
 * Time: 下午 21:24
 */
class SiteModel extends Model{
    protected $_validate=array(
       array("name","require",'站点名不能为空'),
       array("link","require",'链接不能为空'),
       array("link","require",'链接不能为空'),
    );
}