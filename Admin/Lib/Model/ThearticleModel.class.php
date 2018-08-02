<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5 0005
 * Time: 上午 10:46
 */
class ThearticleModel extends Model{
    protected $_validate=array(
      array("title","require","文章标题不能为空"),
      array("link","require","链接不能为空"),
      array("content","require","内容不能为空"),
    );
}