<?php 
	class PublicAction extends Action{

		public function _initialize(){
			if($_SESSION['admin_login']!=1){
				$this->redirect('Login/index');
			}
		}

		public function _empty(){
			$this->error('小伙伴不要调皮- -');
		}
	}
 ?>