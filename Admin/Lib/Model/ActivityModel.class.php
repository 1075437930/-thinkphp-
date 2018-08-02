<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5 0005
 * Time: 下午 22:44
 */
class ActivityModel extends Model{
    protected $_validate=array(
        array("title","require","活动名称不能为空"),
        array("start","require","起始时间不能为空"),
        array("end","require","终止时间不能为空"),
        array("brand_id","require","品牌不能为空"),
        array("class_id","require","类别不能为空"),
        array("city_id","require","城市不能为空"),
        array("info","require","详细地点不能为空"),
        array("content","require","内容不能为空"),

    );
}