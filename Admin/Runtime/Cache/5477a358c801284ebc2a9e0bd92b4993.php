<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户信息管理</title>
</head>
<body>
	<div id='page'>
		<table>
			<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($user["name"]); ?></td>
					<td><?php echo ($user["email"]); ?></td>
					<td><a href="__URL__/delete_user/id/<?php echo ($user["id"]); ?>">删除</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<form action="__URL__/user" method='post'>
			开始：<input type="text" name='start'><br>
			结束：<input type="text" name='end'><br>
			<input type="submit" value="显示">
		</form>
	</div>
</body>
</html>