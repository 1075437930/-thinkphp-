<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/7 0007
 * Time: 下午 13:24
 */
class AdvertisementModel extends Model{
    protected $_validate=array(
        array("link","require","链接不能为空"),
        array("pos","require","放置位置不能为空"),
    );
}