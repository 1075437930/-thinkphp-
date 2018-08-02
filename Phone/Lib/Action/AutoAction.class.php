<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/9 0009
 * Time: 下午 17:00
 */
class AutoAction extends Action{
    function _initialize(){
        if($_COOKIE['user']){
            $user=M('user');
            $_AUTO['username']=$_COOKIE['user'];
            $_AUTO['password']=md5($_COOKIE['password']);
            $row=$user->where($_AUTO)->find();
            session('login', 1);
            session('username', $row['username']);
            session('user_id', $row['id']);
            session('img',$row['img']);
        }
    }
}