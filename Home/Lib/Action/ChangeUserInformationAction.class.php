<?php
	header("Content-type: text/html; charset=utf-8");
class ChangeUserInformationAction extends CommonAction {

	public function _before_index(){
		if($_SESSION['login']!=1){
			$this->redirect('Index/index');
		}
	}

    public function index(){
    	$user=M("User");
    	$where['id']=$_SESSION['userid'];
    	$rst=$user->where($where)->find();
    	$this->assign("email",$rst['email']);
    	$this->display();
    }

    public function change_password(){
    	$user=M("User");
    	$rst=$user->find($_SESSION['userid']);
    	if($rst['password']===md5($_POST['old-password'])){
    		if($_POST['new-password']==$_POST['re-password']){
    			if(strlen($_POST['new-password'])>=6 && strlen($_POST['new-password'])<=32){
    				$data['password']=md5($_POST['new-password']);
	    			$where['id']=$_SESSION['userid'];
	    			$user->where($where)->save($data);
	    			$this->success('密码修改成功！',U("Index/index"));
    			}else{
    				$this->assign("tip","请确保密码长度在6-32个字符！");
    				$this->display("index");
    			}
    			
    		}else{
    			$this->assign("tip","两次输入的密码不一致！");
    			$this->display("index");
    		}
    	}else{
    		$this->assign("tip","密码错误！");
    		$this->display("index");
    	}

    }

    public function change_email(){
    	$user=M("User");
    	$rst=$user->find($_SESSION['userid']);
    	$ptn='/.+@.+\..+/';
    	preg_match($ptn, $_POST['email'],$rst);
    	if($rst){
    		$data['email']=$_POST['email'];
    		$where['id']=$_SESSION['userid'];
    		$user->where($where)->save($data);
    		$this->success('邮箱修改成功！',U("Index/index"));
    	}else{
    		$this->assign("tip","邮箱格式错误！");
    		$this->display("index");
    	}
    }


   
}