<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/23 0023
 * Time: 下午 15:45
 */
class PersonAction extends AutoAction{
    public function otherindex(){
        import("ORG.Util.Page");

        $mo=M();

        //用户信息
        $user=M('user');
        $this->user=$user->find($_GET['id']);

        //默认显示动态
        if(!isset($_GET['change'])){
            //订阅站点动态
            $sql1="select subscribe.*,site.name sn,site.id si from subscribe,site,user  where subscribe.sub_id=site.id and subscribe.user_id=user.id and user.id={$_GET['id']} order by subscribe.time desc limit 0,3";
            $subs=$mo->query($sql1);
            foreach($subs as &$row1){
                $row1['tip']='订阅了站点';
                $row1['link']="__APP__/Site/siteartall/id/{$row1['si']}";
            }


            //收藏动态
            $sql2="select collection.*,thearticle.title sn,thearticle.id si from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']} order by collection.time desc limit 0,3";
            $colls=$mo->query($sql2);
            foreach($colls as &$row2){
                $row2['tip']='收藏了文章';
                $row2['link']="__APP__/Article/artinfo/id/{$row2['si']}";
            }

            //订阅主题动态
            $sql3="select thesubscribe.*,theme.name sn,theme.id si from thesubscribe,theme,user  where thesubscribe.sub_id=theme.id and thesubscribe.user_id=user.id and user.id={$_GET['id']} order by thesubscribe.time desc limit 0,3";
            $thes=$mo->query($sql3);
            foreach($thes as &$row3){
                $row3['tip']='订阅了主题';
                $row3['link']="__APP__/Theme/theartall/id/{$row3['si']}";
            }

            //关注活动动态
            $sql4="select subacti.*,activity.title sn,activity.id si from subacti,activity,user  where subacti.sub_id=activity.id and subacti.user_id=user.id and user.id={$_GET['id']} order by subacti.time desc limit 0,3";
            $actis=$mo->query($sql4);
            foreach($actis as &$row4){
                $row4['tip']='关注了活动';
                $row4['link']="__APP__/Activity/activinfo/id/{$row4['si']}";
            }

            //点赞动态
            $sql5="select fabulous.*,thearticle.title sn,thearticle.id si from fabulous,thearticle,user  where fabulous.article_id=thearticle.id and fabulous.user_id=user.id and user.id={$_GET['id']} order by fabulous.time desc limit 0,3";
            $fabs=$mo->query($sql5);
            foreach($fabs as &$row5){
                $row5['tip']='赞过了文章';
                $row5['link']="__APP__/Article/artinfo/id/{$row5['si']}";
            }

            //合并数组
            $dys=array_merge($subs,$colls,$thes,$actis,$fabs);

            //根据时间排序
            foreach($dys as $rowt){
                $times[]=$rowt['time'];
            }
            array_multisort($times,SORT_DESC,$dys);

            $this->dys=$dys;
        }

        //主题
        if($_GET['change']=='theme'){
            $sql="select thesubscribe.*,theme.name tn,theme.id ti,theme.img from thesubscribe,theme,user  where thesubscribe.sub_id=theme.id and thesubscribe.user_id=user.id and user.id={$_GET['id']} order by thesubscribe.time desc";
            $this->thes=$mo->query($sql);
        }

        //收藏
        if($_GET['change']=='collection'){
            $sqc="select count(*)  from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']}";
            $rowc=$mo->query($sqc);
            $count=$rowc[0]['count(*)'];
            $length=10;
            $param='id='.urlencode($_GET['id']).'&name='.urlencode($_GET['name']).'&change='.'collection';
            $page=new Page($count,$length,$param);
            $page->setConfig('header','篇文章');
            $sql="select collection.*,thearticle.title an,thearticle.id ai,thearticle.time tt,thearticle.content  from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']} order by tt desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
            foreach($rows as &$row){
                $row['content']=htmlspecialchars_decode($row['content']);
                $row['content']=strip_tags($row['content']);
                $row['content']=preg_replace('/\s| /','',$row['content']);
                $row['content']=mb_substr($row['content'],0,50,'utf-8');
            }
            $this->colls=$rows;
            $this->show=$page->show();
        }

        //点赞
        if($_GET['change']=='fabulous'){
            $sqc="select count(*) from fabulous,thearticle,user  where fabulous.article_id=thearticle.id and fabulous.user_id=user.id and user.id={$_GET['id']}";
            $rowc=$mo->query($sqc);
            $count=$rowc[0]['count(*)'];
            $length=10;
            $param='id='.urlencode($_GET['id']).'&name='.urlencode($_GET['name']).'&change='.'fabulous';
            $page=new Page($count,$length,$param);
            $sql="select fabulous.*,thearticle.title sn,thearticle.id si,thearticle.time tt from fabulous,thearticle,user  where fabulous.article_id=thearticle.id and fabulous.user_id=user.id and user.id={$_GET['id']} order by tt desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
            $this->fabs=$mo->query($sql);
            $this->show=$page->show();
        }


        $this->display();
    }
    public function myindex(){
        if(!session('user_id')){
            $this->redirect('Login/login');
        }


        import("ORG.Util.Page");

        $mo=M();

        //用户信息
        $user=M('user');
        $this->user=$user->find($_GET['id']);

        //默认显示动态
        if(!isset($_GET['change'])){
            //订阅站点动态
            $sql1="select subscribe.*,site.name sn,site.id si from subscribe,site,user  where subscribe.sub_id=site.id and subscribe.user_id=user.id and user.id={$_GET['id']} order by subscribe.time desc limit 0,3";
            $subs=$mo->query($sql1);
            foreach($subs as &$row1){
                $row1['tip']='订阅了站点';
                $row1['link']="__APP__/Site/siteartall/id/{$row1['si']}";
            }


            //收藏动态
            $sql2="select collection.*,thearticle.title sn,thearticle.id si from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']} order by collection.time desc limit 0,3";
            $colls=$mo->query($sql2);
            foreach($colls as &$row2){
                $row2['tip']='收藏了文章';
                $row2['link']="__APP__/Article/artinfo/id/{$row2['si']}";
            }

            //订阅主题动态
            $sql3="select thesubscribe.*,theme.name sn,theme.id si from thesubscribe,theme,user  where thesubscribe.sub_id=theme.id and thesubscribe.user_id=user.id and user.id={$_GET['id']} order by thesubscribe.time desc limit 0,3";
            $thes=$mo->query($sql3);
            foreach($thes as &$row3){
                $row3['tip']='订阅了主题';
                $row3['link']="__APP__/Theme/theartall/id/{$row3['si']}";
            }

            //关注活动动态
            $sql4="select subacti.*,activity.title sn,activity.id si from subacti,activity,user  where subacti.sub_id=activity.id and subacti.user_id=user.id and user.id={$_GET['id']} order by subacti.time desc limit 0,3";
            $actis=$mo->query($sql4);
            foreach($actis as &$row4){
                $row4['tip']='关注了活动';
                $row4['link']="__APP__/Activity/activinfo/id/{$row4['si']}";
            }

            //点赞动态
            $sql5="select fabulous.*,thearticle.title sn,thearticle.id si from fabulous,thearticle,user  where fabulous.article_id=thearticle.id and fabulous.user_id=user.id and user.id={$_GET['id']} order by fabulous.time desc limit 0,3";
            $fabs=$mo->query($sql5);
            foreach($fabs as &$row5){
                $row5['tip']='赞过了文章';
                $row5['link']="__APP__/Article/artinfo/id/{$row5['si']}";
            }

            //合并数组
            $dys=array_merge($subs,$colls,$thes,$actis,$fabs);

            //根据时间排序
            foreach($dys as $rowt){
                $times[]=$rowt['time'];
            }
            array_multisort($times,SORT_DESC,$dys);

            $this->dys=$dys;
        }

        //主题
        if($_GET['change']=='theme'){
            $sql="select thesubscribe.*,theme.name tn,theme.id ti,theme.img from thesubscribe,theme,user  where thesubscribe.sub_id=theme.id and thesubscribe.user_id=user.id and user.id={$_GET['id']} order by thesubscribe.time desc";
            $this->thes=$mo->query($sql);
        }

        //收藏
        if($_GET['change']=='collection'){
            $sqc="select count(*)  from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']}";
            $rowc=$mo->query($sqc);
            $count=$rowc[0]['count(*)'];
            $length=10;
            $param='id='.urlencode($_GET['id']).'&name='.urlencode($_GET['name']).'&change='.'collection';
            $page=new Page($count,$length,$param);
            $page->setConfig('header','篇文章');
            $sql="select collection.*,thearticle.title an,thearticle.id ai,thearticle.time tt,thearticle.content  from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']} order by tt desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
            foreach($rows as &$row){
                $row['content']=htmlspecialchars_decode($row['content']);
                $row['content']=strip_tags($row['content']);
                $row['content']=preg_replace('/\s| /','',$row['content']);
                $row['content']=mb_substr($row['content'],0,50,'utf-8');
            }
            $this->colls=$rows;
            $this->show=$page->show();
        }

        //点赞
        if($_GET['change']=='fabulous'){
            $sqc="select count(*) from fabulous,thearticle,user  where fabulous.article_id=thearticle.id and fabulous.user_id=user.id and user.id={$_GET['id']}";
            $rowc=$mo->query($sqc);
            $count=$rowc[0]['count(*)'];
            $length=10;
            $param='id='.urlencode($_GET['id']).'&name='.urlencode($_GET['name']).'&change='.'fabulous';
            $page=new Page($count,$length,$param);
            $sql="select fabulous.*,thearticle.title sn,thearticle.id si,thearticle.time tt from fabulous,thearticle,user  where fabulous.article_id=thearticle.id and fabulous.user_id=user.id and user.id={$_GET['id']} order by tt desc limit {$page->firstRow},{$length}";
            $rows=$mo->query($sql);
            $this->fabs=$mo->query($sql);
            $this->show=$page->show();
        }


        $this->display();
    }

