<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章管理</title>
	<link rel="stylesheet" href="__CSS__/manage_articles.css">
</head>
<body>
	<div id='page'>
		<table>
			<tr>
				<td>
					<form action='__URL__/<?php echo ($fun); ?>' method='get'>
						<input type='text' name='search' size=35></input>
						<button type='submit'>搜索</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<form action="__URL__/manage_articles" method='get'>
						类别：
						<select id="s1_text1_bold" name='type'>
							<option value="生活" selected="">生活</option>
							<?php if(is_array($tech)): $i = 0; $__LIST__ = $tech;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tech): $mod = ($i % 2 );++$i;?><option value="<?php echo ($tech["techname"]); ?>"><?php echo ($tech["techname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					    </select>
				        <input type="submit" value="选择">
					</form>
				</td>
			</tr>
			<tr>
				<td class='td'>标题</td>
				<td class='td'>类型</td>
				<td class='td'>删除</td>
				<td class='td'>修改</td>
			</tr>
			<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articles): $mod = ($i % 2 );++$i;?><tr>
					<td class='td'><?php echo ($articles["title"]); ?></td>
					<td class='td'><?php echo ($articles["type"]); ?></td>
					<td class='td'><a href="__URL__/delete_article/id/<?php echo ($articles["id"]); ?>">删除</a></td>
					<td class='td'><a href="__URL__/change_article/id/<?php echo ($articles["id"]); ?>">修改</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td>
					<form action='__URL__/<?php echo ($fun); ?>' method='get'>
						<?php echo ($paging); ?>
						<span>共<?php echo ($total_pages); ?>页，到第</span>
						<input type='text' value="<?php echo ($now_page); ?>" name='now_page' size=3></input>
						<button type='submit'>确定</button>
					</form>
				</td>
			</tr>
			<tr>
				<td><a href="__URL__/new_article">新增</a></td>
			</tr>
		</table>

	</div>
</body>
</html>