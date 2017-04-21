<?php
	return array(
		'SHOW_PAGE_TRACE'=>false,//开启页面Trace
		'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
			'__CSS__'=>__ROOT__.'/Public/Css',
			'__JS__'=>__ROOT__.'/Public/Js',
			'__IMAGES__'=>__ROOT__.'/Public/Images'
		),
		'DB_PREFIX'=>'a3mpblog_',  //设置表前缀
		'DB_DSN'=>'mysql://b18_17630521:380775988@sql100.byethost18.com:3306/b18_17630521_dandelionBlog',//设置数据库
		'URL_HTML_SUFFIX'=>'html|shtml|php',//限制伪静态的后缀
	);
?>