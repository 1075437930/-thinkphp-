<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AutoAction{
    public function index(){
        if($_SESSION['user_id']){
            $this->redirect('Article/index');
        }
        //首页热门文章
        $mo=M();
        $sql="select thearticle.*,theme.name tn,count(fabulous.id) num from theme left join thearticle on thearticle.the_id=theme.id left join fabulous on fabulous.article_id=thearticle.id where thearticle.id is not null group by thearticle.id  order by num desc limit 0,15";
        $this->arts=$mo->query($sql);



        //首页广告
        $adver=M("advertisement");
        $this->advers=$adver->where("pos='前台首页左侧'")->order('id')->select();
        $this->advers2=$adver->where("pos='前台首页右侧'")->order('id')->select();


        //首页课程推荐
        $course=M("course");
        $this->courses=$course->limit("0,15")->select();

        //首页活动
        $act=M('activity');
        $city=M('city');
        $rows=$act->limit(0,10)->order('start')->select();
        foreach($rows as &$row){
            $row2=$city->find($row['city_id']);
            $row['city']=$row2['name'];
        }
        $this->acts=$rows;

        //前台首页主题
//        $theme=M("theme");
//        $this->thes=$theme->limit(0,18)->order("subnum")->select();
        $sql2="select theme.* from theme left join thesubscribe on theme.id=thesubscribe.sub_id group by theme.id order by count(thesubscribe.id) limit 0,18";
        $this->thes=$mo->query($sql2);


        //前台首页站点
//        $site=M('site');
//        $this->sits=$site->limit(0,15)->where("class_id=13")->order('subnum')->select();
        $sql3="select site.* from site left join subscribe on site.id=subscribe.sub_id where site.class_id=13 group by site.id order by count(subscribe.id) limit 0,15";
        $this->sits=$mo->query($sql3);

        //前台首页用户
        $user=M('user');
        $this->users=$user->limit(0,18)->where('admin=0')->select();


        $this->display();
    }
}