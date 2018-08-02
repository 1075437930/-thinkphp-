<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/8 0008
 * Time: 上午 11:56
 */
class UserModel extends Model{
    protected $_auto=array(
        array('password','md5',3,'function')
    );
    protected $_validate=array(
        array('email','email','邮箱格式不正确'),
        array('password','require','密码不能为空'),
        array('password','checkPassLength','密码需在6到20字符间',3,'callback'),
        array('repassword','password','两次密码不一致',3,"confirm"),
        array('username','require','用户名不能为空'),
        array('username','checkLength','用户名长度需要在7到24个字符间',2,'callback'),
        array('verify','checkVerify','验证码有误',3,'callback')
    );
    function checkVerify($v){
        if(md5($v)!=$_SESSION['verify']){
            return false;
        }
    }
    function checkLength($us){
        if(strlen($us)<7 || strlen($us)>24){
            return false;
        }
    }
    function checkPassLength($pass){
        if(strlen($pass)<6 || strlen($pass)>20){
            return false;
        }
    }
}