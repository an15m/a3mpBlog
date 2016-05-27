<?php
class LoginAction extends CommonAction {
    public function index(){
    	$this->display();
    }

    public function do_login(){
    	$user=M("User");
    	$where['name']=$_POST['name'];
    	$where['password']=md5($_POST['password']);
    	$rst=$user->where($where)->find();
    	if($rst){
    		$_SESSION['login']=1;
        	$_SESSION['userid']=$rst['id'];
        	$_SESSION['username']=htmlspecialchars($rst['name']);
            $_SESSION['useremail']=$rst['email'];
        	$this->redirect('Index/index');
    	}else{
    		$this->assign('tip',"用户名或密码错误！");
    		$this->display("index");
    	}
    }

    public function do_logout(){
    	$_SESSION=array();
    	if(isset($_COOKIE[session_name()])){
    		setcookie(session_name(),'',time()-3600,'/');
    	}
    	session_destroy();
    	$this->redirect('Index/index');
    }

    public function check(){
    	if(empty($_POST['val'])){
    		echo 0;
    	}else{
    		echo 1;
    	}
    }
}