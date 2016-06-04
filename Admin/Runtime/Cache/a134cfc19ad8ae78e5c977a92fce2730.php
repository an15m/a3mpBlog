<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改其他信息</title>
	<link rel="stylesheet" href="__CSS__/change_other.css">
</head>
<body>
	<div id='page'>
		<form action="__URL__/do_change_other" method="post">
			motto：<input type="text" name='motto' value="<?php echo ($other["motto"]); ?>" id='motto'><br>
			最近学习：<input type="text" name="now_learn" id="now_learn" value="<?php echo ($other["now_learn"]); ?>"><br>
			<input type="submit" value="提交">
		</form>
	</div>
</body>
</html>