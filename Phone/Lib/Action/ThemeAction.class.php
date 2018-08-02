<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/13 0013
 * Time: 下午 16:39
 */
class ThemeAction extends AutoAction{
    public function index(){
        if(!session('user_id')){
            $this->redirect('nologin');
        }
        $mo=M();
        $sql="select theme.* from theme,thesubscribe,user where theme.id=thesubscribe.sub_id and thesubscribe.user_id=user.id and user.id={$_SESSION['user_id']}";
        $rows=$mo->query($sql);
        foreach($rows as &$row){
            $sqc="select count(*) from theme,thesubscribe,user where theme.id=thesubscribe.sub_id and thesubscribe.user_id=user.id and user.id={$_SESSION['user_id']} and theme.id={$row['id']}";
            $rowc=$mo->query($sqc);
            $row['count']=$rowc[0]['count(*)'];
        }
        $this->mys=$rows;
        $this->display();
    }
    public function arlist(){
        $article=M('thearticle');
        $rows=$article->where("the_id={$this->_get('id')}")->select();
        foreach($rows as &$row){
            $row['content']=htmlspecialchars_decode( $row['content']);
            $row['content']=strip_tags($row['content']);
            $row['content']=preg_replace("/\s| /","",$row['content']);
            $row['content']=mb_substr($row['content'],0,50,"utf-8");
        }
        $this->thes=$rows;
        $this->display();
    }
    public function nologin(){
        $class=M('class');
        $theme=M('theme');
        $clas=$class->where("pid=2")->select();
        $this->clas=$clas;
        if(!$_GET['id']){
            $rows=$theme->where('class_id=47')->select();
            $this->thes=$rows;
        }
        if($_GET['id']){
            $rows=$theme->where("class_id={$_GET['id']}")->select();
            $this->thes=$rows;
        }
        $this->display();
    }
    public function theartall(){
        import("ORG.Util.Page");
        $theme=M('theme');
        $article=M('thearticle');
        $subscribe=M('thesubscribe');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['sub_id']=$this->_get('id');
        $this->issub=$subscribe->where($_POST)->count();
        $row=$theme->find($this->_get('id'));
        $this->the=$row;
        $thes=$theme->limit(0,8)->where("class_id={$row['class_id']}")->select();
        $this->thes=$thes;
        $count=$article->where("the_id={$this->_get('id')}")->count();
        $length=10;
        $parameter = 'id='.urlencode($_GET['id']);
        $page=new Page($count,$length,$parameter);
        $page->setConfig('header','篇文章');
        $this->show=$page->show();
        $rows=$article->limit($page->firstRow,$length)->where("the_id={$this->_get('id')}")->select();
        foreach($rows as &$row){
            $str="/\/kt\/Public\/Js\/kindeditor\/attached\/image\/.+\.[a-z]+/";
            preg_match($str,$row['content'],$arr);
            $row['img']=$arr[0];
            $row['content']=htmlspecialchars_decode( $row['content']);
            $row['content']=strip_tags($row['content']);
            $row['content']=preg_replace("/\s| /","",$row['content']);
            $row['content']=mb_substr($row['content'],0,200,"utf-8");
        }
        $this->arts=$rows;
        $this->display();
    }
    public function subhand(){
        $subscribe=M('thesubscribe');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['sub_id']=$_GET['article'];
        if($_GET['sub']){
            $subscribe->create();
            $subscribe->time=time();
            $subscribe->add();
            echo 1;
        }else{
            $subscribe->where($_POST)->delete();
            echo 0;
        }
    }

    public function theshow(){
        $class=M('class');
        $theme=M('theme');
        $subscribe=M('thesubscribe');
        $this->cas=$class->where("pid=2")->select();
        $rows=$theme->where('class_id=47')->select();
        $_POST['user_id']=$_SESSION['user_id'];
        foreach($rows as &$row){
            $_POST['sub_id']=$row['id'];
            $count=$subscribe->where($_POST)->count();
            $row['count']=$count;
        }
        $this->thes=$rows;
        $this->display();
    }
    public function findthe(){
        $theme=M('theme');
        $subscribe=M('thesubscribe');
        $rows=$theme->where("class_id={$this->_get('id')}")->select();
        $_POST['user_id']=$_SESSION['user_id'];
        foreach($rows as &$row){
            $_POST['sub_id']=$row['id'];
            $count=$subscribe->where($_POST)->count();
            $row['count']=$count;
        }
        $this->sits=$rows;
        $this->display();
    }
}