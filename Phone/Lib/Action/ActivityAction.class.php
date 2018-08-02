<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16 0016
 * Time: 上午 2:06
 */
class ActivityAction extends AutoAction{
    public function index(){
        $mo=M();
        //所有城市
        $city=M('city');
        $this->citys=$city->select();

        //所有类型
        $class=M('class');
        $this->clas=$class->where("pid=12")->select();

        //所有品牌
        $brand=M('brand');
        $this->brands=$brand->select();

        //热门活动
        $sql="select activity.*,city.name cn from city left join activity on city.id=activity.city_id left join subacti on activity.id=subacti.sub_id where activity.id is not null group by activity.id order by count(subacti.id) desc limit 0,5";
        $this->hots=$mo->query($sql);

        //默认城市活动
        if(!$_GET['city']) {
            $sql2 = "select activity.*,city.name cn,city.id ci from activity,city where activity.city_id=city.id and city.id=1 order by activity.start desc limit 0,20";
            $rows=$mo->query($sql2);
            $sqc="select count(*) from activity,city where activity.city_id=city.id and city.id=1";
            $count=$mo->query($sqc);
            $this->count=$count[0]['count(*)'];
            $this->actis=$rows;
        }

        //指定城市活动
        if($_GET['city']) {
            $sql2 = "select activity.*,city.name cn,city.id ci from activity,city where activity.city_id=city.id and city.id={$_GET['city']} order by activity.start desc limit 0,20";
            $rows=$mo->query($sql2);
            $sqc="select count(*) from activity,city where activity.city_id=city.id and city.id={$_GET['city']}";
            $count=$mo->query($sqc);
            $this->count=$count[0]['count(*)'];
            if(!empty($rows)){
                 $this->actis=$rows;
            }else{
                $sql3="select activity.*,city.name cn,city.id ci from activity,city where activity.city_id=city.id  order by activity.start desc limit 0,20";
                $rows2=$mo->query($sql3);
                $this->actis=$rows2;
            }
        }


        //广告幻灯片
       $advertisement=M('advertisement');
        $this->advers=$advertisement->where("pos='活动区'")->select();

        $this->display();
    }

    public function brandall(){
        import("ORG.Util.Page");
        $mo=M();
        $activity=M('activity');
        $brand=M('brand');
        $this->brand=$brand->where("id={$_GET['id']}")->find();
        $sqc="select count(*) from activity,brand where activity.brand_id=brand.id and brand.id={$_GET['id']}";
        $rowc=$mo->query($sqc);
        $count=$rowc[0]['count(*)'];
        $length=10;
        $param='id='.urlencode($_GET['id']);
        $page=new Page($count,$length,$param);
        $sql="select activity.*,city.name cn from activity,brand,city where activity.brand_id=brand.id and activity.city_id=city.id and brand.id={$_GET['id']} order by activity.start desc  limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql);
        $this->actis=$rows;

        $this->display();
    }

    public function activinfo(){
        $mo=M();
        //活动详情
        $sql="select activity.*,class.id ci,class.name cn,city.name tn from activity,class,city where activity.class_id=class.id  and activity.city_id=city.id and activity.id={$this->_get('id')}";
        $row=$mo->query($sql);
        $this->acti=$row;

        //同城活动
        $activity=M('activity');
        $this->actis=$activity->where("city_id={$row[0]['city_id']}")->select();

        //活动广告
        $advertisement=M('advertisement');
        $this->advers=$advertisement->where("pos='活动区'")->select();

        //是否有关注
        $subacti=M('subacti');
        $_POST['user_id']=$_SESSION['user_id'];
        $_POST['sub_id']=$this->_get('id');

        $this->count=$subacti->where($_POST)->count();


        $this->display();
    }

    public function myacti(){
        if(!session('user_id')){
            $this->redirect('Login/login');
        }
        $mo=M();
        $sql="select activity.*,city.name cn from activity,city,subacti,user where activity.city_id=city.id and activity.id=subacti.sub_id and subacti.user_id=user.id and user.id={$_SESSION['user_id']}";
        $this->actis=$mo->query($sql);

        $this->display();
    }


