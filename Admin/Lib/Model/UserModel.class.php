<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1 0001
 * Time: 下午 14:22
 */
class UserModel extends Model{
    protected $_auto=array(
        array("password",'md5',"3","function")
    );
    protected $_validate=array(
        array('username','require','用户名不能为空'),
        array('password','require','密码不能为空'),
        array('repassword','password','两次密码不一致',3,"confirm"),
        array('email','email','邮箱地址有误'),
        array("verify","checkCode","验证码有误",2,"callback")
    );
    function checkCode($v){
        if($v!=$_SESSION['verify']){
            return false;
        }
    }
}