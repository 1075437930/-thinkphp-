<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/7 0007
 * Time: 下午 12:38
 */
class AdverAction extends AclAction{
    public function view(){
        import("ORG.Util.Page");
        $adver=M("advertisement");
        $count=$adver->count();
        $length=3;
        $page=new Page($count,$length);
        $page->setConfig("header","个广告");
        $this->show=$page->show();
        $this->rows=$adver->limit($page->firstRow,$length)->order('pos')->select();
        $this->display();
    }
    public function add(){
        $this->display();
    }
    public function insert(){
        import("ORG.Net.UploadFile");
        $adver=D("Advertisement");
        $_POST['link']=$this->_post('link');
        $_POST['pos']=$this->_post('pos');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/adverimg/";
        if($adver->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $adver->img=$name;
                $adver->time=time();
               $adver->add();
                $this->success('广告添加成功');
            }else{
                $this->error($up->getErrorMsg());
            }
        }else{
            $this->error($adver->getError());
        }
    }
    public function edit(){
        $adver=D("Advertisement");
        $this->row=$adver->find($this->_get('id'));
        $this->display();
    }
    public function update(){
        import("ORG.Net.UploadFile");
        $adver=D("Advertisement");
        $_POST['link']=$this->_post('link');
        $_POST['pos']=$this->_post('pos');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/adverimg/";
        $row=$adver->find($this->_post('id'));
        if($adver->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $adver->img=$name;
                $adver->time=time();
                $adver->save();
                unlink("Public/Uploads/adverimg/{$row['img']}");
                $this->success('广告修改成功',U('view'));
            }else{
                $adver->save();
                $this->success('广告修改成功',U('view'));
            }
        }else{
            $this->error($adver->getError());
        }
    }
    public function delete(){
        $adver=D("Advertisement");
        if($adver->delete($this->_get('id'))){
            $this->success('广告删除成功');
        }
    }
}