<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Snail | 杨锦修的个人博客</title>
	<script src="__JS__/jquery-1.9.0.js" type='text/javascript'></script>
	<script src="__JS__/Markdown.Converter.js" type='text/javascript'></script>
	<script src="__JS__/index.js" type='text/javascript'></script>
	<link rel="stylesheet" type="text/css" href="__CSS__/index.css">
	<link rel="SHORTCUT ICON" href="__IMAGES__/k.ico">
</head>
<body>
	<div id='page'>
		<div id='body'>
			<div id='header'></div>
			<div id='title'>
				<a href="__APP__">
					<img src="__IMAGES__/snail.png">
				</a>
			</div>
			<div id='searchdiv'>
				<form action="__URL__/search" method='post' id='searchform'>
					<input type="text" name='search' id='searchinput' value=''>
				</form>
				<img src="__IMAGES__/search.jpg" alt="" id='searchimg'>
			</div>
			<div id='user'>
				<div id='not-login'>
					<button id='login'>登陆</button>
					<button id='register'>注册</button>
				</div>
				<div id='have-login'>
					<div id='user-information'>
						<span>
							<?php echo (session('username')); ?>
						</span>
					</div>
					<div id='user-option'>
						<img src="__IMAGES__/setting1.png">	
						<ul>
							<li>
								<a href="__APP__/ChangeUserInformation/index">
									<span>修改资料</span>
								</a>
							</li>
							<li>
								<a href="__APP__/Login/do_logout">
									<span>退出</span>
								</a>
							</li>
						</ul>
					</div>
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
					<li id='message'>
						<a href='__URL__/message'>
							<img src="__IMAGES__/message.jpg">
							<span>留言板</span>
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
					<?php if(is_array($articles)): $k = 0; $__LIST__ = array_slice($articles,0,$limit_articles,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($k % 2 );++$k;?><div class='articles' id="article-<?php echo ($article["id"]); ?>">
							<span class='date'><?php echo (date('Y.m.d　H:i',$article["time"])); ?></span>
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
								<a href="#new-comment" class='comment' style="display:<?php echo ($discuss); ?>">
									<span>评论</span>
								</a>
							</div>
							<div class='comments' style="display:<?php echo ($comments); ?>">
								<h3 class='comments-header'>评论(<?php echo ($comment_number); ?>)：</h3>
								<div class='comments-content'>
									<?php if(is_array($article["comments"])): $k1 = 0; $__LIST__ = $article["comments"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($k1 % 2 );++$k1;?><div id='comment-<?php echo ($comment["id"]); ?>' class='comment'>
											<div class='comment-header'>
												<span><?php echo ($comment["username"]); ?>:</span>
											</div>
											<div class='comment-content'>
												<span><?php echo ($comment["content"]); ?></span>
											</div>
											<div class='comment-footer'>
												<span class='comment-number'><?php echo ($k1); ?>楼</span>
												<span class='comment-time'>　<?php echo (date('Y.m.d　H:i',$comment["time"])); ?>　</span>
												<a href="#new-comment">
													<span class='comment-comment' floor='<?php echo ($k1); ?>'>回复</span>
												</a>
												<hr>
											</div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
							<div class='new-comment' style="display:<?php echo ($new_comment); ?>">
								<a name='new-comment'></a>
								<h3 class='new-comment-header'>我要发表评论：</h3>
								<div class='new-comment-content'>
									<form action="__URL__/new_comment" method='post' id='new-comment-form'>
										<div class='new-comment-user-information'>
											<table class='new-comment-user-information-table'>
												<tr class='new-comment-user-information-tr'>
													<td class='new-comment-user-information-td-words'>
														<span>昵称</span>
													</td>
													<td  class='new-comment-user-information-td-input'>
														<input type="text" class='new-comment-user-information-input' name='username' id='new-comment-username'>
													</td>
													<td class='new-comment-user-information-tip' id='new-comment-username-tip'>
														<span>限4-32个字符(汉字算3个字符)</span>
													</td>
												</tr>
												<tr class='new-comment-user-information-tr'>
													<td class='new-comment-user-information-td-words'>
														<span>邮箱</span>
													</td>
													<td class='new-comment-user-information-td-input'>
														<input type="text" name="useremail" id="new-comment-useremail" class='new-comment-user-information-input'>
													</td>
													<td class='new-comment-user-information-tip' id='new-comment-useremail-tip'>
														<span>请输入正确的邮箱</span>
													</td>
												</tr>
											</table>	
										</div>
										<div  class='new-comment-textarea-tip'>
											<span id='new-comment-textarea-tip'></span>
										</div>
										<textarea name="new_comment" class="new-comment-content-textarea" cols="75" rows="8"></textarea>
										<input type="hidden" name="article_id" value="<?php echo ($article_id); ?>">
									</form>
									<button class='new-comment-button'>发表</button>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class='messages' style="display:<?php echo ($message); ?>">
					<h3 class='messages-header'>留言(<?php echo ($message_number); ?>)：</h3>
					<div class='messages-content'>
						<?php if(is_array($messages)): $k2 = 0; $__LIST__ = array_slice($messages,0,$limit_articles,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($k2 % 2 );++$k2;?><div id='message-<?php echo ($message["id"]); ?>' class='message'>
								<div class='message-header'>
									<span><?php echo ($message["username"]); ?>:</span>
								</div>
								<div class='message-content'>
									<span><?php echo ($message["content"]); ?></span>
								</div>
								<div class='message-footer'>
									<span class='message-number'><?php echo ($k2); ?>楼</span>
									<span class='message-time'>　<?php echo (date('Y.m.d　H:i',$message["time"])); ?>　</span>
									<a href="#new-message" >
										<span class='message-comment' floor='<?php echo ($k2); ?>'>回复</span>
									</a>
									<hr>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class='new-message'>
						<a name="new-message"></a>
						<h3 class='new-message-header'>我要留言：</h3>
						<div class='new-message-content'>
							<form action="__URL__/new_message" method='post' id='new-message-form'>
								<div class='new-message-user-information'>
									<table class='new-message-user-information-table'>
										<tr class='new-message-user-information-tr'>
											<td class='new-message-user-information-td-words'>
												<span>昵称</span>
											</td>
											<td  class='new-message-user-information-td-input'>
												<input type="text" class='new-message-user-information-input' name='username' id='new-message-username'>
											</td>
											<td class='new-message-user-information-tip' id='new-message-username-tip'>
												<span>限4-32个字符(汉字算3个字符)</span>
											</td>
										</tr>
										<tr class='new-message-user-information-tr'>
											<td class='new-message-user-information-td-words'>
												<span>邮箱</span>
											</td>
											<td class='new-message-user-information-td-input'>
												<input type="text" name="useremail" id="new-message-useremail" class='new-message-user-information-input'>
											</td>
											<td class='new-message-user-information-tip' id='new-message-useremail-tip'>
												<span>请输入正确的邮箱</span>
											</td>
										</tr>
									</table>	
								</div>
								<div  class='new-message-textarea-tip'>
									<span id='new-message-textarea-tip'></span>
								</div>
								<textarea name="new_message" class="new-message-content-textarea" cols="75" rows="8" required></textarea>
							</form>
							<button class='new-message-button'>发表</button>
						</div>
					</div>
				</div>
				<div id='readmore' style="display:<?php echo ($readmore); ?>">
					<a href="__URL__/<?php echo ($fun); ?>/number/<?php echo ($number); ?>">
						<span>点击查看更多</span>
						<img src="__IMAGES__/readmore2.png">
					</a>
				</div>
				<div id='about-me' style="display:<?php echo ($about_me); ?>">
					<p>姓名：杨锦修</p>
					<p>职业：在读大学生</p>
					<p>学校：电子科技大学通信与信息工程学院2013级</p>
					<p>Email：snailxiu@gmail.com</p>
					<p>QQ：568975235</p>
				</div>
			</div>
			<div id='right'>
				<div id='nowlearn'>
					<span id='nowlearn-1'>最近正在学习：</span><br>
					<span id='nowlearn-2'><?php echo ($now_learn); ?></span>
				</div>
				<div id='latest-articles'>
					<span>最近发表：</span>
					<hr>
					<ul>
						<table>
							<?php if(is_array($latest_articles)): $i = 0; $__LIST__ = $latest_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$latest_article): $mod = ($i % 2 );++$i;?><tr>
									<td class='li-image-td'>
										<img src="__IMAGES__/point.jpg" class='li-image'>
									</td>
									<td>
										<li>
											<a href="__URL__/read_all/id/<?php echo ($latest_article["id"]); ?>">
												<span><?php echo ($latest_article["title"]); ?></span>
											</a>
										</li>
									</td>	
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
					</ul>
				</div>
				<div id='clickrank'>
					<span>点击排行：</span>
					<hr>
					<ul>
						<table>
							<?php if(is_array($click_articles)): $i = 0; $__LIST__ = $click_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$click_article): $mod = ($i % 2 );++$i;?><tr>
									<td class='li-image-td'>
										<img src="__IMAGES__/point.jpg" class='li-image'>
									</td>
									<td>
										<li>
											<a href="__URL__/read_all/id/<?php echo ($click_article["id"]); ?>">
												<span><?php echo ($click_article["title"]); ?>(<?php echo ($click_article["clicknumber"]); ?>)</span>
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