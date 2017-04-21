<?php 
	//1.确定应用名称 Admin 
	define('APP_NAME', 'Admin');
	//2.确定应用路径
	define('APP_PATH','./Admin/');
	//3.开启调试模式
	define('APP_DEBUG', true);
	//4.应用核心文件
	require './ThinkPHP/ThinkPHP.php';
 ?>