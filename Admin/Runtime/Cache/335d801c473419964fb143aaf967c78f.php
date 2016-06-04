<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户信息管理</title>
</head>
<body>
	<div id='page'>
		<form action="__URL__/do_about_me" method="post">
			<textarea name="content" id="" cols="130" rows="30"><?php echo ($about_me["content"]); ?></textarea><br>
			<input type="submit" value="修改">
		</form>
	</div>
</body>
</html>