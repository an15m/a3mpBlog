<?php
    header("Content-type: text/html; charset=utf-8");
class RegisterAction extends CommonAction {
    public function index(){
    	$this->display();
    }

    public function do_register(){
    	$user=D("User");
        if(!$user->create()){
            $this->error($user->getError());
        }
        $user->add();
        $this->success('注册成功！',U('Login/index'));
    }

    public function check_name(){
    	if(strlen($_POST['val'])>=4 && strlen($_POST['val'])<=32){
            $user=M("User");
            $where['name']=$_POST['val'];
            $count=$user->where($where)->count();
            if($count){
                echo 2;
            }else{
                echo 1;
            }
    	}else{
    		echo 0;
    	}
    }

    public function check_email(){
    	$ptn='/.+@.+\..+/';
    	preg_match($ptn, $_POST['val'],$rst);
    	if($rst){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    public function check_password(){
    	if(strlen($_POST['val'])>=6 && strlen($_POST['val'])<=32){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    public function check_repassword(){
    	if($_POST['password']===$_POST['repassword']){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }
}