    public function mycoll(){
        if(!session('user_id')){
            $this->redirect('Login/login');
        }

        import("ORG.Util.Page");

        $mo=M();

        $sqc="select count(*)  from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']}";
        $rowc=$mo->query($sqc);
        $count=$rowc[0]['count(*)'];
        $length=10;
        $param='id='.urlencode($_GET['id']).'&name='.urlencode($_GET['name']).'&change='.'collection';
        $page=new Page($count,$length,$param);
        $page->setConfig('header','篇文章');
        $sql="select collection.*,thearticle.title an,thearticle.id ai,thearticle.time tt,thearticle.content  from collection,thearticle,user  where collection.article_id=thearticle.id and collection.user_id=user.id and user.id={$_GET['id']} order by tt desc limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql);
        foreach($rows as &$row){
            $row['content']=htmlspecialchars_decode($row['content']);
            $row['content']=strip_tags($row['content']);
            $row['content']=preg_replace('/\s| /','',$row['content']);
            $row['content']=mb_substr($row['content'],0,50,'utf-8');
        }
        $this->colls=$rows;
        $this->show=$page->show();

        $this->display();
    }

    public function settings(){
        if(!session('user_id')){
            $this->redirect('Login/login');
        }
        $user=D('User');
        $this->user = $user->find($_GET['id']);
        if(!$_GET['change']) {

            if (isset($_POST['user'])) {
                $modify['username'] = $_POST['user'];
                $modify['id'] = $_POST['id'];
                if ($modify['username'] != '') {
                    if ($user->save($modify)) {
                        cookie("user", $modify['username'], 24 * 3600 * 10);
                        $_SESSION['username'] = $modify['username'];
                        $this->tip = 'success';
                    };
                } else {
                    $this->tip = "nouser";
                }
            }

            if (isset($_FILES['img'])) {
                import("ORG.Net.UploadFile");
                $user = M('user');
                $up = new UploadFile();
                $up->savePath = 'Public/Uploads/headport/';
                $up->allowExts = array('jpg', 'jpeg', 'png', 'gif');
                $row = $user->select($_POST['id']);
                if ($up->upload()) {
                    $info = $up->getUploadFileInfo();
                    $name = $info[0]['savename'];
                    $user->img = $name;
                    $user->id = $_POST['id'];
                    if ($user->save()) {
                        unlink("Public/Uploads/headport/{$row[0]['img']}");
                        $_SESSION['img'] = $name;
                        $this->tip = 'uploadsuccess';
                    }
                } else {
                    $this->tip = 'uploaderror';
                    $this->error = $up->getErrorMsg();
                }
            }
        }

        if($_GET['change']=='modifymailbox') {
            if (isset($_POST['email'])) {
                $_POST['username']=$_COOKIE['user'];
                $_POST['password']=md5($_COOKIE['password']);
                $row=$user->where($_POST)->find();
                session('login', 1);
                session('username', $row['username']);
                session('user_id', $row['id']);
                session('img',$row['img']);
                if($_POST['email']==''){
                    $this->tip='noemail';
                }else{

                }
            }
        }


        $this->display();
    }

