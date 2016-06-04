<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>技术子栏管理</title>
</head>
<body>
	<div id='page'>
		<table>
			<?php if(is_array($tech)): $i = 0; $__LIST__ = $tech;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tech): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($tech["techname"]); ?></td>
					<td><a href="__URL__/delete_techname/id/<?php echo ($tech["id"]); ?>">删除</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td><a href="__URL__/new_techname">新增</a></td>
			</tr>
		</table>
	</div>
</body>
</html>