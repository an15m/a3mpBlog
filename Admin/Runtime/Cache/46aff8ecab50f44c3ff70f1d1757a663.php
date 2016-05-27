<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>menu</title>
	<link rel="stylesheet" href="__CSS__/menu.css">
</head>
<body>
	<div id='page'>
		<div id='logout' target="_parent">
			<a href="__APP__/Login/logout">退出</a>
		</div>
		<ul>
			<li class='menu-li'>
				<a href="__URL__/new_article" target="middle">发表文章</a>	
			</li>
			<li class='menu-li'>
				<a href="__URL__/change_other" target="middle">修改其他信息</a>	
			</li>
			<li class='menu-li'>
				<a href="__URL__/link" target="middle">友情链接管理</a>
			</li>
			<li class='menu-li'>
				<a href="__URL__/tech" target="middle">技术子栏管理</a>
			</li>
			<li class='menu-li'>
				<a href="__URL__/user" target="middle">用户管理</a>
			</li>
		</ul>
		<div id='statistics'>
			<p>总访问量：<?php echo ($total_visit); ?></p>
		</div>
	</div>
</body>
</html>