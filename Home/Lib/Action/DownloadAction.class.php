<?php  
	header("Content-type:text/html;charset=utf-8"); 
	Class DownloadAction extends Action{
	  	public function index(){
	    	$this->display(); 
	 	}

	 	public function download(){
	 		$file_name=$_GET['filename'];
	 		//$file_sub_path=$_SERVER['DOCUMENT_ROOT']."/dandelionBlog/Public/Download/"; 
	 		$file_sub_path="./Public/Download/";
	 		$file_path=$file_sub_path.$file_name;
	 		if(!file_exists($file_path)){ 
				$this->error('下载失败！');
			}
			$fp=fopen($file_path,"r"); 
			$file_size=filesize($file_path); 
			Header("Content-type: application/octet-stream"); 
			Header("Accept-Ranges: bytes"); 
			Header("Accept-Length:".$file_size); 
			Header("Content-Disposition: attachment; filename=".$file_name); 
			$buffer=1024; 
			$file_count=0; 
			//向浏览器返回数据 
			while(!feof($fp) && $file_count<$file_size){ 
				$file_con=fread($fp,$buffer); 
				$file_count+=$buffer; 
				echo $file_con; 
			} 
			fclose($fp); 
	 	}
	}
 ?>
