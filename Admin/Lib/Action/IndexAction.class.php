<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AclAction {
    public function index(){

        $this->display();
    }
    public function pass(){
        $this->display();
    }
    public function update(){
        $user=D('User');
        $_POST['id']=$this->_post('id');
        $_POST['username']=$this->_post('user');
        $pass=$_POST['password'];
        $_POST['password']=$this->_post('newpass');
        $_POST['repassword']=$this->_post('renewpass');
        $row=$user->find($this->_post('id'));
        if($user->create()){
            if(md5($pass)==$row['password']){
                $user->save();
                $this->success('管理员密码修改成功');
            }else{
                echo "原密码错误";
            }
        }else{
            echo $user->getError();
        }
    }
    public function delcache(){
        function deldir($dir) {
            //先删除目录下的文件：
            $dh=opendir($dir);
            while ($file=readdir($dh)) {
                if($file!="." && $file!="..") {
                    $fullpath=$dir."/".$file;
                    if(!is_dir($fullpath)) {
                        unlink($fullpath);
                    } else {
                        deldir($fullpath);
                    }
                }
            }

            closedir($dh);
            //删除当前文件夹：
            if(rmdir($dir)) {
                return true;
            } else {
                return false;
            }
        }
        if(deldir('Admin/Html')){
            $this->success('缓存删除成功');
        }else{
            $this->error('后台没有开启缓存，无需清除');
        }
    }
}