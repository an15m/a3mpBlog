<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章发表</title>
	<link rel="stylesheet" href="__CSS__/new_article.css">
</head>
<body>
	<div id="page">
		<form action="__URL__/do_new_article" method='post'>
			类别：<select id="s1_text1_bold" name='type'>
				<option value="生活" selected="">生活</option>
				<?php if(is_array($tech)): $i = 0; $__LIST__ = $tech;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tech): $mod = ($i % 2 );++$i;?><option value="<?php echo ($tech["techname"]); ?>"><?php echo ($tech["techname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	        </select><br>
	        时间：
	        <input type="text" name='year' size=2 value='<?php echo ($year); ?>'>年
	        <input type="text" name='month' size=2 value='<?php echo ($month); ?>'>月
	        <input type="text" name='day' size=2 value='<?php echo ($day); ?>'>日<br>
	        标题：<input type="text" name="title" id="title"><br>
	        内容：<br><textarea name="content" id="" cols="130" rows="30"></textarea><br>
	        <input type="submit" value="发表">
		</form>
	</div>
</body>
</html>