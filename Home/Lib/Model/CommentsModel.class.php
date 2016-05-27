<?php 
	class CommentsModel extends Model{
		protected $_validate = array(
			// array('username','check_name',"用户名长度不符合要求！",1,'callback',3),
			// array('username','',"用户名已被注册！",1,'unique',3),
			// array('useremail','email',"邮箱地址不符合要求！",1),
			array("content",'require','评论不能为空！',1),
		);

		// protected function check_name(){
		// 	if(strlen($_POST['username'])>=4 && strlen($_POST['username'])<=32){
		// 		return true;
		// 	}else{
		// 		return false;
		// 	}
		// }
	}

 ?>