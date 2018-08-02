<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1 0001
 * Time: 下午 16:10
 */
class ClassAction extends AclAction{
    public function view(){
        import("ORG.Util.Page");
        $class=M('class');
        $count=$class->count();
        $length=15;
        $page=new Page($count,$length);
        $page->setConfig('theme','共有%totalRow% 个分类 %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%');
        $this->show=$page->show();
        $rows=$class->order("concat(path,'-',id)")->limit($page->firstRow,$length)->select();
        foreach($rows as &$row){
            $num=substr_count($row['path'],'-');
            if($row['pid']>0){
                $pre='&nbsp;|'.str_repeat('&nbsp;_',$num);
                if($num>=2){
                    $pre='&nbsp;&nbsp;&nbsp;|'.str_repeat('&nbsp;&nbsp;&nbsp;_',$num);
                }
            }else{
                $pre='';
            }
            $row['tree']=$pre.$row['name'];
        }
        $this->rows=$rows;
        $this->display();
    }
    public function add(){
        $class=M('class');
        $rows=$class->order("concat(path,'-',id)")->select();
        foreach($rows as &$row){
            $num=substr_count($row['path'],'-');
            if($row['pid']>0){
                $pre='&nbsp;|'.str_repeat('&nbsp;_',$num);
                if($num>=2){
                    $pre='&nbsp;&nbsp;&nbsp;|'.str_repeat('&nbsp;&nbsp;&nbsp;_',$num);
                }
            }else{
                $pre='';
            }
            $row['tree']=$pre.$row['name'];
        }
        $this->rows=$rows;
        $this->display();
    }
    public function insert(){
        $class=M('class');
        $_POST['name']=$this->_post('class');
        $rows=$class->select($this->_post('fclass'));
        if($this->_post('fclass')) {
            $_POST['pid'] = $this->_post('fclass');
            $_POST['path'] = $rows[0]['path'] . '-' . $rows[0]['id'];
        }else{
            $_POST['pid']=0;
            $_POST['path']=0;
        }
        $class->create();
       if($class->add()){
           $this->success('添加成功',U('view'));
       }
    }
    public function edit(){
        $class=M('class');
        $rows=$class->order("concat(path,'-',id)")->select();
        foreach($rows as &$row){
            $num=substr_count($row['path'],'-');
            if($row['pid']>0){
                $pre='&nbsp;|'.str_repeat('&nbsp;_',$num);
                if($num>=2){
                    $pre='&nbsp;&nbsp;&nbsp;|'.str_repeat('&nbsp;&nbsp;&nbsp;_',$num);
                }
            }else{
                $pre='';
            }
            $row['tree']=$pre.$row['name'];
        }
        $row=$class->find($this->_get('id'));
        $this->name=$row['name'];
        $this->rows=$rows;

        $this->display();
    }

    public function update(){
        $class=M('class');
        $_POST['name']=$this->_post('class');
        $rows=$class->select($this->_post('fclass'));
        if($this->_post('fclass')==0){
            $_POST['pid']=0;
            $_POST['path']=0;
        }else{
            $_POST['pid']=$rows[0]['id'];
            $_POST['path']=$rows[0]['path'].'-'.$rows[0]['id'];
        }
       $class->create();
        if($class->save()){
            $rows2=$class->where("pid={$this->_post('id')}")->select();
            foreach($rows2 as $row2){
                $child["id"]=$row2['id'];
                $child['path']=$_POST['path'].'-'.$_POST['id'];
                $class->save($child);
            }
            $this->success('修改成功',U('view'));
        }
    }

    public function delete(){
        $class=M('class');
        if($class->delete($this->_get('id'))){
            $this->success('删除成功');
        }
    }
}