<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/12 0012
 * Time: 下午 17:24
 */
class SiteAction extends AutoAction{
    public function index(){
        if(!session('user_id')){
            $this->redirect('nologin');
        }
        $mo=M();
        $sql="select site.* from site,subscribe,user where site.id=subscribe.sub_id and subscribe.user_id=user.id and user.id={$_SESSION['user_id']}";
        $rows=$mo->query($sql);
        foreach($rows as &$row){
            $sqc="select count(*) from site,subscribe,user where site.id=subscribe.sub_id and subscribe.user_id=user.id and user.id={$_SESSION['user_id']} and site.id={$row['id']}";
            $rowc=$mo->query($sqc);
            $row['count']=$rowc[0]['count(*)'];
        }
        $this->mys=$rows;
        $this->display();
    }

    public function nologin(){
        $class=M('class');
        $site=M('site');
        $clas=$class->where("pid=1")->select();
        $this->clas=$clas;
       if(!$_GET['id']){
           $rows=$site->where('class_id=13')->select();
           $this->sits=$rows;
       }
        if($_GET['id']){
            $rows=$site->where("class_id={$_GET['id']}")->select();
            $this->sits=$rows;
        }
        if($_GET['id']==25){
          $cas=$class->where("pid=25")->select();
          foreach($cas as $row){
              $rows2=$site->where("class_id={$row['id']}")->select();
              foreach($rows2 as $row2){
                  $ss[]=$row2;
              }
          }
            $this->sits=$ss;
        }
        if($_GET['id']==26){
            $cas=$class->where("pid=26")->select();
            foreach($cas as $row){
                $rows2=$site->where("class_id={$row['id']}")->select();
                foreach($rows2 as $row2){
                    $ss[]=$row2;
                }

            }
            $this->sits=$ss;
        }
        $this->display();
    }
    public function siteartall(){
        if(!session("login")){
            $this->redirect('Login/login');
            exit;
        }
        import("ORG.Util.Page");
        $site=M('site');
        $article=M('thearticle');
        $subscribe=M('subscribe');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['sub_id']=$this->_get('id');
        $this->issub=$subscribe->where($_POST)->count();
        $row=$site->find($this->_get('id'));
        $this->site=$row;
        $sites=$site->limit(0,8)->where("class_id={$row['class_id']}")->select();
        $this->sites=$sites;
        $count=$article->where("site_id={$this->_get('id')}")->count();
        $length=10;
        $parameter = 'id='.urlencode($_GET['id']);
        $page=new Page($count,$length,$parameter);
        $page->setConfig('header','篇文章');
        $this->show=$page->show();
        $rows=$article->limit($page->firstRow,$length)->where("site_id={$this->_get('id')}")->select();
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
        $subscribe=M('subscribe');
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

    public function findsite(){
        $site=M('site');
        $subscribe=M('subscribe');
        $rows=$site->where("class_id={$this->_get('id')}")->select();
        $_POST['user_id']=$_SESSION['user_id'];
        foreach($rows as &$row){
            $_POST['sub_id']=$row['id'];
            $count=$subscribe->where($_POST)->count();
            $row['count']=$count;
        }
        $this->sits=$rows;
        $this->display();
    }

    public function arlist(){
        $article=M('thearticle');
        $rows=$article->where("site_id={$this->_get('id')}")->select();
        foreach($rows as &$row){
            $row['content']=htmlspecialchars_decode( $row['content']);
            $row['content']=strip_tags($row['content']);
            $row['content']=preg_replace("/\s| /","",$row['content']);
            $row['content']=mb_substr($row['content'],0,50,"utf-8");
        }
        $this->thes=$rows;
        $this->display();
    }
}