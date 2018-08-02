<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6 0006
 * Time: 下午 12:35
 */
class CourseModel extends Model{
    protected $_validate=array(
        array("title","require","课程名称不能为空"),
        array("link","require","课程名链接不能为空"),
        array("brand_id","require","课程品牌不能为空"),
        array("class_id","require","课程类别不能为空"),
        array("content","require","课程简介不能为空"),
    );
}