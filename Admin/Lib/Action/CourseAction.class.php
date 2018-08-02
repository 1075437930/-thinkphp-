<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6 0006
 * Time: 上午 11:38
 */
class CourseAction extends AclAction{
    public function view(){
        import("ORG.Util.Page");
        $course=M("course");
        $count=$course->count();
        $length=5;
        $page=new Page($count,$length);
        $page->setConfig("header","个课程");
        $this->show=$page->show();
        $mo=M();
        $sql="select course.*,class.name cn,cobrand.name bn from course,class,cobrand where course.brand_id=cobrand.id and course.class_id=class.id limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql);
        foreach($rows as &$row){
            $row['content']=htmlspecialchars_decode($row['content']);
            $row['content']=strip_tags($row['content']);
            $row['content']=preg_replace('/\s| /','',$row['content']);
            $row['content']=mb_substr($row['content'],0,60,'utf-8');
        }
        $this->rows=$rows;
        $this->display();
    }
    public function add(){
        $brand=M("cobrand");
        $class=M("class");
        $this->rows=$brand->select();
        $this->rows2=$class->where("pid=3")->select();
        $this->display();
    }
    public function insert(){
        import("ORG.Net.UploadFile");
        $course=D("Course");
        $_POST['title']=$this->_post('name');
        $_POST['link']=$this->_post('link');
        $_POST['brand_id']=$this->_post('brand');
        $_POST['class_id']=$this->_post('class');
        $_POST['content']=$this->_post('content');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/courimg/";
        if($course->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $course->img=$name;
                $course->add();
                $this->success('课程添加成功',U('view'));
            }else{
                $this->error($up->getErrorMsg());
            }
        }else{
            $this->error($course->getError());
        }
    }
    public function edit(){
        $course=D("Course");
        $gl=$course->find($this->_get('id'));
        $this->gl=$gl;
        $brand=M("cobrand");
        $class=M("class");
        $this->rows=$brand->select();
        $this->rows2=$class->where("pid=3")->select();
        $this->display();
    }
    public function update(){
        import("ORG.Net.UploadFile");
        $course=D("Course");
        $_POST['title']=$this->_post('name');
        $_POST['link']=$this->_post('link');
        $_POST['brand_id']=$this->_post('brand');
        $_POST['class_id']=$this->_post('class');
        $_POST['content']=$this->_post('content');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/courimg/";
        $row=$course->find($this->_post('id'));
        if($course->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $course->img=$name;
                $course->save();
                unlink("Public/Uploads/courimg/{$row['img']}");
                $this->success('课程修改成功',U('view'));
            }else{
                $course->save();
                $this->success('课程修改成功',U('view'));
            }
        }else{
            $this->error($course->getError());
        }
    }
    public function delete(){
        $course=D("Course");
        $row=$course->find($this->_get('id'));
        if($course->delete($this->_get('id'))){
            unlink("Public/Uploads/courimg/{$row['img']}");
            $this->success('课程删除成功',U('view'));
        }
    }
    public function brand(){
        $brand=M('cobrand');
        $this->rows=$brand->select();
        $this->display();
    }
    public function addbr(){
        $this->display();
    }
    public function insertbr(){
        import("ORG.Net.UploadFile");
        $brand=M('cobrand');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/brand/";
        if($this->_post('name')){
            if($up->upload()){
                $brand->create();
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $brand->img=$name;
                $brand->add();
                $this->success('品牌添加成功',U('brand'));
            }else{
                $this->error($up->getErrorMsg());
            }
        }else{
            $this->error('品牌名不能为空');
        }
    }
    public function delbr(){
        $brand=M('cobrand');
        $row=$brand->find($this->_get('id'));
        if($brand->delete($this->_get('id'))){
            unlink("Public/Uploads/brand/{$row['img']}");
            $this->success('品牌删除成功');
        }
    }
}