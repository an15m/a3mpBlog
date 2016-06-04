<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Snail | 杨锦修的个人博客</title>
	<script src="__JS__/jquery-1.9.0.js" type='text/javascript'></script>
	<script src="__JS__/index.js" type='text/javascript'></script>
	<link rel="stylesheet" type="text/css" href="__CSS__/index.css">
	<link rel="SHORTCUT ICON" href="__IMAGES__/k.ico">
</head>
<body>
	<div id='page'>
		<div id='body'>
			<div id='header'>
				<div id='title'>
				<a href="__APP__">
					<img src="__IMAGES__/snail.png">
				</a>
				</div>
				<div id='searchdiv'>
				<form action="__URL__/search" method='get' id='searchform'>
					<input type="text" name='search' id='searchinput' value=''>
				</form>
				<img src="__IMAGES__/search.jpg" alt="" id='searchimg'>
			 	</div>
			</div>
			<div id='left'>
				<div id='logo'>
					<img src="__IMAGES__/logo3.png">
				</div>
				<div id='motto-div'>
					<span id='motto'>
						　　<?php echo ($motto); ?>
					</span>
				</div>
				<hr>
				<ul id='navigation'>
					<li id='home'>
						<a href='__APP__'>
							<img src="__IMAGES__/home.png">
							<span>首页</span>
					    </a>
					</li>
					<li id='tech'>
						<div>
							<ul id='tech-navigation-ul'>
								<li id='tech-span'>
									<img src="__IMAGES__/tech2.png">
									<span id='techspan'>技术</span>
								</li>
								<li id='tech-navigation-li'>
									<div id='tech-navigation-in'>
										<ul id='navigation-in'>
											<?php if(is_array($tech)): $i = 0; $__LIST__ = $tech;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tech): $mod = ($i % 2 );++$i;?><li >
													<a href='__URL__/do_sort/type/<?php echo ($tech["techname"]); ?>'>
														<span><?php echo ($tech["techname"]); ?></span>
												    </a>
												</li><?php endforeach; endif; else: echo "" ;endif; ?>
										</ul>
									</div>	
								</li>
							</ul>
						</div>
					</li>
					<li id='life'>
						<a href='__URL__/do_sort/type/生活'>
							<img src="__IMAGES__/coffee.png">
							<span>生活</span>
					    </a>
					</li>
					<li id='aboutme'>
						<a href='__URL__/about_me'>
							<img src="__IMAGES__/user.png">
							<span>关于我</span>
					    </a>
					</li>
				</ul>
					
				<div id='blank'></div>
				<div id='link'>
					<img src="__IMAGES__/link.png">
					<span>友情链接</span><br>
					<?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link_vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($link_vo["url"]); ?>" target="_blank">
							<span><?php echo ($link_vo["title"]); ?></span>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div id='middle'>
				<div id='middle-header'>
					<span><?php echo ($header); ?></span>
				</div>
				<div id='middle-content'>
					<?php if(is_array($articles)): $k = 0; $__LIST__ = array_slice($articles,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($k % 2 );++$k;?><div class='articles' id="article-<?php echo ($article["id"]); ?>">
							<span class='date'><?php echo (date('Y.m.d　　　',$article["time"])); ?></span>
							<span class='sort'>分类：<?php echo ($article["type"]); ?></span>
							<br>
							<a href="__URL__/read_all/id/<?php echo ($article["id"]); ?>">
								<span class='title'><?php echo ($article["title"]); ?></span>
							</a>
							<hr class='readall-hr'>
							<div class='content' id="content-id<?php echo ($article["id"]); ?>">
								<?php echo ($article["content"]); ?>
							</div>
							<hr class='readall-hr'>
							<div class='readall'>
								<a href="__URL__/read_all/id/<?php echo ($article["id"]); ?>" style="display:<?php echo ($readall); ?>">
									<span> > 阅读全文</span>
								</a>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div id='paging' style="display:<?php echo ($paging_display); ?>">
					<?php echo ($paging); ?>
				</div>
				<div id='about-me' style="display:<?php echo ($about_me); ?>">
					<?php echo ($about_me_content); ?>
				</div>
			</div>
			<div id='right'>
				<div id='nowlearn'>
					<span id='nowlearn-1'>最近正在学习：</span><br>
					<span id='nowlearn-2'><?php echo ($now_learn); ?></span>
				</div>
				<div id='latest-articles'>
					<span class='right-title'>最近发表：</span>
					<hr>
					<ul>
						<table>
							<?php if(is_array($latest_articles)): $i = 0; $__LIST__ = $latest_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$latest_article): $mod = ($i % 2 );++$i;?><tr class='right-tr'>
									<td class='li-image-td'>
										<img src="__IMAGES__/point.jpg" class='li-image'>
									</td>
									<td id='right-td'>
										<li>
											<a class='right-a' href="__URL__/read_all/id/<?php echo ($latest_article["id"]); ?>">
												<span class='right-span'><?php echo ($latest_article["title"]); ?></span>
											</a>
										</li>
									</td>	
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
					</ul>
				</div>
				<div id='clickrank'>
					<span class='right-title'>点击排行：</span>
					<hr>
					<ul>
						<table>
							<?php if(is_array($click_articles)): $i = 0; $__LIST__ = $click_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$click_article): $mod = ($i % 2 );++$i;?><tr class='right-tr'>
									<td class='li-image-td'>
										<img src="__IMAGES__/point.jpg" class='li-image'>
									</td>
									<td id='right-td'>
										<li>
											<a class='right-a' href="__URL__/read_all/id/<?php echo ($click_article["id"]); ?>">
												<span class='right-span'><?php echo ($click_article["title"]); ?>(<?php echo ($click_article["clicknumber"]); ?>)</span>
											</a>
										</li>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>