<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/7 0007
 * Time: 下午 19:19
 */
class LoginAction extends Action{
    public function login(){
        $this->display();
    }
    public function check(){
        $user=D('User');
        $_POST['username']=$this->_post('user');
        $_POST['password']=$this->_post('password');
        $rem=$this->_post('password');
        if($user->create()) {
            $_POST['password']=md5($this->_post('password'));
            $row=$user->where($_POST)->find();
            if ($row) {
                session('login', 1);
                session('username', $row['username']);
                session('user_id', $row['id']);
                session('img',$row['img']);
                if($_POST['rem']){
                    cookie('user',$this->_post('user'),24*3600*10);
                    cookie('password',$rem,24*3600*10);
                }
                $this->redirect('Index/index');
            } else {
                $this->redirect('Login/login','error2=1');
            }
        }else{
            $this->redirect('Login/login',"error1={$user->getError()}");
        }
    }
    public function register(){
        $this->display();
    }
    public function verify(){
        import("ORG.Util.Image");
        Image::buildImageVerify(4,1,'png');
    }
    public function recheck(){
        $user=D('User');
        $_POST['username']=$this->_post('user');
        if($user->create()){
              $user->admin=0;
              $user->registrtime=time();
              $user->add();
            $this->redirect('success');
        }else{
            $this->redirect('register',"error='{$user->getError()}'");
        }
    }
    public function success(){
        $this->display();
    }
    public function cheveri(){
        if(md5($this->_post('veri'))==$_SESSION['verify']){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function logout(){
        session('login',null);
        session('username',null);
        session('user_id',null);
        session('img',null);
        cookie(session_name(),null);
        cookie('user',null);
        cookie('password',null);
        $this->redirect('Index/index');
    }
}