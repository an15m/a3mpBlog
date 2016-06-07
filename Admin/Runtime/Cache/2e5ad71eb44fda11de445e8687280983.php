<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增友情链接</title>
</head>
<body>
	<div id='page'>
		<form action="__URL__/do_new_link" method='post'>
			<table>
				<tr>
					<td>url</td>
					<td>title</td>
				</tr>
				<tr>
					<td><input type="text" name="url" id=""></td>
					<td><input type="text" name="title" id=""></td>
				</tr>
			</table>
			<input type="submit" value="提交">
		</form>
	</div>
</body>
</html>