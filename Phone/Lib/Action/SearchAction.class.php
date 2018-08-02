<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/29 0029
 * Time: 下午 16:08
 */
class SearchAction extends AutoAction{
    public function index(){
        import("ORG.Util.Page");
        $mo=M();
        //搜索文章
        if($_GET['artkey']){
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id  order by time desc";
            $rows=$mo->query($sql);
            $arts=array();
            foreach($rows as &$row2){
                $row2['content']=htmlspecialchars_decode( $row2['content']);
                preg_match("/<img .+\/>/",$row2['content'],$arr1);
                $row2['img']=$arr1[0];
                $row2['content']=strip_tags($row2['content']);
                $row2['content']=preg_replace("/\s| /","",$row2['content']);
                if(preg_match("/{$_GET['artkey']}/",$row2['title'],$arr) || preg_match("/{$_GET['artkey']}/",$row2['content'],$arr)){
                    $arts[]=$row2;
                }
            };
            $count=count($arts);
            $length=10;
            $param="artkey=".urlencode($_GET['artkey']);
            $page=new Page($count,$length,$param);
            $arts=array_slice($arts,$page->firstRow,$length);
            $page->setConfig('theme',"%upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%");
            $this->show=$page->show();

            $this->arts=$arts;
        }

        if($_GET['type']=='art'){
            $sql="select thearticle.*,site.name sn from thearticle,site where thearticle.site_id=site.id  order by time desc";
            $rows=$mo->query($sql);
            $arts=array();
            foreach($rows as &$row2){
                $row2['content']=htmlspecialchars_decode( $row2['content']);
                preg_match("/<img .+\/>/",$row2['content'],$arr1);
                $row2['img']=$arr1[0];
                $row2['content']=strip_tags($row2['content']);
                $row2['content']=preg_replace("/\s| /","",$row2['content']);
                if(preg_match("/{$_GET['key']}/",$row2['title'],$arr) || preg_match("/{$_GET['key']}/",$row2['content'],$arr)){
                    $arts[]=$row2;
                }
            }
            $count=count($arts);
            $length=10;
            $param="key=".urlencode($_GET['key'])."&type=".urlencode($_GET['type']);
            $page=new Page($count,$length,$param);
            $arts=array_slice($arts,$page->firstRow,$length);
            $page->setConfig('theme',"%upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%");
            $this->show=$page->show();

            $this->arts=$arts;
        }

        if($_GET['thekey']){
            $sql="select * from theme where name like '%{$_GET['thekey']}%'";
            $rows=$mo->query($sql);
            $this->thes=$rows;
        }

        if($_GET['type']=='the'){
            $sql="select * from theme where name like '%{$_GET['key']}%'";
            $rows=$mo->query($sql);
            $this->thes=$rows;
        }

        if($_GET['sitkey']){
            $sql="select * from site where name like '%{$_GET['sitkey']}%'";
            $rows=$mo->query($sql);
            $this->sits=$rows;
        }

        if($_GET['type']=='sit'){
            $sql="select * from site where name like '%{$_GET['key']}%'";
            $rows=$mo->query($sql);
            $this->sits=$rows;
        }


        $this->display();
    }
}