    public function actilist(){
        $mo=M();
        //查询指定城市
        if($_GET['city'] && !$_GET['time'] && !$_GET['class']){
              $sql="select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.start>=unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
              $this->actis=$mo->query($sql);
             if($_GET['city']=="all"){
                 $sql="select activity.*,city.name cn from activity,city where activity.city_id=city.id and activity.start>=unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000   order by activity.start desc";
                 $this->actis=$mo->query($sql);
             }
        }

        //查询指定时间和城市
        if($_GET['city'] && $_GET['time'] && !$_GET['class']){
            //正在进行
            if($_GET['time']=='underway') {
                $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.start< unix_timestamp(now()) and activity.end>unix_timestamp(now()) order by activity.start desc";
                $this->actis = $mo->query($sql);
            }

            //未来三天
            if($_GET['time']=='3day') {
                $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+259200 order by activity.start desc";
                $this->actis = $mo->query($sql);
            }


            //未来一周
            if($_GET['time']=='1week') {
                $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+604800 order by activity.start desc";
                $this->actis = $mo->query($sql);
            }

            //未来一月
            if($_GET['time']=='1mon') {
                $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+2592000 order by activity.start desc";
                $this->actis = $mo->query($sql);
            }


            //未来三月
            if($_GET['time']=='3mon') {
                $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
                $this->actis = $mo->query($sql);
            }

            //已经结束
            if($_GET['time']=='over') {
                $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and city.id={$_GET['city']} and activity.end<unix_timestamp(now())  order by activity.start desc";
                $this->actis = $mo->query($sql);
            }
        }

        //查询指定类型和城市
        if($_GET['city'] && !$_GET['time'] && $_GET['class']) {
            $sql="select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and class.id=activity.class_id and class.id={$_GET['class']} and city.id={$_GET['city']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
            $this->actis = $mo->query($sql);
        }

        //所有城市
        $city=M('city');
        $this->citys=$city->select();

        //所有类型
        $class=M('class');
        $this->clas=$class->where("pid=12")->select();

       //搜索
        if($_POST['city']) {
            if ($_POST['city']== 'all' && $_POST['class']== 'all') {
                //正在进行
                if($_POST['time']=='underway') {
                    $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id  and activity.start< unix_timestamp(now()) and activity.end>unix_timestamp(now()) order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来三天
                if($_POST['time']=='3day') {
                    $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+259200 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来一周
                if($_POST['time']=='1week') {
                    $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+604800 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来一月
                if($_POST['time']=='1mon') {
                    $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+2592000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来三月
                if($_POST['time']=='3mon') {
                    $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //已经结束
                if($_POST['time']=='over') {
                    $sql = "select activity.*,city.name cn from activity,city where activity.city_id=city.id and activity.end<unix_timestamp(now())  order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }
            }

            if ($_POST['city']!= 'all' && $_POST['class']!= 'all'){
                //正在进行
                if($_POST['time']=='underway') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id and class.id={$_POST['class']} and activity.start< unix_timestamp(now()) and activity.end>unix_timestamp(now()) order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来三天
                if($_POST['time']=='3day') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+259200 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来一周
                if($_POST['time']=='1week') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+604800 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来一月
                if($_POST['time']=='1mon') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+2592000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来三月
                if($_POST['time']=='3mon') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //已经结束
                if($_POST['time']=='over') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id and class.id={$_POST['class']} and activity.end<unix_timestamp(now())  order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }
            }

            if($_POST['city'] == 'all' && $_POST['class'] != 'all'){
                //正在进行
                if($_POST['time']=='underway') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id  and class.id=activity.class_id and class.id={$_POST['class']} and activity.start< unix_timestamp(now()) and activity.end>unix_timestamp(now()) order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来三天
                if($_POST['time']=='3day') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id  and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+259200 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来一周
                if($_POST['time']=='1week') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id  and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+604800 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来一月
                if($_POST['time']=='1mon') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id  and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+2592000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来三月
                if($_POST['time']=='3mon') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id  and class.id=activity.class_id and class.id={$_POST['class']} and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //已经结束
                if($_POST['time']=='over') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id  and class.id=activity.class_id and class.id={$_POST['class']} and activity.end<unix_timestamp(now())  order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }
            }

            if($_POST['city'] != 'all' && $_POST['class'] == 'all'){
                //正在进行
                if($_POST['time']=='underway') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id  and activity.start< unix_timestamp(now()) and activity.end>unix_timestamp(now()) order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来三天
                if($_POST['time']=='3day') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id  and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+259200 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来一周
                if($_POST['time']=='1week') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id  and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+604800 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //未来一月
                if($_POST['time']=='1mon') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id  and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+2592000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }


                //未来三月
                if($_POST['time']=='3mon') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id  and activity.start>unix_timestamp(now()) and activity.start<=unix_timestamp(now())+7776000 order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }

                //已经结束
                if($_POST['time']=='over') {
                    $sql = "select activity.*,city.name cn from activity,city,class where activity.city_id=city.id and city.id={$_POST['city']} and class.id=activity.class_id  and activity.end<unix_timestamp(now())  order by activity.start desc";
                    $this->actis = $mo->query($sql);
                }
            }
       }
        //右侧广告
        $advertisement=M('advertisement');
        $this->advers=$advertisement->where("pos='活动区'")->select();


        $this->display();
    }

    public function subhand(){
        if(!session('login') || !session('user_id')){
            echo "no";
            exit;
        }
        $subacti=M('subacti');
        $_POST['sub_id']=$this->_get('subid');
        $_POST['user_id']=$_SESSION['user_id'];
        if($this->_get('fa')){
            $subacti->create();
            $subacti->time=time();
            $subacti->add();
            echo 1;
        }else{
            $subacti->where($_POST)->delete();
            echo 0;
        }
    }
    public function classall(){
        import("ORG.Util.Page");
        $mo=M();
        $activity=M('activity');
        $count=$activity->where("class_id={$this->_get('id')}")->count();
        $length=15;
        $param='id='.urlencode($this->_get('id'));
        $page=new Page($count,$length,$param);
        $page->setConfig('header','个活动');
        $this->show=$page->show();
        $sql="select activity.*,class.id ci,class.name cn,city.name tn from activity,class,city where activity.class_id=class.id  and activity.city_id=city.id and class.id={$this->_get('id')} order by activity.start desc limit {$page->firstRow},{$length}";
        $rows=$mo->query($sql);
        $this->actis=$rows;
        $this->display();
    }
}