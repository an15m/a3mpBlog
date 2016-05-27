<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理登陆界面</title>
	<link rel="stylesheet" href="__CSS__/admin_login.css">
</head>
<body>
	<div id='page'>
		<form action="__URL__/do_login" method='post'>
			<input type="password" name="password" id="">
			<input type="submit" value='登陆'>
		</form>
	</div>
</body>
</html>