    public function modifymail(){
            $user=M("user");
            if($_POST['email']==''){
                redirect($_SERVER['HTTP_REFERER']."/tip/noemail");
            }else{
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    $alter['email']=$_POST['email'];
                    $alter['id']=$_POST['id'];
                    if($user->save($alter)){
                        redirect($_SERVER['HTTP_REFERER']."/tip/success");
                    }
                }else{
                    redirect($_SERVER['HTTP_REFERER']."/tip/emailerror");
                }
            }
    }
    public function modifypassword(){
        $user=M('user');
        $rows=$user->select($_POST['id']);
        if(md5($_POST['password'])==$rows[0]['password']){
            if(preg_match('/^.{7,24}$/',$_POST['newpassword'],$arr)){
                if($_POST['newpassword']==$_POST['repassword']){
                    $user->password=md5($_POST['newpassword']);
                    $user->id=$_POST['id'];
                    if($user->save()){
                        cookie('password',$_POST['newpassword'],'30*24*60*60');
                        redirect($_SERVER['HTTP_REFERER']."/tip/success");
                    };
                }else{
                    redirect($_SERVER['HTTP_REFERER']."/tip/nosame");
                }
            }else{
                redirect($_SERVER['HTTP_REFERER']."/tip/errorlength");
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']."/tip/error");
        }
    }

    public function message(){
        import("ORG.Util.Page");
        $this->hhh='xsax';
        $mo=M();
        $sqc="select count(*) from user,replay,comment,thearticle where comment.article_id=thearticle.id and comment.user_id={$_SESSION['user_id']} and replay.comment_id=comment.id and replay_id=user.id";
        $rowc=$mo->query($sqc);
        $count=$rowc[0]['count(*)'];
        $length=10;
        $param="id=".urlencode($_GET['id']);
        $page=new Page($count,$length,$param);
        $page->setConfig('header','条回复');
        $this->show=$page->show();
        $sql="select user.*,replay.time rt,replay.content rc,replay.id ri,thearticle.title tt,thearticle.id ti from user,replay,comment,thearticle where comment.article_id=thearticle.id and comment.user_id={$_SESSION['user_id']} and replay.comment_id=comment.id and replay_id=user.id order by rt desc limit {$page->firstRow},{$length}";

        $this->res=$mo->query($sql);

        $this->display();
    }

    public function delmessage(){
        $replay=M('replay');
        if($replay->delete($_GET['id'])){
            redirect($_SERVER['HTTP_REFERER']);
        };
    }

    public function mycomment(){
        import("ORG.Util.MyPage");
        $mo=M();
        $sqc="select * from comment,user where comment.user_id=user.id and  user.id={$_SESSION['user_id']} group by FROM_UNIXTIME(comment.time,'%Y-%m')";
        $rowc=$mo->query($sqc);
        $count1=count($rowc);
        $length1=2;
        $param1="id=".urlencode($_GET['id']);
        $page1=new MyPage($count1,$length1,"g",$param1);
        $page1->setConfig("theme",'%upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%');
        $this->show=$page1->show();
        $sql1="select comment.* from comment,user where comment.user_id=user.id and  user.id={$_SESSION['user_id']} group by FROM_UNIXTIME(comment.time,'%Y-%m') order by FROM_UNIXTIME(comment.time,'%Y-%m') desc limit {$page1->firstRow},{$length1}";
        $rows=$mo->query($sql1);
        $i=0;
        foreach($rows as &$row){
            $sqc2="select count(*) from comment,thearticle,user where comment.article_id=thearticle.id and comment.user_id=user.id and user.id={$_SESSION['user_id']} and FROM_UNIXTIME(comment.time,'%Y-%m')=FROM_UNIXTIME({$row['time']},'%Y-%m')";
            $rowc2=$mo->query($sqc2);
            $count2=$rowc2[0]['count(*)'];
            $length2=10;
            $param2="id=".urlencode($_GET['id'])."&g=".urlencode($_GET['g']);
            $page2=new MyPage($count2,$length2,"d{$i}",$param2);
            $i++;
            $page2->setConfig("theme",'%upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%');
            $sql="select comment.*,thearticle.title tt,thearticle.id ti from comment,thearticle,user where comment.article_id=thearticle.id and comment.user_id=user.id and user.id={$_SESSION['user_id']} and FROM_UNIXTIME(comment.time,'%Y-%m')=FROM_UNIXTIME({$row['time']},'%Y-%m') order by comment.time desc limit {$page2->firstRow},{$length2}";
            $rows2=$mo->query($sql);
            $row['show']=$page2->show();
             $row['comm']=$rows2;
        }

       $this->comms=$rows;
        $this->display();
    }

    public function test(){
        import("ORG.Util.MyPage");
        $class=M('class');
        $site=M('site');
        $count1=$class->where("pid=1")->count();
        $length=2;
        $page1=new MyPage($count1,$length,"j");
        $this->show1=$page1->show();
        $rows=$class->limit($page1->firstRow,$length)->where("pid=1")->select();
        $i=0;
        foreach($rows as &$row){
            $count2=$site->where("class_id={$row['id']}")->count();
            $page2=new MyPage($count2,1,"d{$i}");
            $i++;
            $row['show']=$page2->show();
            $rows2=$site->limit($page2->firstRow,1)->where("class_id={$row['id']}")->select();
            $row['sits']=$rows2;
        }
        $this->clas=$rows;
        $this->display();
    }
}