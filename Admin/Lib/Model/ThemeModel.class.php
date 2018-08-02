<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4 0004
 * Time: 下午 19:25
 */
class ThemeModel extends Model{
    protected $_validate=array(
      array("name","require","主题名不能为空"),
    );
}