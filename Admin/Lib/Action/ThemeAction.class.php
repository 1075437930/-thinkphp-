<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4 0004
 * Time: 下午 17:07
 */
class ThemeAction extends AclAction{
    public function view(){
        import("ORG.Util.Page");
        $mo=M();
        $theme=M('theme');
        $subscribe=M('thesubscribe');
        $count=$theme->count();
        $length=7;
        $page=new Page($count,$length);
        $page->setConfig("header","个主题");
        $this->show=$page->show();
        $sql="select theme.*,count(thearticle.id) num,class.name cn from class left join theme on theme.class_id=class.id left join thearticle on thearticle.the_id=theme.id where theme.id is not null group by theme.id limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql);
        foreach($rows as &$row){
            $suncon=$subscribe->where("sub_id={$row['id']}")->count();
            $row['subnum']=$suncon;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function add(){
        $class=M('class');
        $rows=$class->where('pid=2')->select();
        $this->rows=$rows;
        $this->display();
    }
    public function insert(){
        import("ORG.Net.UploadFile");
        $theme=D('Theme');
        $_POST['class_id']=$this->_post('class');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/theimg/";
        if($theme->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $theme->img=$name;
                $theme->add();
                $this->success('主题添加成功',U("view"));
            }else{
                $this->error($up->getErrorMsg());
            }
        }else{
            $this->error($theme->getError());
        }
    }
    public function edit(){
        $class=M('class');
        $rows=$class->where('pid=2')->select();
        $this->rows=$rows;
        $theme=D("theme");
        $row=$theme->find($this->_get('id'));
        $this->img=$row['img'];
        $this->display();
    }
    public function update(){
        import("ORG.Net.UploadFile");
        $theme=D("Theme");
        $_POST['class_id']=$this->_post('class');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/theimg/";
        $row=$theme->find($this->_post('id'));
        if($theme->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $theme->img=$name;
                $theme->save();
                unlink("Public/Uploads/theimg/{$row['img']}");
                $this->success('主题修改成功',U("view"));
            }else{
                $theme->save();
                $this->success('主题修改成功',U("view"));
            }
        }else{
            echo $theme->getError();
        }
    }
    public function delete(){
        $theme=M("theme");
        $row=$theme->find($this->_get('id'));
        if($theme->delete($this->_get('id'))){
            unlink("Public/Uploads/theimg/{$row['img']}");
            $this->success('主题删除成功');
        }
    }
    public function arview(){
        import("ORG.Util.Page");
        $article=M('thearticle');
        $theme=M("theme");
        $count=$theme->count();
        $length=2;
        $page=new Page($count,$length);
        $page->setConfig("header","个主题");
        $this->show=$page->show();
        $rows=$theme->limit($page->firstRow,$length)->select();
        foreach($rows as &$row){
            $rows2=$article->where("the_id={$row['id']}")->limit("0,2")->select();
            $row['art']=$rows2;
        }
        foreach($rows as &$row){
            $num=$article->where("the_id='$row[id]'")->count();
            $row['num']=$num;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function all(){
        import("ORG.Util.Page");
        $article=M("thearticle");
        $count=$article->where("the_id={$this->_get('id')}")->count();
        $length=5;
        $page=new Page($count,$length);
        $page->setConfig("header","篇文章");
        $this->show=$page->show();
        $rows=$article->limit($page->firstRow,$length)->where("the_id={$this->_get('id')}")->select();
        $this->rows=$rows;
        $this->display();
    }

    public function aradd(){
        $class=M("class");
        $theme=M("theme");
        $rows=$class->where("pid=2")->select();
        foreach($rows as &$row){
            $rows2=$theme->where("class_id={$row['id']}")->select();
            $row['the']=$rows2;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function arinsert(){
        $article=D("Thearticle");
        $_POST['link']=$this->_post('link');
        $_POST['the_id']=$this->_post('theme');
        $_POST['content']=$this->_post('content');
        $_POST['time']=time();
        if($article->create()){
           $article->add();
            $this->success('主题文章添加成功',U("arview"));
        }else{
            $this->error($article->getError());
        }
    }
    public function aredit(){
        $class=M("class");
        $theme=M("theme");
        $rows=$class->where("pid=2")->select();
        foreach($rows as &$row){
            $rows2=$theme->where("class_id={$row['id']}")->select();
            $row['the']=$rows2;
        }
        $this->rows=$rows;
        $article=M("thearticle");
        $row=$article->find($this->_get('id'));
        $this->gl=$row;
        $this->display();
    }
    public function arupdate(){
        $article=D("Thearticle");
        $_POST['link']=$this->_post('link');
        $_POST['the_id']=$this->_post('theme');
        $_POST['content']=$this->_post('content');
        $_POST['time']=time();
        if($article->create()){

            $article->save();
            $this->success('主题文章修改成功',U("arview"));
        }else{
            $this->error($article->getError());
        }
    }
    public function ardelete(){
        $article=D("Thearticle");
        if($article->delete($this->_get('id'))){
            $this->success('文章删除成功');
        }
    }
}