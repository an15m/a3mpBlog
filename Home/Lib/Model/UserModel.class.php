<?php 
	class UserModel extends Model{
		protected $_validate = array(
			array('name','check_name',"用户名长度不符合要求！",1,'callback',3),
			array('name','',"用户名已被注册！",1,'unique',3),
			array('email','email',"邮箱地址不符合要求！",1),
			array('password',"6,32","密码长度不符合要求！",1,'length',3),
			array('repassword','password',"两次输入密码不一致！",1,'confirm',3),
		);

		protected $_auto = array(
			array('password','md5',3,'function'),
		);

		protected function check_name(){
			if(strlen($_POST['name'])>=4 && strlen($_POST['name'])<=32){
				return true;
			}else{
				return false;
			}
		}

	}

 ?>