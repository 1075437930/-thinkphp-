<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1 0001
 * Time: 上午 11:30
 */
class UserAction extends AclAction{
    public function view(){
        import('ORG.Util.Page');
        $user=M('user');
        $count=$user->count();
        $length=10;
        $page=new Page($count,$length);
        $page->setConfig('theme',"共有%totalRow% 个用户 %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%");
        $this->show=$page->show();
        $rows=$user->select();
        $this->rows=$user->order('id')->limit($page->firstRow,$length)->select();
        $this->display();
    }
    public function add(){
        $this->display();
    }
    public function insert(){
        import('ORG.Net.UploadFile');
        $up=new UploadFile();
        $up->savePath='Public/Uploads/headport/';
        $up->thumb=true;
        $up->thumbMaxWidth=50;
        $up->thumbMaxHeight=50;
        $_POST['username']=$this->_post('user');
        $_POST['email']=$this->_post('email');
        $user=D('User');
        if($user->create()) {
            if ($up->upload()) {
                $info = $up->getUploadFileInfo();
                $user->img = $info[0]['savename'];
                $user->admin = 1;
                $user->registrtime = time();
                $user->add();
                $this->success('用户添加成功', U('view'));
            } else {
                $this->error($up->getErrorMsg());
            }
        }else{
            $this->error($user->getError());
        }
    }
    public function edit(){
        $user=M('user');
        $row=$user->find($this->_get('id'));
        $this->email=$row['email'];
        $this->display();
    }
    public function update(){
        $user=D('User');
        $_POST['username']=$this->_post('user');
        $rows=$user->select($this->_post('id'));
        $pass=$rows[0]['password'];
        if($user->create()) {
            if (md5($_POST['password']) == $pass) {
                $user->password=md5($this->_post('newpassword'));
                $user->save();
                $this->success('用户修改成功',U('view'));
            }else{
                $this->error("旧密码输入错误");
            }
        }else{
             $this->error($user->getError());
        }
    }
    public function delete(){
        $user=M('user');
        $row=$user->find($this->_get('id'));
        $img=$row['img'];
        if($user->delete($this->_get('id'))){
            unlink("Public/Uploads/headport/{$img}");
            unlink("Public/Uploads/headport/thumb_{$img}");
            $this->success('用户删除成功');
        }
    }
}