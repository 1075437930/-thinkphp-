<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6 0006
 * Time: 下午 13:24
 */
class AclAction extends Action{
    public function _initialize(){
        if(!session('login') || !session('admin')){
            $this->error('请先登录',U("Login/login"));
            exit;
        }
    }
}