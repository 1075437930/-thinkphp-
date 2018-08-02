<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6 0006
 * Time: 下午 13:29
 */
class LoginAction extends Action{
    public function login(){
        $this->display();
    }
    public function check(){
        $user=D("User");
        $_POST['username']=$this->_post('name');
        $_POST['password']=md5($this->_post('password'));
        $row=$user->where($_POST)->find();
        if(md5($this->_post('verify'))==$_SESSION['verify']) {
            if ($row) {
                if ($row['admin']) {
                    session("admin", $row['admin']);
                    session("login", 1);
                    session("username", $row['username']);
                    session("user_id", $row['id']);
                    session("img",$row['img']);
                    $this->success('登录成功', U('Index/index'));
                } else {
                    $this->error('此用户不是管理员，无权登录后台');
                }
            } else {
                $this->error('用户不存在');
            }
        }else{
            $this->error('验证码错误');
        }
    }
    public function logout(){
        session("null");
        session('[destroy]');
        cookie(session_name(),null);
        $this->success('退出成功',U('login'));
    }
    public function verify(){
        import("ORG.Util.Image");
        Image::buildImageVerify(5,1,'png');
    }
}