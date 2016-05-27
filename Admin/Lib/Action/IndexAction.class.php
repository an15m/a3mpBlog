<?php

class IndexAction extends PublicAction {
    public function index(){
    	$this->display();
    }

    public function menu(){
    	$other=M("Other");
    	$otherRst=$other->find(0);
    	$this->assign("total_visit",$otherRst['total_visit']);
    	$this->display();
    }

    public function middle(){
    	$this->display();
    }

    public function new_article(){
    	$tech=M("Tech");
    	$techRst=$tech->select();
    	$this->assign("tech",$techRst);
    	// var_dump($techRst);
    	$this->display();
    }

    public function do_new_article(){
    	$articles=M("Articles");
    	$data['time']=time();
    	$data['type']=$_POST['type'];
    	$data['content']=$_POST['content'];
    	$data['title']=$_POST['title'];
    	$articles->create($data);
    	$lastId=$articles->add();
    	if($lastId){
    		$this->success('发表成功!');
    	}else{
    		$this->error('失败');
    	}
    }

    public function change_other(){
    	$other=M("Other");
    	$otherRst=$other->find(0);
    	$this->assign("other",$otherRst);
    	$this->display();
    }

    public function do_change_other(){
    	$other=M("Other");
    	$data['motto']=$_POST['motto'];
    	$data['now_learn']=$_POST['now_learn'];
    	$lastId=$other->where('id = 0')->save($data);
    	if($lastId){
    		$this->success('成功!');
    	}else{
    		$this->error('失败');
    	}
    }

    public function link(){
    	$link=M("Link");
    	$linkRst=$link->select();
    	$this->assign("link",$linkRst);
    	$this->display();
    }

    public function delete_link(){
    	$linkId=$_GET['id'];
    	$link=M("Link");
    	$lastId=$link->delete($linkId);
    	if($lastId){
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}
    }

    public function new_link(){
    	$this->display();
    }

    public function do_new_link(){
    	$link=M("Link");
    	$data['url']=$_POST['url'];
    	$data['title']=$_POST['title'];
    	$link->create($data);
    	$lastId=$link->add();
    	if($lastId){
    		$this->success('添加成功',U("Index/link"));
    	}else{
    		$this->error('添加失败');
    	}
    }

    public function change_link(){
    	$linkId=$_GET['id'];
    	$link=M("Link");
    	$linkRst=$link->find($linkId);
    	$this->assign("link",$linkRst);
    	$this->display();
    }

    public function do_change_link(){
    	$linkId=$_GET['id'];
    	$link=M("Link");
    	$data['url']=$_POST['url'];
    	$data['title']=$_POST['title'];
    	$where['id']=$linkId;
    	$lastId=$link->where($where)->save($data);
    	if($lastId){
    		$this->success('修改成功',U("Index/link"));
    	}else{
    		$this->error('修改失败');
    	}
    }

    public function tech(){
        $tech=M("Tech");
        $techRst=$tech->select();
        $this->assign("tech",$techRst);
        $this->display();	
    }

    public function delete_techname(){
        $techID=$_GET['id'];
        $tech=M("Tech");
        $lastId=$tech->delete($techID);
        if($lastId){
            $this->success('删除成功',U("Index/tech"));
        }else{
            $this->error('删除失败');
        }
    }

    public function new_techname(){
        $this->display();
    }

    public function do_new_techname(){
        $tech=M("Tech");
        $data['techname']=$_POST['techname'];
        $tech->create($data);
        $lastId=$tech->add();
        if($lastId){
            $this->success('新增成功',U("Index/tech"));
        }else{
            $this->error('新增失败');
        }
    }

    public function user(){
        $user=M("User");
        if($_POST['start']){
            $start=$_POST['start'];
        }else{
            $start=0;
        }
        if($_POST['end']){
            $end=$_POST['end'];
        }else{
            $end=10;
        }
        $userRst=$user->limit($start,$end)->select();
        for($i=0;$i<count($userRst);$i++){
            $userRst[$i]['name']=htmlspecialchars($userRst[$i]['name']);
        }
        $this->assign("user",$userRst);
        $this->display();
    }

    public function delete_user(){
        $userID=$_GET['id'];
        $user=M("User");
        $lastId=$user->delete($userID);
        if($lastId){
            $this->success('删除成功',U("Index/user"));
        }else{
            $this->error('删除失败');
        }
    }
}