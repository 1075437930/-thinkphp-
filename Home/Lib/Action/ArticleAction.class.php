<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11 0011
 * Time: 下午 16:13
 */
class ArticleAction extends AutoAction{
    public function index(){
        import('ORG.Util.Page');
        $thearticle=M('thearticle');
        $mo=M();
        //推荐文章
        if(!$this->_get('change') || $this->_get('change')=='ti'){
            $count=$thearticle->count();
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count,$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }

        //热门
        if($this->_get('change')=='hot'){
            $count=$thearticle->count();
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count,$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from site left join thearticle on site.id=thearticle.site_id left join fabulous on fabulous.article_id=thearticle.id where thearticle.id is not null group by thearticle.id order by count(fabulous.id) desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }

        //科技
        if($this->_get('change')=='science') {
            $sql0="select count(*) from thearticle,site where thearticle.site_id=site.id and site.class_id=14";
            $count=$mo->query($sql0);
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count[0]['count(*)'],$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and site.class_id=14 order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }

        //创投
        if($this->_get('change')=='Investment') {
            $sql0="select count(*) from thearticle,site where thearticle.site_id=site.id and site.class_id=16";
            $count=$mo->query($sql0);
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count[0]['count(*)'],$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and site.class_id=16 order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }

        //数码
        if($this->_get('change')=='Digital') {
            $sql0="select count(*) from thearticle,site where thearticle.site_id=site.id and site.class_id=17";
            $count=$mo->query($sql0);
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count[0]['count(*)'],$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and site.class_id=17 order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }


        //技术
        if($this->_get('change')=='technology') {
            $sql0="select count(*) from thearticle,site where thearticle.site_id=site.id and site.class_id=21";
            $count=$mo->query($sql0);
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count[0]['count(*)'],$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and site.class_id=21 order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }

        //设计
        if($this->_get('change')=='Design') {
            $sql0="select count(*) from thearticle,site where thearticle.site_id=site.id and site.class_id=18";
            $count=$mo->query($sql0);
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count[0]['count(*)'],$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and site.class_id=18 order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }


        //营销
        if($this->_get('change')=='Marketing') {
            $sql0="select count(*) from thearticle,site where thearticle.site_id=site.id and site.class_id=19";
            $count=$mo->query($sql0);
            $length=15;
            $param='change='.urlencode($this->_get('change'));
            $page=new Page($count[0]['count(*)'],$length,$param);
            $page->setConfig('header','篇文章');
            $this->show=$page->show();
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and site.class_id=19 order by time desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
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
        }

        //广告
        $advertisement=M('advertisement');
        $this->advers=$advertisement->where("pos='文章区'")->select();

        $this->display();
    }
    public function artinfo(){
        import("ORG.Util.Page");
        $mo=M();
        //文章内容
        $sql="select thearticle.*,theme.name tn,theme.id ti,site.name sn,site.id si,site.img sm from thearticle,theme,site where thearticle.the_id=theme.id and thearticle.site_id=site.id and thearticle.id={$this->_get('id')}";
        $row=$mo->query($sql);
        $this->art=$row;
        $fabulous=M('fabulous');
        $collection=M('collection');
        $comment=M('comment');
        $repaly=M('replay');
        $subscribe=M('subscribe');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['article_id']=$this->_get('id');
        $this->isfab=$fabulous->where($_POST)->count();
        $this->iscoll=$collection->where($_POST)->count();
        $this->iscommen=$comment->where("article_id={$this->_get('id')}")->count();
        $_POST['sub_id']=$row[0]['si'];
        $this->issub=$subscribe->where($_POST)->count();

        //推荐文章
        $sql2="select thearticle.* from thearticle left join fabulous on thearticle.id=fabulous.article_id  where  thearticle.site_id={$row[0]['si']}  group by thearticle.id order by count(fabulous.id) desc limit 0,6";
        $this->res=$mo->query($sql2);

        //获取评论
        $count=$comment->where("article_id={$this->_get('id')}")->count();
        $length=5;
        $param="id=".urlencode($this->_get('id'));
        $page=new Page($count,$length,$param);
        $page->setConfig('header','条评论');
        $this->show=$page->show();
        $sql3="select comment.*,user.username,user.img,user.id ud from comment,user where comment.user_id=user.id and comment.article_id={$this->_get('id')} order by comment.time desc limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql3);
        foreach($rows as &$row){
            $sql4="select replay.*,user.username,user.img from replay,user where replay.comment_id={$row['id']} and replay.replay_id=user.id order by replay.time desc";
            $replays=$mo->query($sql4);
            $row['replays']=$replays;
        }

        $this->comments=$rows;

        //热门文章
        $sql="select thearticle.*,theme.name tn,count(fabulous.id) num from theme left join thearticle on thearticle.the_id=theme.id left join fabulous on fabulous.article_id=thearticle.id where thearticle.id is not null group by thearticle.id  order by num desc limit 0,5";
        $rows2=$mo->query($sql);
        shuffle($rows2);
        $this->arts=$rows2;

        //广告
        $advertisement=M('advertisement');
        $this->advers=$advertisement->where("pos='文章区'")->select();


        $this->display();

    }
    public function addfab(){
        if(!session('login') || !session('user_id')){
            echo "no";
            exit;
        }
        $fabulous=M('fabulous');
        $_POST['article_id']=$this->_get('article');
        $_POST['user_id']=$this->_get('user');
        if($this->_get('fab')){
            $fabulous->create();
            $fabulous->time=time();
            $fabulous->add();
            echo 1;
        }else {
            $fabulous->where($_POST)->delete();
            echo 0;
        }
    }
    public function collhand(){
        if(!session('login') || !session('user_id')){
            echo "no";
            exit;
        }
        $collection=M('collection');
        $_POST['article_id']=$this->_get('article');
        $_POST['user_id']=$this->_get('user');
        if($this->_get('fab')){
            $collection->create();
            $collection->time=time();
            $collection->add();
            echo 1;
        }else {
            $collection->where($_POST)->delete();
            echo 0;
        }
    }
    public function addcomment(){
        if(!session('user_id')){
            echo "no";
            exit;
        }
        $comment=M('comment');
        $_POST['content']=$this->_post('comm');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['article_id']=$this->_post('article');
        $_POST['time']=time();

        if( $_POST['content']!=''){
            $comment->create();
            $comment->add();
            $this->display();
        }else{
            echo 0;
        }
    }
    public function addreplay(){
        $replay=M('replay');
        $_POST['content']=$this->_post('ve');
        $_POST['replay_id']=$_SESSION['user_id'];
        $_POST['comment_id']=$this->_post('comm');
        $_POST['time']=time();
        if( $_POST['content']!=''){
            $replay->create();
            $replay->add();
            $this->display();
        }else{
            echo 0;
        }
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
}