<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AutoAction{
    public function index(){
        if($_SESSION['user_id']){
            $this->redirect('Article/index');
        }
        $this->display();
    }
    public function indexcheck(){
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
                $this->redirect('Index/index','error2=1');
            }
        }else{
            $this->redirect('Index/index',"error1={$user->getError()}");
        }
    }
}