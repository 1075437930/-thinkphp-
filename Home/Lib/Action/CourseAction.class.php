<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/15 0015
 * Time: 下午 14:35
 */
class CourseAction extends AutoAction{
    public function index(){
        $mo=M();

        //所有分类
        $class=M('class');
        $this->clas=$class->where("pid=3")->select();

        //所有品牌
        $brand=M('cobrand');
        $this->brands= $brand->select();

       //右侧课程
        $course=M('course');
        $rows=$class->where("pid=3")->limit(0,6)->select();
        foreach($rows as &$row){
            $rows2=$course->where("class_id={$row['id']}")->limit(0,6)->select();
            $row['courses']=$rows2;
        }
        $this->courses=$rows;
        $this->display();
    }

    public function mycourse(){
        if(!session('user_id')){
            $this->redirect('Login/login');
        }
        import("ORG.Util.Page");
        $mo=M();
        $sqc="select count(*) from courcoll,user,course where courcoll.cour_id=course.id and courcoll.user_id=user.id and user.id={$_SESSION['user_id']}";
        $rowc=$mo->query($sqc);
        $count=$rowc[0]['count(*)'];
        $length=8;
        $page=new Page($count,$length);
        $sql="select course.* from courcoll,user,course where courcoll.cour_id=course.id and courcoll.user_id=user.id and user.id={$_SESSION['user_id']} limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql);
        $this->courses=$rows;
        $this->show=$page->show();

        $this->display();

    }

    public function courinfo(){
        $mo=M();
        //课程详情
        $sql="select course.*,class.id ci,class.name cn,cobrand.name bn,cobrand.id bi,cobrand.img bm from course,class,cobrand where course.class_id=class.id and course.brand_id=cobrand.id and course.id={$this->_get('id')}";
        $this->cour=$mo->query($sql);

        //最新课程
        $sql2="select * from course order by time desc limit 0,4";
        $this->news=$mo->query($sql2);

        //是否有收藏
        $courcoll=M('courcoll');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['cour_id']=$this->_get('id');

        $this->count=$courcoll->where($_POST)->count();

        $this->display();
    }
    public function brall(){
        import("ORG.Util.Page");
        $course=M('course');
        $brand=M('cobrand');
        $this->brand=$brand->find($this->_get('id'));
        $count=$course->where("brand_id={$this->_get('id')}")->count();
        $length=21;
        $param='id='.urlencode($this->_get('id'));
        $page=new Page($count,$length,$param);
        $page->setConfig('header','个课程');
        $this->show=$page->show();
        $this->rows=$course->limit($page->firstRow,$length)->where("brand_id={$this->_get('id')}")->select();

        $this->display();
    }
    public function classall(){
        import("ORG.Util.Page");
        $course=M('course');
        $class=M('class');
        $this->class=$class->find($this->_get('id'));
        $count=$course->where("class_id={$this->_get('id')}")->count();
        $length=21;
        $param='id='.urlencode($this->_get('id'));
        $page=new Page($count,$length,$param);
        $page->setConfig('header','个课程');
        $this->show=$page->show();
        $this->rows=$course->limit($page->firstRow,$length)->where("class_id={$this->_get('id')}")->select();
        $this->display();
    }
    public function collhand(){
        if(!session('login') || !session('user_id')){
            echo "no";
            exit;
        }
        $courcoll=M('courcoll');
        $_POST['cour_id']=$this->_get('cour');
        $_POST['user_id']=$_SESSION['user_id'];
        if($this->_get('fa')){
            $courcoll->create();
            $courcoll->time=time();
            $courcoll->add();
            echo 1;
        }else{
            $courcoll->where($_POST)->delete();
            echo 0;
        }
    }
}