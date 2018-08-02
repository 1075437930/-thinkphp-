<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/2 0002
 * Time: 上午 10:57
 */
class SiteAction extends AclAction{
    public function view(){
        import("ORG.Util.Page");
        $site=M('site');
        $join=M();
        $subscribe=M('subscribe');
        $count=$site->count();
        $length=12;
        $page=new Page($count,$length);
        $page->setConfig('theme','共有%totalRow% 个站点 %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%');
        $this->show=$page->show();
        $sql="select site.* ,count(thearticle.id) num from site left join thearticle on site.id=thearticle.site_id group by site.id limit {$page->firstRow},{$length}";
        $rows=$join->query($sql);
        $class=M('class');
        foreach($rows as &$row){
            $row2=$class->find($row['class_id']);
            $row['class']=$row2['name'];
        }
        foreach($rows as &$row){
            $suncon=$subscribe->where("sub_id={$row['id']}")->count();
            $row['subnum']=$suncon;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function add(){
        $class=M('class');
        $rows=$class->where("pid=1")->select();
        foreach($rows as &$row){
            $row2=$class->where("pid={$row['id']}")->select();
            $row['zi']=$row2;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function insert(){
        import('ORG.Net.UploadFile');
        $site=D('Site');
        $_POST['name']=$this->_post('sitename');
        $_POST['link']=$this->_post('link');
        $_POST['class_id']=$this->_post('class');
        $up=new UploadFile();
        $up->savePath="Public/Uploads/sitelogo/";
        if($site->create()) {
            if ($up->upload()) {
                $info = $up->getUploadFileInfo();
                $name = $info[0]['savename'];
                $site->img=$name;
                if($site->add()){
                    $this->success('添加成功',U('view'));
                }
            } else {
                echo $up->getErrorMsg();
            }
        }else{
            echo $site->getError();
        }
    }
    public function delete(){
        $site=M('Site');
        $row=$site->find($this->_get('id'));
        if($site->delete($this->_get('id'))){
            unlink("Public/Uploads/sitelogo/{$row['img']}");
            $this->success('删除成功');
        }
    }
    public function edit(){
        $site=M('Site');
        $row=$site->find($this->_get('id'));
        $this->link=$row['link'];
        $this->img=$row['img'];
        $class=M('class');
        $rows=$class->where('pid=1')->select();
        foreach($rows as &$row){
            $row2=$class->where("pid={$row['id']}")->select();
            $row['zi']=$row2;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function update(){
        import("ORG.Net.UploadFile");
        $site=D('site');
        $_POST['name']=$this->_post('sitename');
        $_POST['link']=$this->_post('link');
        $_POST['class_id']=$this->_post('class');
        $row=$site->find($this->_post('id'));
        $up=new UploadFile();
        $up->savePath='Public/Uploads/sitelogo/';
        if($site->create()){
            if($up->upload()){
                $info=$up->getUploadFileInfo();
                $name=$info[0]['savename'];
                $site->img=$name;
                $site->save();
                unlink("Public/Uploads/sitelogo/{$row['img']}");
                $this->success('修改成功',U('view'));
            }else{
                $site->save();
                $this->success('修改成功',U('view'));
            }
        }else{
            $this->error($site->getError());
        }
    }
    public function arview(){
        import("ORG.Util.Page");
        $site=M('site');
        $count=$site->count();
        $length=3;
        $page=new Page($count,$length);
        $page->setConfig("header",'个站点');
        $article=M('thearticle');
        $rows=$site->limit($page->firstRow,$length)->select();
        $this->show=$page->show();
        foreach($rows as &$row){
            $rows2=$article->where("site_id={$row['id']}")->limit("0,2")->select();
            $rcount=$article->where("site_id={$row['id']}")->count();
            $row['art']=$rows2;
            $row['num']=$rcount;
        }
        $this->rows=$rows;
        $this->display();
    }
    public function all(){
        import("ORG.Util.Page");
        $article=M('sitearticle');
        $count=$article->where("site_id={$this->_get('id')}")->count();
        $length=5;
        $page=new Page($count,$length);
        $page->setConfig("header","篇文章");
        $this->show=$page->show();
        $rows=$article->where("site_id={$this->_get('id')}")->limit($page->firstRow,$length)->select();
        $this->rows=$rows;
        $this->display();
    }
    public function aradd(){
        $class=M('class');
        $site=M('site');
        $rows=$class->where('pid=1')->select();
        foreach($rows as &$row){
            $row2=$class->where("pid={$row['id']}")->select();
            $row['zi']=$row2;
        }
        foreach($rows as &$row){
            $rows2=$site->where("class_id={$row['id']}")->select();
            $row['site']=$rows2;
        }
        foreach($rows as &$row){
            foreach($row['zi'] as &$row2){
                $rows2=$site->where("class_id={$row2['id']}")->select();
                $row2['site']=$rows2;
            }
        }

        $this->rows=$rows;
        $this->display();
    }
    public function arinsert(){
        $article=D("Sitearticle");
        $_POST['title']=$this->_post('title');
        $_POST['link']=$this->_post('link');
        $_POST['time']=time();
        $_POST['site_id']=$this->_post('site');
        $_POST['content']=$this->_post('content');
        if($article->create()){
            $article->add();
            $this->success('文章添加成功',U("arview"));
        }else{
            echo $article->getError();
        }
    }
    public function aredit(){
        $article=M("sitearticle");
        $in=$article->find($this->_get('id'));
        $this->title=$in['title'];
        $this->link=$in['link'];
        $this->class=$in['site_id'];
        $this->content=htmlspecialchars_decode($in['content']);
        $class=M('class');
        $site=M('site');
        $rows=$class->where('pid=1')->select();
        foreach($rows as &$row){
            $row2=$class->where("pid={$row['id']}")->select();
            $row['zi']=$row2;
        }
        foreach($rows as &$row){
            $rows2=$site->where("class_id={$row['id']}")->select();
            $row['site']=$rows2;
        }
        foreach($rows as &$row){
            foreach($row['zi'] as &$row2){
                $rows2=$site->where("class_id={$row2['id']}")->select();
                $row2['site']=$rows2;
            }
        }
        $this->rows=$rows;
        $this->display();
    }
    public function arupdate(){
        $article=D("Sitearticle");
        $_POST['title']=$this->_post('title');
        $_POST['link']=$this->_post('link');
        $_POST['time']=time();
        $_POST['site_id']=$this->_post('site');
        $_POST['content']=$this->_post('content');
        if($article->create()){
            $article->save();
            $this->success('文章修改成功',U("arview"));
        }else{
            echo $article->getError();
        }
    }
    public function ardelete(){
        $article=M("sitearticle");
        if($article->delete($this->_get('id'))){
            $this->success('文章删除成功');
        }
    }
}