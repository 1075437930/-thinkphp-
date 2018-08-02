<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11 0011
 * Time: 下午 22:19
 */
class ArticleAction extends AclAction{
    public function view(){
            import("ORG.Util.Page");
            $article=M('thearticle');
            $theme=M("theme");
            $mo=M();
            $fabulous=M('fabulous');
            $count=$theme->count();
            $length=2;
            $page=new Page($count,$length);
            $page->setConfig("header","个主题");
            $this->show=$page->show();
            $rows=$theme->limit($page->firstRow,$length)->select();
            foreach($rows as &$row){
                $rows2=$article->where("the_id={$row['id']}")->limit("0,2")->select();
                foreach($rows2 as &$row2){
                    $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and thearticle.id={$row2['id']}";
                    $rows3=$mo->query($sql);
                    $row2['sit']=$rows3[0]['sn'];
                    $fab=$fabulous->where("article_id={$row2['id']}")->count();
                    $row2['fab']=$fab;
                    $row2['content']=htmlspecialchars_decode($row2['content']);
                    $row2['content']=strip_tags($row2['content']);
                    $row2['content']=preg_replace('/\s| /','',$row2['content']);
                    $row2['content']=mb_substr($row2['content'],0,60,'utf-8');
                }
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
        $fabulous=M('fabulous');
        $mo=M();
        $count=$article->where("the_id={$this->_get('id')}")->count();
        $length=5;
        $param='id='.urlencode($_GET['id']);
        $page=new Page($count,$length,$param);
        $page->setConfig("header","篇文章");
        $this->show=$page->show();
        $rows=$article->limit($page->firstRow,$length)->where("the_id={$this->_get('id')}")->select();
        foreach($rows as &$row){
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id and thearticle.id={$row['id']}";
            $rows3=$mo->query($sql);
            $row['sit']=$rows3[0]['sn'];
            $fab=$fabulous->where("article_id={$row['id']}")->count();
            $row['fab']=$fab;
            $row['content']=htmlspecialchars_decode($row['content']);
            $row['content']=strip_tags($row['content']);
            $row['content']=preg_replace('/\s| /','',$row['content']);
            $row['content']=mb_substr($row['content'],0,60,'utf-8');
        }
        $this->rows=$rows;
        $this->display();
    }
    public function add(){
        $class=M("class");
        $theme=M("theme");
        $site=M('site');
        $rows=$class->where("pid=2")->select();
        foreach($rows as &$row){
            $rows2=$theme->where("class_id={$row['id']}")->select();
            $row['the']=$rows2;
        }
        $rows3=$class->where('pid=1')->select();
        foreach($rows3 as &$row){
            $row4=$class->where("pid={$row['id']}")->select();
            $row['zi']=$row4;
        }
        foreach($rows3 as &$row){
            $rows5=$site->where("class_id={$row['id']}")->select();
            $row['site']=$rows5;
        }
        foreach($rows3 as &$row){
            foreach($row['zi'] as &$row2){
                $rows2=$site->where("class_id={$row2['id']}")->select();
                $row2['site']=$rows2;
            }
        }

        $this->rows=$rows;
        $this->rows3=$rows3;
        $this->display();
    }
    public function insert(){
        $article=D("Thearticle");
        $_POST['link']=$this->_post('link');
        $_POST['the_id']=$this->_post('theme');
        $_POST['content']=$this->_post('content');
        $_POST['site_id']=$this->_post('site');
        $_POST['time']=time();
        if($article->create()){
            $article->add();
            $this->success('文章添加成功',U("view"));
        }else{
            $this->error($article->getError());
        }
    }
    public function edit(){
        $class=M("class");
        $theme=M("theme");
        $rows=$class->where("pid=2")->select();
        foreach($rows as &$row){
            $rows2=$theme->where("class_id={$row['id']}")->select();
            $row['the']=$rows2;
        }
        $this->rows=$rows;
        $site=M('site');
        $rows2=$class->where('pid=1')->select();
        foreach($rows2 as &$row){
            $row2=$class->where("pid={$row['id']}")->select();
            $row['zi']=$row2;
        }
        foreach($rows2 as &$row){
            $rows3=$site->where("class_id={$row['id']}")->select();
            $row['site']=$rows3;
        }
        foreach($rows2 as &$row){
            foreach($row['zi'] as &$row2){
                $rows4=$site->where("class_id={$row2['id']}")->select();
                $row2['site']=$rows4;
            }
        }
        $this->rows2=$rows2;
        $article=M("thearticle");
        $row=$article->find($this->_get('id'));
        $this->gl=$row;
        $this->display();
    }
    public function update(){
        $article=D("Thearticle");
        $_POST['link']=$this->_post('link');
        $_POST['the_id']=$this->_post('theme');
        $_POST['content']=$this->_post('content');
        $_POST['site_id']=$this->_post('site');
        $_POST['time']=time();
        if($article->create()){

            $article->save();
            $this->success('文章修改成功',U("view"));
        }else{
            $this->error($article->getError());
        }
    }
    public function delete(){
        $article=D("Thearticle");
        $row=$article->find($this->_get('id'));
        if($article->delete($this->_get('id'))){
            $str="/Public\/Js\/kindeditor\/attached\/image\/.+\.[a-z]+/";
            preg_match_all($str,$row['content'],$arr);
            foreach($arr[0] as $row2){
                unlink($row2);
            }
            $this->success('文章删除成功');
        }
    }
}