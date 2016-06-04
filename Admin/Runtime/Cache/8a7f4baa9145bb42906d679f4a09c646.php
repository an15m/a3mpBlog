<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>友情链接管理</title>
</head>
<body>
	<div id='page'>
		<table>
			<?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($link["url"]); ?></td>
					<td><?php echo ($link["title"]); ?></td>
					<td><a href="__URL__/delete_link/id/<?php echo ($link["id"]); ?>">删除</a></td>
					<td><a href="__URL__/change_link/id/<?php echo ($link["id"]); ?>">修改</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td><a href="__URL__/new_link">新增</a></td>
			</tr>
		</table>
	</div>
</body>
</html>