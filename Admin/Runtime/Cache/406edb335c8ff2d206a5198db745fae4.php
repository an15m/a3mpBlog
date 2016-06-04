<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章修改</title>
	<link rel="stylesheet" href="__CSS__/new_article.css">
</head>
<body>
	<div id="page">
		<form action="__URL__/do_change_article/id/<?php echo ($id); ?>" method='post'>
	        标题：<input type="text" name="title" id="title" value='<?php echo ($article["title"]); ?>'><br>
	        时间：
	        <input type="text" name='year' size=5 value='<?php echo ($year); ?>'>年
	        <input type="text" name='month' size=5 value='<?php echo ($month); ?>'>月
	        <input type="text" name='day' size=5 value='<?php echo ($day); ?>'>日<br>
	        内容：<br><textarea name="content" id="" cols="130" rows="30"><?php echo ($article["content"]); ?></textarea><br>
	        <input type="submit" value="修改">
		</form>
	</div>
</body>
</html>