<?php 
	class LoginAction extends Action{
		public function index(){
			$this->display();
		}

		public function do_login(){
			if(md5($_POST['password'])=="a77a827b95ae6fcbe58b565c6f65a2e8"){
				$_SESSION['admin_login']='1';
				$this->success('登陆成功！',U("Index/index"));
			}else{
				$this->error('密码错误');
			}
		}

		public function logout(){
			$site = explode('admin.php','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])[0];
			$_SESSION=array();
	    	if(isset($_COOKIE[session_name()])){
	    		setcookie(session_name(),'',time()-3600,'/');
	    	}
	    	session_destroy();
            //$this->redirect('Login/index');
	    	echo "<script>window.parent.location.href='".$site."admin.php/Login/index';</script>";
		}
	}
 ?>