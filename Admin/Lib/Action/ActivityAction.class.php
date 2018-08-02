<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5 0005
 * Time: 下午 12:40
 */
class ActivityAction extends AclAction{
    public function view(){
        import("ORG.Util.Page");
        $activity=M("activity");
        $count=$activity->count();
        $length=5;
        $page=new Page($count,$length);
        $page->setConfig("header","个活动");
        $this->show=$page->show();
        $mo=M();
        $sql="select activity.*,brand.name bn,class.name cn,city.name tn from activity,brand,class,city where
              activity.brand_id=brand.id and activity.class_id=class.id and  activity.city_id=city.id limit {$page->firstRow},{$length}";
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
        $brand=M("brand");
        $class=M("class");
        $city=M('city');
        $this->rows=$brand->select();
        $this->rows2=$class->where("pid=12")->select();
        $this->rows3=$city->select();
        $this->display();
    }
    public function insert(){
        $act=D("Activity");
        $_POST['brand_id']=$this->_post('brand');
        $_POST['class_id']=$this->_post('class');
        $_POST['city_id']=$this->_post('city');
        $_POST['start']=strtotime($this->_post('start'));
        $_POST['end']=strtotime($this->_post('end'));
        $_POST['content']=$this->_post('content');
        $_POST['link']=$this->_post('link');
        if($act->create()){
           $act->add();
            $this->success('活动添加成功',U('view'));
        }else{
            $this->error($act->getError());
        }

    }
    public function edit(){
        $act=D("Activity");
        $row=$act->find($this->_get('id'));
        $this->title=$row['title'];
        $this->start=$row['start'];
        $this->end=$row['end'];
        $this->brand=$row['brand_id'];
        $this->class=$row['class_id'];
        $this->city=$row['city_id'];
        $this->content=$row['content'];
        $this->info=$row['info'];
        $this->link=$row['link'];

        $brand=M("brand");
        $class=M("class");
        $city=M('city');
        $this->rows=$brand->select();
        $this->rows2=$class->where("pid=12")->select();
        $this->rows3=$city->select();
        $this->display();
    }
    public function update(){
        $act=D("Activity");
        $_POST['brand_id']=$this->_post('brand');
        $_POST['class_id']=$this->_post('class');
        $_POST['city_id']=$this->_post('city');
        $_POST['start']=strtotime($this->_post('start'));
        $_POST['end']=strtotime($this->_post('end'));
        $_POST['content']=$this->_post('content');
        $_POST['link']=$this->_post('link');
        if($act->create()){
            $act->save();
            $this->success('活动修改成功',U('view'));
        }else{
            $this->error($act->getError());
        }
    }
    public function delete(){
        $act=D("Activity");
        if($act->delete($this->_get('id'))){
            $this->success('活动删除成功');
        }
    }
    public function brand(){
        $brand=M('brand');
        $this->rows=$brand->select();
        $this->display();
    }
    public function addbr(){
        $this->display();
    }
    public function insertbr(){
        import("ORG.Net.UploadFile");
        $brand=M('brand');
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
        $brand=M('brand');
        $row=$brand->find($this->_get('id'));
        if($brand->delete($this->_get('id'))){
            unlink("Public/Uploads/brand/{$row['img']}");
            $this->success('品牌删除成功');
        }
    }
}